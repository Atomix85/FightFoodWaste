/**
* \file ressources.c
* \author Alan B.
* \version 1.6
* \date 12/12/2018
*
* Fichier qui g�re l'int�gralit� des liens de ressources avant leur chargement en postInit
*/

#include <stdio.h>
#include <stdlib.h>

#include "config.h"

#ifndef RESSOURCES_H
#define RESSOURCES_H



#define NB_IMAGES 0
#define NB_TEXT 10


/**
Strcture contenant toutes les ressources n�cessaire
au programme(lien image, son...)
*/
typedef struct Ressources Ressources;
struct Ressources {

    Config config;
    int sizeListImgFiles;
    char listImgFiles[NB_IMAGES][64];
    int sizeListText;
    char listText[NB_TEXT][64];
    char font[255];
    char appVersion[32];

};


/**
Renvoie la structure Ressources avec les variables
affect�es
*/
Ressources getFilledRessources(char * configFile);

#endif

