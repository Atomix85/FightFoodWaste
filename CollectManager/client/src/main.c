#include <SDL2/SDL.h>
#include <stdio.h>
#include <pthread.h>
#include "kernel.h"
#include "ressources.h"
#include "datas/commons_datas.h"
#include "datas/surfacesManager.h"
#include "datas/texturesManager.h"
#include "config.h"
#include "utils/network.h"

/**
*
* \file main.c
* \author Alan B., Kimia K.
* \version 1.0.0
* \date 10/04/2019
*
* COLLECTMANAGER PROJECT
*
*/

int main(int argc, char** argv)
{
    SDL_Window* win;
    SDL_Renderer* render;
    int net;

    struct WinArgs *win_args;

    pthread_t win_thread;
    pthread_t network_thread;

    Datas cDatas;

    //On charge les ressources (dont la configuration) du logiciel
    Ressources r = getFilledRessources("conf.ini");

    Surfaces_manager sm;
    Textures_manager tm;
    UI_manager uim;
    NET_manager netm;
    ListProduct lprod;


    //On assigne les différents managers du programme
    cDatas.surfaces = &sm;
    cDatas.textures = &tm;
    cDatas.ui = &uim;
    cDatas.network = &netm;
    cDatas.listProduct = &lprod;

    //On définit la version et le nom du projet utilisé dans le programme
    cDatas.version = "1.0.0";
    cDatas.projectName = "CollectManager";

    cDatas.network->isActivated = initNet(&cDatas,15340);

    cDatas.listProduct->productStart = NULL;
    cDatas.listProduct->nbProduct = 0;

    //On essaye d'initialisé et ensuite de post-initialisé
    //avant de faire tourner le programme en boucle
    if(init(&win, &render,r) &  postInit(render, &cDatas,r)){
        updateApp(win, render, &cDatas);
    }

    //La fin du programme détruit et désalloue ce qui a été alloué
    endApp(win, render, cDatas,r);
    if(cDatas.network->isActivated){
        endNet();
    }
    return 0;
}
