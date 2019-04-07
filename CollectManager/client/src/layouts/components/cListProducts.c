#include "cListProducts.h"

int drawListProduct(SDL_Renderer* rendererP, Datas datas, int width, int height){

    int i;
    char quantity[8];
    SDL_Rect tmpLine = (SDL_Rect) {0,40, 50, 10};
    ItemProduct *itemCurrent = datas.listProduct;

    if(datas.nbProduct == 0){
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

    for(i = 0; i < datas.nbProduct; i++){
        tmpLine.x = 45;

        if(itemCurrent->product == NULL) return 0;

        tmpLine.w = 8 * strlen(itemCurrent->product->idProduct);
        redrawText(rendererP, &datas, 2, itemCurrent->product->idProduct, 0);
        SDL_RenderCopy(rendererP,datas.textures->texts[2],NULL,&tmpLine);


        tmpLine.x = 155;

        tmpLine.w = 10 * strlen(itemCurrent->product->name);
        redrawText(rendererP, &datas, 2, itemCurrent->product->name, 0);
        SDL_RenderCopy(rendererP,datas.textures->texts[2],NULL,&tmpLine);

        tmpLine.x = 535;

        printf("%d %d\n", i, itemCurrent->product->quantity);
        makeQuantityFormat(quantity, *itemCurrent->product);
        tmpLine.w = 10 * strlen(quantity);
        redrawText(rendererP, &datas, 2, quantity, 0);
        SDL_RenderCopy(rendererP,datas.textures->texts[2],NULL,&tmpLine);

        SDL_RenderDrawLine(rendererP, 0,tmpLine.y+15, width, tmpLine.y+15);

        //itemCurrent = itemCurrent->next;
        tmpLine.y+=20;
    }


    return 1;

}

void makeQuantityFormat(char format[8], Product product){
    char result[8];
    char dec[3];
    if(product.quantity >= 10000){
        strcpy(result, ">99.9");
    }else if(product.quantity <= 0){
        strcpy(result, "<0.01");
    }else{
        if(product.quantity >= 100){
            strcpy(result, itoa(product.quantity/100,dec, 10));
        }else{
            strcpy(result, "0");
        }

        if(product.quantity % 100 != 0){
            strcat(result, ".");
            if((product.quantity%100) / 10 == 0) strcat(result,"0");
            strcat(result, itoa(product.quantity%100, dec, 10));
        }
    }

    switch(product.unity){
    case 0:
        break;
    case 1:
        strcat(result, " Kg");
        break;
    case 2:
        strcat(result, " L");
        break;
    }

    strcpy(format, result);
    strcpy(format, "test");

}
