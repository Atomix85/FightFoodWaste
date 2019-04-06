#include "kernel.h"
SDL_Window* initWindow(){
    //V�rifie l'initialisation du module vid�o (et audio) de SDL.
    //Le cas �chant fermera l'application
    if (SDL_Init(SDL_INIT_VIDEO | SDL_INIT_AUDIO) != 0 )
    {
        fprintf(stderr,"Window Initialisation Error :/ -> %s\n",SDL_GetError());
        return NULL;
    }
    //Cr�e la fen�tre SDL en taille maximis� et renvoie son pointeur
    SDL_Window* windowP = SDL_CreateWindow("",SDL_WINDOWPOS_UNDEFINED,
                                                            SDL_WINDOWPOS_UNDEFINED,
                                                            640,
                                                            480,
                                                            SDL_WINDOW_MAXIMIZED);

    //Si le pointeur est NULL, on affiche un message d'erreur
    if(windowP == NULL){
        fprintf(stderr,"Window Creation Error :/ -> %s\n",SDL_GetError());
    }

    //On renvoie le pointeur de la f�netre
    return windowP;
}
SDL_Renderer* initRenderer(SDL_Window* windowP){
    //On obtient un nouveau pointeur du renderer de la fen�tre
    SDL_Renderer* rendererP = SDL_CreateRenderer(windowP,-1,SDL_RENDERER_ACCELERATED);

    //Si le renderer n'a pas pu �tre cr��, on affiche un message d'erreur.
    //L'application se fermera
    if(rendererP == NULL){
        fprintf(stderr,"Renderer Creation Error :/ -> %s\n", SDL_GetError());
    }

    //On renvoie le renderer
    return rendererP;

}
int initImg()
{
    //On choisie nos flags d'image (format d'image en PNG & JPG)
    int flags = IMG_INIT_JPG | IMG_INIT_PNG;

    //On initialise SDL_image � partir de ce flag
    int codeInit = IMG_Init(flags);

    //On v�rifie que le renvoi de l'initialisateur
    //correspond � flags (r�ussite) sinon
    //message d'erreur
    if((codeInit&flags) != flags){
        fprintf(stderr,"Image Initialisation Error :/ -> %s\n", IMG_GetError());
        return 0;
    }
    return 1;
}
int initTtf(){
    //On initialise les SDL_TTF et on v�rifie sa r�ussite.
    //Sinon, on termine le programme
    if(TTF_Init() == -1){

        fprintf(stderr, "TTF Initialisation Error :/ -> %s\n", TTF_GetError());
        return 0;

    }
    return 1;
}

