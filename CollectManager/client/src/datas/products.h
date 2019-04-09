

#include <stdio.h>
#include <stdlib.h>
#include <SDL2/SDL.h>
#include <SDL2/SDL_net.h>

#ifndef PRODUCT_H
#define PRODUCT_H


typedef struct ItemProduct ItemProduct;
struct ItemProduct {
    char idProduct[14];
    char name[48];
    char unity;
    int quantity;
    ItemProduct *next;
};

typedef struct ListProduct ListProduct;
struct ListProduct {
    ItemProduct* productStart;
    int nbProduct;
};

#endif
