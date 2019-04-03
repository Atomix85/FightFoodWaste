#include "iConnexion.h"

int menu_init(Datas* datas){
    int nbButton = 2;
    int nbGroup = 1; // menu
    int nbInputText = 2;
    int i;

    SDL_Rect* rectsBt = (SDL_Rect*) malloc(sizeof(SDL_Rect) * nbButton);
    SDL_Rect* rectsGr = (SDL_Rect*) malloc(sizeof(SDL_Rect) * nbGroup);


    datas->ui->inputText = (char**) malloc(sizeof(char*) * nbInputText);
    datas->ui->rectInputText = (SDL_Rect*) malloc(sizeof(SDL_Rect) * nbInputText);

    for(i = 0; i < nbInputText; i++){
        datas->ui->inputText[i] = (char*) malloc(sizeof(char) * 64);
        datas->ui->inputText[i][0] = '\0';
    }
    datas->ui->nbInputText = nbInputText;
    datas->ui->ptrInputText = 0;

    datas->ui->nbBt = nbButton;
    datas->ui->rectBt = rectsBt;
    datas->ui->rectGroup = rectsGr;

    return 0;
}
int menu_event(SDL_Event event,SDL_Window* windowP, SDL_Renderer* rendererP,Datas *datas, int *running){
int width, height;
    int xMouse, yMouse;
    int counter;
    char errorMsg[32];
    int idBt = -1;
    char idInputTxt = -1;
    int buttonX, buttonY, buttonW, buttonH;
    SDL_Rect currentBt;
    SDL_Rect menu;

    //Refresh buttons' position
    SDL_GetWindowSize(windowP, &width, &height);

    menu = (SDL_Rect) {width/2 - width/4, height/2-height/4, width/2, height/2};

    datas->ui->rectInputText[0] = (SDL_Rect) {menu.x+5, menu.y+50, menu.w-10, 40};
    datas->ui->rectInputText[1] = (SDL_Rect) {menu.x+5, menu.y+120, menu.w-10, 40};

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
                return 1;
            case 0:
                if(userConnect(datas->ui->inputText[0], datas->ui->inputText[1], &errorMsg)){
                    menu_end(datas);
                    main_init(datas);
                    datas->currentIEventsFct = main_event;
                    datas->currentIRenderFct = main_update;
                    datas->currentIEndFct = main_end;
                    return;
                }else{
                    datas->ui->inputText[0][0] = '\0';
                    datas->ui->inputText[1][0] = '\0';
                    redrawText(rendererP, datas, 8, errorMsg,1);
                }
                break;
            default :
                break;
        }
        idInputTxt = getIdInputTxtOn(*datas, xMouse, yMouse);
        datas->ui->ptrInputText = idInputTxt;
    }
    if(datas->ui->ptrInputText != -1){
        inputTxtListener(datas, event, datas->ui->ptrInputText, 64);
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

    int i,j;
    int idBt = -1;
    int xMouse, yMouse;
    char tmpInputTxt[64];

    SDL_Rect menu = datas.ui->rectGroup[0];
    SDL_Rect error = {menu.x+40, menu.y+10, menu.w-80, 15};
    SDL_Rect currentBt;
    SDL_Rect currentTxtBt;

    SDL_SetRenderDrawColor(rendererP,64, 64, 64, 0);
    SDL_RenderFillRect(rendererP,&menu);

    SDL_RenderCopy(rendererP,datas.textures->texts[8],NULL,&error);

    for(i = 0; i< datas.ui->nbInputText; i++){
        currentBt = datas.ui->rectInputText[i];
        if(datas.ui->ptrInputText == i){
            SDL_SetRenderDrawColor(rendererP,128, 64, 64, 0);
            currentBt.x += 5;
            currentBt.y += 5;
        }else{
            SDL_SetRenderDrawColor(rendererP,64,0,0, 0);
        }
        SDL_RenderFillRect(rendererP, &currentBt);
        if(strcmp(datas.ui->inputText[i], "") != 0){
            strcpy(tmpInputTxt, datas.ui->inputText[i]);
            if(i == 1){
                for(j = 0; j < strlen(tmpInputTxt); j++){
                    tmpInputTxt[j] = '*';
                }
            }
            currentTxtBt = (SDL_Rect) {currentBt.x+2, currentBt.y+10, 10*strlen(datas.ui->inputText[i]), currentBt.h-20};
            redrawText(rendererP, &datas, 2, tmpInputTxt, 0);
            SDL_RenderCopy(rendererP,datas.textures->texts[2],NULL,&currentTxtBt);
        }
        currentTxtBt = (SDL_Rect) {currentBt.x+10, currentBt.y-20, datas.surfaces->texts[i]->w/4, 15};
        SDL_RenderCopy(rendererP,datas.textures->texts[i],NULL,&currentTxtBt);
    }

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
        SDL_RenderCopy(rendererP,datas.textures->texts[3 + i],NULL,&currentTxtBt);
    }
    return 0;
}

int menu_end(Datas *datas){

    int i;
    free(datas->ui->rectBt);
    free(datas->ui->rectGroup);
    free(datas->ui->rectInputText);
    //Clean input texts
    for(i = 0; i < datas->ui->nbInputText; i++){
        free(datas->ui->inputText[i]);
    }
    free(datas->ui->inputText);
    return 0;
}
