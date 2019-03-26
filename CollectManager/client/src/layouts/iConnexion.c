#include "iConnexion.h"

int menu_init(Datas* datas){
    int nbButton = 2;
    int nbGroup = 1; // menu

    SDL_Rect* rectsBt = (SDL_Rect*) malloc(sizeof(SDL_Rect) * nbButton);
    SDL_Rect* rectsGr = (SDL_Rect*) malloc(sizeof(SDL_Rect) * nbGroup);

    datas->ui->nbBt = nbButton;
    datas->ui->rectBt = rectsBt;
    datas->ui->rectGroup = rectsGr;

    return 0;
}
int menu_event(SDL_Event event,SDL_Window* windowP, SDL_Renderer* rendererP,Datas *datas, int *running){
int width, height;
    int xMouse, yMouse;
    int counter;
    int idBt = -1;
    int buttonX, buttonY, buttonW, buttonH;
    SDL_Rect currentBt;
    SDL_Rect menu;

    //Refresh buttons' position
    SDL_GetWindowSize(windowP, &width, &height);

    menu = (SDL_Rect) {width/2 - width/4, height/2-height/4, width/2, height/2};

    datas->ui->rectBt[0] = (SDL_Rect) {menu.x+menu.w/2+5, menu.h+menu.y-25, menu.w/2-10, 20};
    datas->ui->rectBt[1] = (SDL_Rect) {menu.x+5, menu.h+menu.y-25, menu.w/2-10, 20};

    datas->ui->rectGroup[0] = menu;

    //EVENT MANAGER

    //Mouse on buttons
    SDL_GetMouseState(&xMouse, &yMouse);
    if(event.type == SDL_MOUSEBUTTONDOWN){
        idBt = getIdButtonOn(*datas, xMouse, yMouse);
        switch(idBt){
            case 1:
                menu_end(datas);
                datas->currentIRenderFct = NULL;
                break;
            case 0:
                if(userConnect("Alan", "1234")){
                    menu_end(datas);
                    main_init(datas);
                    datas->currentIEventsFct = main_event;
                    datas->currentIRenderFct = main_update;
                }else redrawText(rendererP, datas, 9, "Identifiant incorrect !",1);
                break;
            default :
                break;
        }
    }
    return 0;
}
int menu_update(SDL_Window* windowP, SDL_Renderer* rendererP, Datas datas){
    int width, height;
    SDL_GetWindowSize(windowP, &width, &height);

    SDL_Rect background = {0,0,width,height};

    SDL_SetRenderDrawColor(rendererP, 128, 128, 128, 0);
    SDL_RenderFillRect(rendererP, &background);

    menu_update_menu(rendererP, datas, width, height);

    SDL_RenderPresent(rendererP);
    return 0;
}
int menu_update_menu(SDL_Renderer* rendererP, Datas datas, int width, int height){

    int i;
    int idBt = -1;
    int xMouse, yMouse;

    SDL_Rect menu = datas.ui->rectGroup[0];
    SDL_Rect error = {menu.x+40, menu.y+10, menu.w-80, 15};
    SDL_Rect currentBt;
    SDL_Rect currentTxtBt;

    SDL_SetRenderDrawColor(rendererP,64, 64, 64, 0);
    SDL_RenderFillRect(rendererP,&menu);

    SDL_RenderCopy(rendererP,datas.textures->texts[9],NULL,&error);

    SDL_GetMouseState(&xMouse, &yMouse);
    idBt = getIdButtonOn(datas,xMouse, yMouse);
    for(i = 0; i < datas.ui->nbBt; i++){
        currentBt = datas.ui->rectBt[i];
        if(idBt == i){
            currentBt.x += 2;
            currentBt.y += 2;
            SDL_SetRenderDrawColor(rendererP, 128, 64, 64, 0);
        }else{
            SDL_SetRenderDrawColor(rendererP, 64, 0, 0, 0);
        }
        SDL_RenderFillRect(rendererP, &currentBt);
        currentTxtBt.y = currentBt.y + 2;
        currentTxtBt.h = currentBt.h - 4;
        currentTxtBt.w = currentBt.w - 4;
        currentTxtBt.x = currentBt.x +2;
        SDL_RenderCopy(rendererP,datas.textures->texts[4 + i],NULL,&currentTxtBt);
    }
    return 0;
}

int menu_end(Datas *datas){
    free(datas->ui->rectBt);
    free(datas->ui->rectGroup);
    return 0;
}
