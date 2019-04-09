#include "iDelPopup.h"

int del_init(Datas* datas){
    int i;
    int nbButton = 4;
    int nbGroup = 2;
    int nbInputText = 1;

    SDL_Rect* rectsGr = (SDL_Rect*) malloc(sizeof(SDL_Rect) * nbGroup);
    SDL_Rect* rectsBt = (SDL_Rect*) malloc(sizeof(SDL_Rect) * nbButton);


    datas->ui->nbBt = nbButton;
    datas->ui->rectBt = rectsBt;
    datas->ui->rectGroup = rectsGr;


    //fond d'écran assombri initialisé
    datas->ui->rectGroup[1] = (SDL_Rect) {-1,-1,-1,-1};
    return 0;
}
int del_event(SDL_Event event,SDL_Window* windowP, SDL_Renderer* rendererP,Datas *datas, int *running){
    int width, height;
    int xMouse, yMouse;
    int idBt = -1;
    int i;
    SDL_Rect menu;

    //Refresh buttons' position
    SDL_GetWindowSize(windowP, &width, &height);
    menu = (SDL_Rect) {width/2-200, height/2-200, 400, 200};

    datas->ui->rectGroup[0] = menu;
    if(datas->ui->rectGroup[1].w == -1)
        datas->ui->rectGroup[1] = (SDL_Rect) {0,0,width,height};
    else if (datas->ui->rectGroup[1].w == width)
        datas->ui->rectGroup[1] = (SDL_Rect) {0,0,1,1};

    datas->ui->rectInputText[0] = (SDL_Rect) {menu.x+20, menu.y+50, menu.w-40, 40};

    datas->ui->rectBt[0] = (SDL_Rect){menu.x+10,menu.y+170, menu.w/2 - 20,20};
    datas->ui->rectBt[1] = (SDL_Rect){menu.x+10+menu.w/2,menu.y+170, menu.w/2-20,20};


    //Mouse on buttons
    SDL_GetMouseState(&xMouse, &yMouse);
    if(event.type == SDL_MOUSEBUTTONDOWN){
        idBt = getIdButtonOn(*datas, xMouse, yMouse);
        switch(idBt){
            case 0:
                del_end(datas);
                main_init(datas);
                datas->currentIEndFct = main_end;
                datas->currentIEventsFct = main_event;
                datas->currentIRenderFct = main_update;
                return 0;
            case 1:
                if(datas->listProduct->productStart != NULL){
                    datas->listProduct->productStart = removeItem(datas->listProduct->productStart);
                }
                del_end(datas);
                main_init(datas);
                datas->currentIEndFct = main_end;
                datas->currentIEventsFct = main_event;
                datas->currentIRenderFct = main_update;
                return 0;
        }
    }
    return 0;
}
int del_update(SDL_Window* windowP, SDL_Renderer* rendererP, Datas datas){

    int width, height;
    int xMouse, yMouse;
    int i,j;
    int idBt;
    char tmpInputTxt[64];

    //Declaration des éléments
    SDL_Rect menu = datas.ui->rectGroup[0];
    SDL_Rect listBackgroud, inputTxt;
    SDL_Rect button;
    SDL_Rect buttonT;
    SDL_Rect curButtonFileName;
    SDL_Rect textWarn;

    if(datas.ui->rectGroup[1].w == -1) return 0;

    //Taille de la fenetre
    SDL_GetWindowSize(windowP, &width, &height);

    //Assombrissement du layout de fond
    SDL_SetRenderDrawBlendMode(rendererP, SDL_BLENDMODE_BLEND);
    {
        SDL_SetRenderDrawColor(rendererP,0,0,0,200);
        SDL_RenderFillRect(rendererP,datas.ui->rectGroup + 1);
    }
    SDL_SetRenderDrawBlendMode(rendererP, SDL_BLENDMODE_NONE);

    //Dessin de l'interface
    SDL_SetRenderDrawColor(rendererP,50,50,50,0);
    SDL_RenderFillRect(rendererP,&menu);

    SDL_SetRenderDrawColor(rendererP,100,100,100,0);
    listBackgroud = (SDL_Rect) {menu.x+10, menu.y+10, menu.w -20, menu.h -50};
    inputTxt = (SDL_Rect) {0, 0, 1,1};

    SDL_RenderFillRect(rendererP,&listBackgroud);
    SDL_RenderFillRect(rendererP,&inputTxt);

    textWarn = (SDL_Rect) {menu.x+20, menu.y+50, menu.w-40, 20};
    SDL_RenderCopy(rendererP, datas.textures->texts[13], NULL, &textWarn);
    textWarn.y += 30;
    SDL_RenderCopy(rendererP, datas.textures->texts[14], NULL, &textWarn);


    //Dessin des boutons
    SDL_GetMouseState(&xMouse, &yMouse);
    idBt = getIdButtonOn(datas,xMouse, yMouse);
    for(i = 0; i < 2;i++){
        if(idBt == i || (i == 2 && datas.network->isListening) ||
           (i == 3 && !datas.network->isListening) ){
            SDL_SetRenderDrawColor(rendererP,128, 64, 64, 0);
            button.x += 5;
            button.y += 5;
        }else{
            SDL_SetRenderDrawColor(rendererP,64,0,0, 0);
        }
        button = datas.ui->rectBt[i];
        buttonT = (SDL_Rect) {button.x+10, button.y +5, button.w -20, button.h -10};
        SDL_RenderFillRect(rendererP,&button);
        switch(i){
            case 0:SDL_RenderCopy(rendererP, datas.textures->texts[4], NULL, &buttonT);break;
            case 1:SDL_RenderCopy(rendererP, datas.textures->texts[9], NULL, &buttonT);break;
            case 2:SDL_RenderCopy(rendererP, datas.textures->texts[11], NULL, &buttonT);break;
            case 3:SDL_RenderCopy(rendererP, datas.textures->texts[12], NULL, &buttonT);break;
        }

    }

    //Rendu
    SDL_RenderPresent(rendererP);
    return 1;
}


int del_end(Datas *datas){
    int i;
    free(datas->ui->rectBt);
    free(datas->ui->rectGroup);
    free(datas->ui->rectInputText);
    //Clean input texts
    for(i = 0; i < datas->ui->nbInputText; i++){
        free(datas->ui->inputText[i]);
    }
    free(datas->ui->inputText);
    return 1;
}
