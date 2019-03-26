#include "layoutLoader.h"

int initLayouts(SDL_Renderer* rendererP, Datas* datas){

    //On tente d'initialise les textures des images et
    //des textes
    if(initTextures(rendererP, datas) &&
       initTexsTex(rendererP, datas)){
        return 0;
    }

    return 1;
}
int initTextures(SDL_Renderer* rendererP, Datas* datas){

    int i;
    int nbTex = datas->surfaces->nbImg;

    //On alloue un nouveau tableau dynamique qui contiendra
    //nos textures
    datas->textures->images = malloc(sizeof(SDL_Texture*) * nbTex);
    if(datas->textures->images == NULL){
        return 0;
    }

    //On remplie notre tableau en cr�ant et rangeant nos textures � l'int�rieur
    for(i = 0; i < nbTex; i++){
        datas->textures->images[i] = SDL_CreateTextureFromSurface(rendererP,
                                                        datas->surfaces->images[i]);
        //Si la texture n'a pas pu �tre cr��, on renvoie une erreur
        if(!datas->textures->images[i]){
            fprintf(stderr,"Texture Creation Error :/ -> %s\n",SDL_GetError());
            return 0;
        }
    }
    return 1;
}
int initTexsTex(SDL_Renderer* rendererP, Datas* datas){
    int i;
    int nbTex = datas->surfaces->nbText;

    //On alloue un nouveau tableau dynamique qui contiendra
    //nos textures texte
    datas->textures->texts = malloc(sizeof(SDL_Texture*) * nbTex);
    if(datas->textures->texts == NULL){
        return 0;
    }

    //On remplie notre tableau en cr�ant et rangeant nos textures � l'int�rieur
    for(i = 0; i < nbTex; i++){
        datas->textures->texts[i] = SDL_CreateTextureFromSurface(rendererP,
                                                                 datas->surfaces->texts[i]);
        //Si la texture n'a pas pu �tre cr��, on renvoie une erreur
        if(!datas->textures->texts[i]){
            fprintf(stderr,"Texts Creation Error :/ -> %s\n",SDL_GetError());
            return 0;
        }
    }
    return 1;
}

void redrawText(SDL_Renderer* rendererP, Datas* datas, int ptrText, char * newText, int codeColor){
    SDL_Color color;

    //On d�truit la texture et la surface de la texture texte pr�c�dente
    SDL_FreeSurface(datas->surfaces->texts[ptrText]);
    SDL_DestroyTexture(datas->textures->texts[ptrText]);

    //Si le code couleur est 0, le texte sera en blanc sinon en noir
    //On pourra changer la couleur du texte � volont�
    switch(codeColor){
        case 0:
            color = (SDL_Color){255,255,255};
            break;
        case 1:
            color = (SDL_Color){255,0,0};
            break;
    }


    //On cr�e une nouvelle surface � partir de la police et de la chaine de caract�res
    //Si la surface ne peut pas �tre cr��, on renvoie une erreur
    datas->surfaces->texts[ptrText] = TTF_RenderText_Blended(datas->font, newText, color);
    if(!datas->surfaces->texts[ptrText]){
        fprintf(stderr,"Text Loading Error :/ -> %s\n", TTF_GetError());
        return;
    }

    //On cr�e une texture � partir de cette surface
    datas->textures->texts[ptrText] = SDL_CreateTextureFromSurface(rendererP,
                                                                 datas->surfaces->texts[ptrText]);
    //Si on �choue, on renvoie une erreur
    if(!datas->textures->texts[ptrText]){
        fprintf(stderr,"Texts Creation Error :/ -> %s\n",SDL_GetError());
        return;
    }

}

int updateRender(SDL_Window* windowP, SDL_Renderer* rendererP, Datas datas){
    //On appelle un pointeur de fonction pour dessiner l'interface actuel
    return (*datas.currentIRenderFct)(windowP, rendererP,datas);
}
void updateEvent(SDL_Event event, SDL_Window* windowP, SDL_Renderer * rendererP, Datas * datas, int * running){
    //On attend un �v�nement (souris, clavier...)
    SDL_WaitEvent(&event);

    //On appelle un pointeur de fonction pour g�rer les �v�nements
    //(mais �galement le calcul des �l�ments UI)
    (*datas->currentIEventsFct)(event, windowP, rendererP, datas, running);

    //En commun avec toutes les interfaces
    //(fermeture de la fen�tre)
    switch(event.type)
    {
        //Si on appuie sur la croix de la fen�tre:
        //-destruction des composants de la grille
        //-destruction des UI
        //-running est faux
        case SDL_QUIT:
            menu_end(datas);
            datas->currentIRenderFct = NULL;
            break;
        default:
            SDL_RaiseWindow(windowP);
            break;
    }
    //Si le pointeur de fonction rendu est nul,
    //on termine le programme (non-utilis�)
    if(datas->currentIRenderFct == NULL){
        //freeComponents(datas);
        *running = 0;
    }

}
int destroyTextures(Datas datas){
    int i;
    //On d�truit les �l�ments allou�s dans le tableau des textures type image
    for(i = 0; i < NB_IMAGES; i++){
        SDL_DestroyTexture(datas.textures->images[i]);

    }
    //On d�truit le tableau texture allou�
    free(datas.textures->images);
    //On d�truit les �l�ments allou�s dans le tableau des textures type texte
    for(i = 0; i < NB_TEXT; i++){
        SDL_DestroyTexture(datas.textures->texts[i]);
    }
    //On d�truit le tableau texture allou�
    free(datas.textures->texts);
    //On ferme la police de texte
    TTF_CloseFont(datas.font);
    return 1;
}
