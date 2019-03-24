/**
* \file config.c
* \author Alan B.
* \version 1.0
* \date 25/11/2018
*
* Fichier g�rant la configuration du programme
*/


#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include "SDL2/SDL.h"

#ifndef CONF_DEFINE
#define CONF_DEFINE

/**
Strcture contenant la configuration du programme
*/
typedef struct Config Config;
struct Config {

    /**Ordre 1 : Plein �cran*/
    int fullscreen;
    /**Ordre 2 : Application fenetr� avec taille maximale*/
    int maximized;
    /**Ordre 3 : Largeur de l'application fenetr�e */
    int width;
    /**Ordre 3 : Hauteur de l'application fenetr�e */
    int height;
    /** Chemin des sauvegardes */
    char savesPath[64];
    /** Chemin des ressources images */
    char imgPath[64];
    /** Chemin des polices */
    char fontsPath[64];

    int upChoose;
    int downChoose;
    int navUp;
    int navDown;
    int navLeft;
    int navRigth;

};
/**Fonction chargeant la configuration d'apr�s le chemin
donn� en param�tre*/
Config initConf(char * confFilename);

/** R�cup�re le code SDLK � partir d'un IDNAME d'une touche du clavier */
int getIntKeyFromStr(char * str);
#endif // CONF_DEFINE
