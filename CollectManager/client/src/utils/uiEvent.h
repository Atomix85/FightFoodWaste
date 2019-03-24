/**
* \file uiEvent.c
* \author Alan B.
* \version 1.0
* \date 25/11/2018
*
* Fichier contenant des fonctionnalit�s utiles pour g�rer les �venements
* d'une interface
*/

#ifndef UI_EVENT

#define UI_EVENT

#include "../datas/commons_datas.h"
#include <SDL2/SDL.h>

/**
Obtient l'identifiant d'un bouton o�
la position du curseur est dessus
*/
int getIdButtonOn(Datas datas, int xMouse, int yMouse);

/** Ecoute l'entr�e des touches du clavier en le stockant dans filenameInputTxt */
int inputTxtListener(Datas * datas, SDL_Event event, int lenghtMax);

#endif // UI_EVENT
