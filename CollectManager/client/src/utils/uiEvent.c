#include "uiEvent.h"

int getIdButtonOn(Datas datas, int xMouse, int yMouse){

    int i;
    int nbButton = datas.ui->nbBt;

    SDL_Rect currentBt;

    for(i = 0; i < nbButton; i++){

        currentBt = datas.ui->rectBt[i];

        if(currentBt.x < xMouse && xMouse < currentBt.x+currentBt.w
            && currentBt.y < yMouse && yMouse < currentBt.y+currentBt.h){

            return i;
        }
    }
    return -1;
}
int getIdInputTxtOn(Datas datas, int xMouse, int yMouse){
    int i;
    int nbInputTxt = datas.ui->nbInputText;

    SDL_Rect currentBt;

    for(i = 0; i < nbInputTxt; i++){

        currentBt = datas.ui->rectInputText[i];

        if(currentBt.x < xMouse && xMouse < currentBt.x+currentBt.w
            && currentBt.y < yMouse && yMouse < currentBt.y+currentBt.h){

            return i;
        }
    }
    return -1;
}
int inputTxtListener(Datas * datas, SDL_Event event, char ptrInputText, int lenghtMax){
    int keycode;
    int keymod;
    char letter;
    short lenght = strlen(datas->ui->inputText[ptrInputText]);
    if(event.type == SDL_KEYDOWN){
        keycode = event.key.keysym.sym;
        keymod = event.key.keysym.mod;

        if( (124 > keycode && keycode >= 95 ) ||
            (58 > keycode && keycode >= 48) ||
            (32 == keycode)||
            (59 == keycode)){
            if(lenght > lenghtMax) return 0;
            letter = (char)keycode;
            if(letter == ';'){
                letter = '.';
            }if(keycode == '0' && (char)keymod == '@'){
                 letter = '@';
            }
            datas->ui->inputText[ptrInputText][lenght] = letter;

            datas->ui->inputText[ptrInputText][lenght+1] = '\0';
        }else if (8 == keycode && lenght> 0){
            datas->ui->inputText[ptrInputText][lenght-1] = '\0';
        }
    }
    return 1;
}