int init(SDL_Window** windowP, SDL_Renderer** rendererP, Ressources r){
    //Initialisation de la fen�tre
    *windowP = initWindow();
    //Si la fen�tre est null, on sort de la fonction
    if(*windowP == NULL){
        return 0;
    }

    //Initialisation du renderer
    *rendererP = initRenderer(*windowP);
    //Si le renderer est null, on sort de la fonction
    if(*rendererP == NULL){
        return 0;
    }

    //Initialisation cons�cutive de SDL_image et SDL_TTF
    //Si l'initialisation �choue, on quitte
    if(!initImg() & !initTtf()){
        return 0;
    }

    //Si la config maximis� est false, prend la taille dans les configs
    //pour la taille de la fen�tre
    if(!r.config.maximized){
        SDL_SetWindowSize(*windowP, r.config.width, r.config.height);
    }

    //Si plein �cran est actif, met la fen�tre en plein �cran
    if(r.config.fullscreen)
        SDL_SetWindowFullscreen(*windowP, SDL_WINDOW_FULLSCREEN_DESKTOP);

    return 1;

}
int postInit(SDL_Renderer* rendererP,Datas* datas, Ressources r){
    int i;
    //On alloue un tableau de pointeur de SDL_Surface par le nombre de fichier img
    //� charger(le tout est mis dans les datas)
    datas->surfaces->images = (SDL_Surface**) malloc(sizeof(SDL_Surface*) * r.sizeListImgFiles);

    //Si l'allocation �choue (rare), on retourne l'erreur d'allocation
    if(datas->surfaces->images == NULL){
        return errMemoryUnalloc(sizeof(SDL_Surface*) * r.sizeListImgFiles);
    }

    //Le cas �chant, on it�re chaque chemin de fichier et on les ouvre
    //avec IMG_Load pour remplir le tableau allou�. Un simple fichier
    //introuvable ferme le programme
    for(i = 0; i < r.sizeListImgFiles; i++){
        datas->surfaces->images[i] = IMG_Load((const char*)(r.listImgFiles+i));
        if(!datas->surfaces->images[i]){
            fprintf(stderr,"Image Loading Error :/ -> %s\n", IMG_GetError());
            return 0;
        }
        fprintf(stdout,"Image Loaded Successful : %s\n", (char*)(r.listImgFiles+i));
    }

    //On met le nombre d'image dans le datas
    datas->surfaces->nbImg = r.sizeListImgFiles;

    //On ouvre la police mise dans ressource en taille 65
    datas->font = TTF_OpenFont(r.font,65);

    //En cas d'erreur, on quitte le programme
    if(!( datas->font )){
        fprintf(stderr,"Font Loading Error :/ -> %s\n", IMG_GetError());
        return 0;
    }

    //On alloue un tableau de pointeur de SDL_Surface par le nombre de texte
    //� charger(le tout est mis dans les datas)
    datas->surfaces->texts = (SDL_Surface**) malloc(sizeof(SDL_Surface*) * r.sizeListText);

    //Si l'allocation �choue (rare), on retourne l'erreur d'allocation
    if(datas->surfaces->texts == NULL){
        return errMemoryUnalloc(sizeof(SDL_Surface*) * r.sizeListText);
    }

    //On met la couleur des surfaces-textes en blanc par d�faut
    SDL_Color white = {255,255,255};

    //On it�re chaque texte(m�me dynamique) et on les ouvre avec
    //IMG_Load pourremplir le tableau allou�. Si un texte ne peut
    //pas �tre charg�, on termine le programme.
    for(i = 0; i < r.sizeListText; i++){
        datas->surfaces->texts[i] = TTF_RenderText_Blended(datas->font, (const char*) (r.listText+i), white);;
        if(!datas->surfaces->texts[i]){
            fprintf(stderr,"Text Loading Error :/ -> %s\n", IMG_GetError());
            return 0;

        }
    }
    //On met le nombre de texte dans le datas
    datas->surfaces->nbText = r.sizeListText;

    //On copie la config dans le datas
    datas->config = r.config;

    //On initialise le layoutLoader (cr�ation textures...)
    initLayouts(rendererP,datas);
    return 1;
}
void freeRessources(Datas datas, Ressources r){
    int i;
    //On d�truit les textures avec le layoutLoader
    destroyTextures(datas);
    //On d�truit chacune des surfaces-textes
    for(i = 0; i < r.sizeListText; i++){
        SDL_FreeSurface(datas.surfaces->texts[i]);
    }
    //Et son tableau
    free(datas.surfaces->texts);

    //On d�truit chacune des surfaces-images
    for(i = 0; i < r.sizeListImgFiles; i++){
        SDL_FreeSurface(datas.surfaces->images[i]);
    }
    //Et son tableau
    free(datas.surfaces->images);
}
void endApp(SDL_Window* windowP, SDL_Renderer* rendererP,Datas datas, Ressources r){
    //On d�salloue les ressources charg�s en postInit
    freeRessources(datas,r);
    //On ferme les sous-biblioth�ques utilis�es
    TTF_Quit();
    IMG_Quit();

    //On d�truit le renderer et la fen�tre
    SDL_DestroyRenderer(rendererP);
    SDL_DestroyWindow(windowP);
    //On ferme SDL
    SDL_Quit();
}
int updateApp(SDL_Window *windowP, SDL_Renderer *rendererP, Datas datas){
    int continuer = 1;
    char titleWin[64];
    SDL_Event event;

    //On met 'fabrique' le nom de la fen�tre NOM + " " + VERSION
    //avec Datas
    strcpy(titleWin, datas.projectName);
    strcat(titleWin, " ");
    strcat(titleWin, datas.version);
    SDL_SetWindowTitle(windowP,titleWin);

    //On initialise le premier layout : menu
    //et on 'link' nos fonctions update et event
    menu_init(&datas);
    datas.currentIRenderFct = menu_update;
    datas.currentIEventsFct = menu_event;
    datas.currentIEndFct = menu_end;

    //Tant que le programme est en 'vie'
    while (continuer)
    {
        //Le layoutLoader rafraichit la gestion des evenements et
        //l'affichage des �l�ments sur la fen�tre
        updateRender(windowP, rendererP, datas);
        updateEvent(event, windowP, rendererP,&datas, &continuer);


    }
    return 0;

}
int errMemoryUnalloc(int sizeByte){
    //On affiche un message d'erreur informant d'une erreur d'allocation dynamique
    fprintf(stderr, "! Allocation Bound Error :/ -> Cannot allocate %d bytes", sizeByte);
    return 0;
}


