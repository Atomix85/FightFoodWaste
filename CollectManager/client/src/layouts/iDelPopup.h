/**
* \file iLevelManager.c
* \author Sophie P.
* \date 12/12/2018
* \version 1.1
*
* Dessine le menu de choix des niveaux du mode didacticiel
*/

#include <SDL2/SDL.h>
#include <stdio.h>
#include <stdlib.h>
#include <SDL2/SDL_ttf.h>
#include <string.h>

#include "../datas/commons_datas.h"
#include "../utils/uiEvent.h"

#ifndef I_CONCEPTION_MSG_H
#define I_CONCEPTION_MSG_H

#include "../layoutLoader.h"

#endif // I_CONCEPTION_MSG_H

/**
Obligatoire : Initialisation de la page (allocation des tableaux UI)
*/
int del_init(Datas *datas);
/**
Obligatoire : Mise à jour du rendu de la page (affichage des éléments UI)
*/
int del_update(SDL_Window* windowP, SDL_Renderer* renderer, Datas datas);
/**
Obligatoire : Mise à jour de la position des élements UI et écoute des évenements de ceux ci
*/
int del_event(SDL_Event event,SDL_Window* windowP,SDL_Renderer* renderer,Datas *datas, int *running);
/**
Obligatoire : Destruction de la page (désallocation des tableaux UI)
*/
int del_end(Datas *datas);
