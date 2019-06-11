#include "iAddPopup.h"

int add_init(Datas* datas){
    int i;
    int nbButton = 7;
    int nbGroup = 2;
    int nbInputText = 2;

    SDL_Rect* rectsGr = (SDL_Rect*) malloc(sizeof(SDL_Rect) * nbGroup);
    SDL_Rect* rectsBt = (SDL_Rect*) malloc(sizeof(SDL_Rect) * nbButton);

    datas->ui->inputText = (char**) malloc(sizeof(char*) *nbInputText);
    datas->ui->rectInputText = (SDL_Rect*) malloc(sizeof(SDL_Rect) * nbInputText);

    for(i = 0; i <nbInputText;i++){
        datas->ui->inputText[i] = (char*) malloc(sizeof(char) * 64);
        datas->ui->inputText[i][0] = '\0';
    }

    datas->ui->nbInputText = nbInputText;
    datas->ui->ptrInputText = 0;

    datas->ui->nbBt = nbButton;
    datas->ui->rectBt = rectsBt;
    datas->ui->rectGroup = rectsGr;

    datas->network->lastPacket[0] = '\0';
    datas->network->isListening = 0;

    //fond d'écran assombri initialisé
    datas->ui->rectGroup[1] = (SDL_Rect) {-1,-1,-1,-1};
    return 0;
}
int add_event(SDL_Event event,SDL_Window* windowP, SDL_Renderer* rendererP,Datas *datas, int *running){
    int width, height;
    int xMouse, yMouse;
    int idBt = -1;
    int i;
    int quantity;
    int net;
    char idInputTxt;
    char idProduct[13], name[64];
    SDL_Rect menu;

    //Refresh buttons' position
    SDL_GetWindowSize(windowP, &width, &height);
    menu = (SDL_Rect) {width/2-200, height/2-200, 400, 400};

    datas->ui->rectGroup[0] = menu;
    if(datas->ui->rectGroup[1].w == -1)
        datas->ui->rectGroup[1] = (SDL_Rect) {0,0,width,height};
    else if (datas->ui->rectGroup[1].w == width)
        datas->ui->rectGroup[1] = (SDL_Rect) {0,0,1,1};

    datas->ui->rectInputText[0] = (SDL_Rect) {menu.x+20, menu.y+50, menu.w-40, 40};
    datas->ui->rectInputText[1] = (SDL_Rect) {menu.x+20, menu.y+150, menu.w-40, 40};


    datas->ui->rectBt[0] = (SDL_Rect){menu.x+10,menu.y+370, menu.w/2 - 20,20};
    datas->ui->rectBt[1] = (SDL_Rect){menu.x+10+menu.w/2,menu.y+370, menu.w/2-20,20};
    datas->ui->rectBt[2] = (SDL_Rect){menu.x+20, menu.y+100, menu.w/2-40, 20};
    datas->ui->rectBt[3] = (SDL_Rect){menu.x+menu.w/2+20, menu.y+100, menu.w/2-40, 20};
    datas->ui->rectBt[4] = (SDL_Rect){menu.x+20, menu.y+200, menu.w/3-40, 20}; // Unite
    datas->ui->rectBt[5] = (SDL_Rect){menu.x+menu.w/3+20, menu.y+200, menu.w/3-40, 20}; // Kg
    datas->ui->rectBt[6] = (SDL_Rect){menu.x+menu.w/3*2+20, menu.y+200, menu.w/3-40, 20}; // L


    //Network listening
    if(datas->network->isListening){
        updateNet(datas);
    }

    //Mouse on buttons
    SDL_GetMouseState(&xMouse, &yMouse);
    if(event.type == SDL_MOUSEBUTTONDOWN){
        idBt = getIdButtonOn(*datas, xMouse, yMouse);
        switch(idBt){
            case 0: //Annuler
                add_end(datas);
                main_init(datas);
                datas->currentIEndFct = main_end;
                datas->currentIEventsFct = main_event;
                datas->currentIRenderFct = main_update;
                datas->network->isListening = 0;
                return 0;
            case 1:
                strcpy(idProduct,datas->ui->inputText[0]);
                if(!getInformationProduct(idProduct,&name)) break;
                quantity = quantiteParseur(datas->ui->inputText[1]);
                if(quantity == -1) break;
                datas->listProduct->productStart = addItem(datas->listProduct->productStart,&datas->listProduct->nbProduct,idProduct, name, quantity,datas->ui->idRadioBt-4);
                add_end(datas);
                main_init(datas);
                datas->currentIEndFct = main_end;
                datas->currentIEventsFct = main_event;
                datas->currentIRenderFct = main_update;
                datas->network->isListening = 0;

                return 0;
            case 2:
                datas->network->isListening = 1;
                break;
            case 3:
                datas->network->isListening = 0;
                break;
            case 4: // Unite
                datas->ui->idRadioBt = 4;
                break;
            case 5 : // KG
                datas->ui->idRadioBt = 5;
                break;
            case 6 : //L
                datas->ui->idRadioBt = 6;
                break;
        }
        idInputTxt = getIdInputTxtOn(*datas, xMouse, yMouse);
        datas->ui->ptrInputText = idInputTxt;
    }
    if(datas->ui->ptrInputText != -1){
        datas->network->lastPacket[0] = '\0';
        inputTxtListener(datas, event, datas->ui->ptrInputText, 16);
    }
    if(strlen(datas->network->lastPacket) > 0){
        strcpy(datas->ui->inputText[0],datas->network->lastPacket);
    }
    return 0;
}
int add_update(SDL_Window* windowP, SDL_Renderer* rendererP, Datas datas){

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
    SDL_Rect curFileName;

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


    //Dessin des boutons
    SDL_GetMouseState(&xMouse, &yMouse);
    idBt = getIdButtonOn(datas,xMouse, yMouse);
    for(i = 0; i < datas.ui->nbBt ;i++){
        if(idBt == i || (i == 2 && datas.network->isListening) ||
           (i == 3 && !datas.network->isListening) ){
            SDL_SetRenderDrawColor(rendererP,128, 64, 64, 0);
            button.x += 5;
            button.y += 5;
        }else if(i == datas.ui->idRadioBt){
            SDL_SetRenderDrawColor(rendererP,128, 64, 64, 0);
        }else{
            SDL_SetRenderDrawColor(rendererP,64,0,0, 0);
        }
        button = datas.ui->rectBt[i];
        buttonT = (SDL_Rect) {button.x+10, button.y +5, button.w -20, button.h -10};
        SDL_RenderFillRect(rendererP,&button);
        switch(i){
          case 0:SDL_RenderCopy(rendererP, datas.textures->texts[4], NULL, &buttonT);break; // Annuler
          case 1:SDL_RenderCopy(rendererP, datas.textures->texts[9], NULL, &buttonT);break; // Valider
          case 2:SDL_RenderCopy(rendererP, datas.textures->texts[11], NULL, &buttonT);break; // ecouter la lecture
          case 3:SDL_RenderCopy(rendererP, datas.textures->texts[12], NULL, &buttonT);break; // Arreter l'ecoute
          case 4:SDL_RenderCopy(rendererP, datas.textures->texts[18], NULL, &buttonT);break; // Unite
          case 5:SDL_RenderCopy(rendererP, datas.textures->texts[19], NULL, &buttonT);break; // KG
          case 6:SDL_RenderCopy(rendererP, datas.textures->texts[20], NULL, &buttonT);break; // L
        }

    }

    for(i = 0; i< datas.ui->nbInputText; i++){
        button = datas.ui->rectInputText[i];
        if(datas.ui->ptrInputText == i){
            SDL_SetRenderDrawColor(rendererP,128, 64, 64, 0);
            button.x += 5;
            button.y += 5;
        }else{
            SDL_SetRenderDrawColor(rendererP,64,0,0, 0);
        }
        SDL_RenderFillRect(rendererP, &button);
        if(strcmp(datas.ui->inputText[i], "") != 0){
            strcpy(tmpInputTxt, datas.ui->inputText[i]);
            buttonT = (SDL_Rect) {button.x+2, button.y+10, 10*strlen(datas.ui->inputText[i]), button.h-20};
            redrawText(rendererP, &datas, 2, tmpInputTxt, 0);
            SDL_RenderCopy(rendererP,datas.textures->texts[2],NULL,&buttonT);
        }
        buttonT = (SDL_Rect) {button.x+10, button.y-20, datas.surfaces->texts[i]->w/3, 15};
        if(i==0){
             SDL_RenderCopy(rendererP,datas.textures->texts[10],NULL,&buttonT);
        }else if(i==1){
           SDL_RenderCopy(rendererP,datas.textures->texts[17],NULL,&buttonT);
        }


    }

    //Rendu
    SDL_RenderPresent(rendererP);
    return 1;
}


int add_end(Datas *datas){
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
