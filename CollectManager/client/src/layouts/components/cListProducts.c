#include "cListProducts.h"

int drawListProduct(SDL_Renderer* rendererP, Datas datas, int width, int height){

    int i;
    char quantity[9];
    SDL_Rect tmpLine = (SDL_Rect) {0,40, 50, 10};
    ItemProduct *itemCurrent = datas.listProduct->productStart;

    if(datas.listProduct->nbProduct == 0){
        tmpLine = (SDL_Rect) {width/2-50, height/2,100, 10};
        redrawText(rendererP, &datas, 2, "Liste vide !", 0);
        SDL_RenderCopy(rendererP,datas.textures->texts[2],NULL,&tmpLine);
        return 0;
    }
    SDL_RenderDrawLine(rendererP, 40,40, 40, height);

    redrawText(rendererP, &datas, 2, "Identifiant", 0);
    tmpLine = (SDL_Rect) {45, 40, 100, 10};
    SDL_RenderCopy(rendererP,datas.textures->texts[2],NULL,&tmpLine);
    SDL_RenderDrawLine(rendererP, 150,40, 150, height);

    redrawText(rendererP, &datas, 2, "Nom du produit", 0);
    tmpLine = (SDL_Rect) {270, 40,140, 10};
    SDL_RenderCopy(rendererP,datas.textures->texts[2],NULL,&tmpLine);
    SDL_RenderDrawLine(rendererP, 530,40, 530, height);

    redrawText(rendererP, &datas, 2, "Quantite", 0);
    tmpLine = (SDL_Rect) {545, 40,80, 10};
    SDL_RenderCopy(rendererP,datas.textures->texts[2],NULL,&tmpLine);

    SDL_RenderDrawLine(rendererP, 0,60, width, 60);

    tmpLine = (SDL_Rect) {45,65,100,10};

    while(itemCurrent != NULL){
        tmpLine.x = 45;

        printf("addr=%x,id=%s, nxt=%x\n", itemCurrent, itemCurrent->idProduct, itemCurrent->next);

        tmpLine.w = 8 * strlen(itemCurrent->idProduct);
        redrawText(rendererP, &datas, 2, itemCurrent->idProduct, 0);
        SDL_RenderCopy(rendererP,datas.textures->texts[2],NULL,&tmpLine);


        tmpLine.x = 155;

        tmpLine.w = 10 * strlen(itemCurrent->name);
        redrawText(rendererP, &datas, 2, itemCurrent->name, 0);
        SDL_RenderCopy(rendererP,datas.textures->texts[2],NULL,&tmpLine);

        tmpLine.x = 535;

        makeQuantityFormat(&quantity, itemCurrent);

        tmpLine.w = 10 * strlen(quantity);
        redrawText(rendererP, &datas, 2, quantity, 0);
        SDL_RenderCopy(rendererP,datas.textures->texts[2],NULL,&tmpLine);

        SDL_RenderDrawLine(rendererP, 0,tmpLine.y+15, width, tmpLine.y+15);


        itemCurrent = itemCurrent->next;
        if(itemCurrent == NULL){
            break;
        }
        tmpLine.y+=20;
    }


    return 1;

}

void makeQuantityFormat(char (*format)[9], ItemProduct* product){

    char result[9];
    char dec[3];
    int mod,div;
    div = product->quantity/100;
    mod = product->quantity%100;

    if(product->quantity >= 10000){
        strcpy(result, ">99.9");
    }else if(product->quantity <= 0){
        strcpy(result, "<0.01");
    }else{
        if(product->quantity >= 100){
            strcpy(result, itoa(div,dec, 10));
        }else{
            strcpy(result, "0");
        }

        if(mod != 0){
            strcat(result, ".");
            if(mod / 10 == 0) strcat(result,"0");
            strcat(result, itoa(mod, dec, 10));
        }
    }


    switch(product->unity){

    case 1:
        strcat(result, " Kg");
        break;
    case 2:
        strcat(result, " L");
        break;
    default:
        break;
    }
    strcpy(*format, result);
    printf("addr=%x,id=%s, nxt=%x\n", product, product->idProduct, product->next);
}
