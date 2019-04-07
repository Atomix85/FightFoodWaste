/**
* \file netManager.c
* \author Alan B.
* \version 1.0
* \date 01/04/2019
*
* Fichier contenant la structure du NET_manager
*/

#include <stdio.h>
#include <stdlib.h>
#include <SDL2/SDL.h>
#include <SDL2/SDL_net.h>

#ifndef PRODUCT_H
#define PRODUCT_H

/**Strcture contenant les différents éléments de réseau*/
typedef struct Product Product;
struct Product {
    char idProduct[14];
    char name[48];
    char unity;
    int quantity;   // 'this' quantity = real-quantity * 100
                    // e.g. '4' -> 400; '0.5Kg' -> 50; '7.5L' -> 750...
};
/**Strcture contenant les différents éléments de réseau*/
typedef struct ItemProduct ItemProduct;
struct ItemProduct {
    Product *product;
    ItemProduct *next;
};

#endif
