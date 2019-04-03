/**
* \file commons_datas.c
* \author Alan B.
* \version 1.5
* \date 12/12/2018
*
* Fichier contenant le patron du principale DTO du programme : Data
*/


#include <stdio.h>
#include <stdlib.h>
#include "SDL2/SDL.h"
#include "SDL2/SDL_ttf.h"


#include "surfacesManager.h"
#include "texturesManager.h"
#include "uiManager.h"
#include "netManager.h"
#include "../config.h"


#ifndef DATAS_H
#define DATAS_H

typedef struct Module Module;

/**
La structure Datas est le DTO principal du programme
*/
typedef struct Datas Datas;
struct Datas {

    /**Accès aux surfaces chargés*/
    Surfaces_manager* surfaces;
    /**Accès aux textures chargés*/
    Textures_manager* textures;

    NET_manager* network;

    SDL_AudioSpec outAudio;
    /**Accès aux UI*/
    UI_manager* ui;

    /**Input texte fichier
    @deprecated
    */
    char inputTxt[32];

    /**Version du projet*/
    char *version;
    /**Nom du projet*/
    char *projectName;

    /** Configuration du logiciel */
    Config config;

    /**Pointeur vers la fonction de rendu actuelle*/
    int (*currentIRenderFct)(SDL_Window *,SDL_Renderer *, Datas);
    /**Pointeur vers la fonction des évènements actuelle*/
    int (*currentIEventsFct)(SDL_Event, SDL_Window*, SDL_Renderer*, Datas*, int*);
     /**Pointeur vers la fonction de destruction actuelle*/
    int (*currentIEndFct)(Datas*);

    /**Police de texte du programme*/
    TTF_Font* font;
};

#endif // DATAS_H
