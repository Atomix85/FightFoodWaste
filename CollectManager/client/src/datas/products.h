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
    long long idProduct;
    char* name;

};

#endif
