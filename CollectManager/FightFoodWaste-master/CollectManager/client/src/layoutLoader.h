/**
* \file layoutLoader.c
* \author Alan B.
* \date 25/11/2018
* \version 1.4
*
* Ce fichier g�re le lien entre le kernel et les diff�rentes
* interfaces du programme
*/

#ifndef LAYOUT_LOADER
#define LAYOUT_LOADER

#include <SDL2/SDL.h>
#include <stdio.h>
#include <stdlib.h>
#include <SDL2/SDL_ttf.h>

#include "ressources.h"
#include "layouts/iConnexion.h"
#include "datas/commons_datas.h"

/**
Fonction appel� afin d'initialiser le layout
*/
int initLayouts(SDL_Renderer* rendererP, Datas* datas);
/**
Fonction permettant de cr�er les textures � partir des images
Requiert l'initialisation des surfaces des images dans Datas
*/
int initTextures(SDL_Renderer* rendererP, Datas* datas);
/**
Fonction permettant de cr�er les textures � partir des textes
Requiert l'initialisation des surfaces des textes dans Datas
*/
int initTexsTex(SDL_Renderer* rendererP, Datas* datas);
/**
Fonction permettant de modifier un texte en rep�tant les �tapes de mise
en texture
*/
void redrawText(SDL_Renderer* rendererP, Datas* datas, int ptrText, char * newText, int codeColor);
/**
Fonction mettant � jour le rendu selon l'interface de rendu point�e
*/
int updateRender(SDL_Window* windowP, SDL_Renderer* rendererP, Datas datas);
/**
Fonction mettant � jour les �v�nements selon l'interface d'�v�nement point�e
*/
void updateEvent(SDL_Event event,SDL_Window * windowP,SDL_Renderer * rendererP,  Datas * datas, int * running);
/**
Fonction appel� afin de d�truire les textures de Datas
*/
int destroyTextures(Datas datas);

#endif // LAYOUT_LOADER
