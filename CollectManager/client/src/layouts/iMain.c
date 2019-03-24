#include "iMain.h"

int main_init(Datas* datas){
    int nbButton = 3;
    int nbGroup = 1; // menu

    SDL_Rect* rectsBt = (SDL_Rect*) malloc(sizeof(SDL_Rect) * nbButton);
    SDL_Rect* rectsGr = (SDL_Rect*) malloc(sizeof(SDL_Rect) * nbGroup);

    datas->ui->nbBt = nbButton;
    datas->ui->rectBt = rectsBt;
    datas->ui->rectGroup = rectsGr;

    return 0;
}
int main_event(SDL_Event event,SDL_Window* windowP, SDL_Renderer* rendererP,Datas *datas, int *running){
int width, height;
    int xMouse, yMouse;
    int counter;
    int idBt = -1;
    int buttonX, buttonY, buttonW, buttonH;
    SDL_Rect currentBt;
    SDL_Rect menu;

    //Refresh buttons' position
    SDL_GetWindowSize(windowP, &width, &height);

    menu = (SDL_Rect) {0, 0, width, 30};

    datas->ui->rectBt[0] = (SDL_Rect) {menu.x+5, menu.y+5, menu.w/4-10, menu.h-10};
    datas->ui->rectBt[1] = (SDL_Rect) {menu.x+menu.w/4+5, menu.y+5, menu.w/4-10, menu.h-10};
    datas->ui->rectBt[2] = (SDL_Rect) {menu.x+2*menu.w/4+5, menu.y+5, menu.w/4-10, menu.h-10};


    datas->ui->rectGroup[0] = menu;

    //EVENT MANAGER

    //Mouse on buttons
    SDL_GetMouseState(&xMouse, &yMouse);
    if(event.type == SDL_MOUSEBUTTONDOWN){
        idBt = getIdButtonOn(*datas, xMouse, yMouse);
        switch(idBt){
            case 0:
                menu_end(datas);
                datas->currentIRenderFct = NULL;
                break;
            case 1:
                menu_end(datas);
                datas->currentIRenderFct = NULL;
                break;
            default :
                break;
        }
    }
    return 0;
}
int main_update(SDL_Window* windowP, SDL_Renderer* rendererP, Datas datas){
    int width, height;
    SDL_GetWindowSize(windowP, &width, &height);

    SDL_Rect background = {0,0,width,height};

    SDL_SetRenderDrawColor(rendererP, 128, 128, 128, 0);
    SDL_RenderFillRect(rendererP, &background);

    main_update_buttons(rendererP, datas, width, height);

    SDL_RenderPresent(rendererP);
    return 0;
}
int main_update_buttons(SDL_Renderer* rendererP, Datas datas, int width, int height){

    int i;
    int idBt = -1;
    int xMouse, yMouse;

    SDL_Rect menu = datas.ui->rectGroup[0];
    SDL_Rect currentBt;
    SDL_Rect currentTxtBt;

    SDL_SetRenderDrawColor(rendererP,64, 64, 64, 0);
    SDL_RenderFillRect(rendererP,&menu);

    SDL_GetMouseState(&xMouse, &yMouse);
    idBt = getIdButtonOn(datas,xMouse, yMouse);


    for(i = 0; i < datas.ui->nbBt; i++){
        currentBt = datas.ui->rectBt[i];
        if(idBt == i){
            currentBt.x += 2;
            currentBt.y += 2;
            SDL_SetRenderDrawColor(rendererP, 128, 64, 64, 0);
        }else{
            if(i==2)
                SDL_SetRenderDrawColor(rendererP, 64, 64, 0, 0);
            else SDL_SetRenderDrawColor(rendererP, 64, 0, 0, 0);
        }
        SDL_RenderFillRect(rendererP, &currentBt);
        currentTxtBt.y = currentBt.y + 2;
        currentTxtBt.h = currentBt.h - 4;
        currentTxtBt.w = currentBt.w - 4;
        currentTxtBt.x = currentBt.x +2;
        SDL_RenderCopy(rendererP,datas.textures->texts[6 + i],NULL,&currentTxtBt);
    }
    return 0;
}

int main_end(Datas *datas){
    free(datas->ui->rectBt);
    free(datas->ui->rectGroup);
    return 0;
}
