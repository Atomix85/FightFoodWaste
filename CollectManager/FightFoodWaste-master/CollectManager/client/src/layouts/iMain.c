#include "iMain.h"

int main_init(Datas* datas){
    int nbButton = 3 + datas->listProduct->nbProduct;
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
    int i;
    FILE* tmpJSON;
    char bufferLine[1024];
    char JSONDATAS[32665];
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

    for(i = 3;i < datas->ui->nbBt;i++){
        datas->ui->rectBt[i] = (SDL_Rect) {10 ,62+(i-3)*20,15,16};
    }


    datas->ui->rectGroup[0] = menu;

    //EVENT MANAGER

    //Mouse on buttons
    SDL_GetMouseState(&xMouse, &yMouse);
    if(event.type == SDL_MOUSEBUTTONDOWN){
        idBt = getIdButtonOn(*datas, xMouse, yMouse);
        switch(idBt){
            case 0:
                main_end(datas);
                add_init(datas);
                datas->currentIEndFct = add_end;
                datas->currentIEventsFct = add_event;
                datas->currentIRenderFct = add_update;
                break;
            case 1:/* // On d�sactive le bouton supprimer
                main_end(datas);
                del_init(datas);
                datas->currentIEndFct = del_end;
                datas->currentIEventsFct = del_event;
                datas->currentIRenderFct = del_update;*/
                break;
            case 2:
                //Soumettre la liste
                //pushList(datas->listProduct->productStart);
                if(datas->listProduct->nbProduct <= 0) break;
                parse_json(datas->listProduct->productStart,datas->user,datas->pwd);
                tmpJSON = fopen("tmp/file.json","r");
                if(tmpJSON != NULL){
                    while(fgets(bufferLine,1024,tmpJSON)!=NULL){
                        strcat(JSONDATAS, "\n");
                        strcat(JSONDATAS, bufferLine);
                    }
                    printf("%s", JSONDATAS);
                    pushProduct(JSONDATAS);
                    fclose(tmpJSON);
                }
                datas->listProduct->productStart = removeAll(datas->listProduct->productStart);
                datas->listProduct->nbProduct=0;
                main_end(datas);
                main_init(datas);//Reinit nb button
                break;
            case -1:
                break;
            default :
                datas->listProduct->idToRemove = idBt - 3;
                main_end(datas);
                del_init(datas);
                datas->currentIEndFct = del_end;
                datas->currentIEventsFct = del_event;
                datas->currentIRenderFct = del_update;
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

    drawListProduct(rendererP, datas, width, height);
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
        if(i < 3)
            SDL_RenderCopy(rendererP,datas.textures->texts[5 + i],NULL,&currentTxtBt);
        else
            SDL_RenderCopy(rendererP,datas.textures->texts[16],NULL,&currentTxtBt);
    }
    return 0;
}

int main_end(Datas *datas){
    free(datas->ui->rectBt);
    free(datas->ui->rectGroup);
    return 0;
}
