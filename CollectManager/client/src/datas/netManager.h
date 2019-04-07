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

#ifndef NET_MANAGER_H
#define NET_MANAGER_H

/**Strcture contenant les différents éléments de réseau*/
typedef struct NET_manager NET_manager;
struct NET_manager {
    /** Ip du serveur et du client*/
    IPaddress ip,*remoteip;
    /** Socket du serveur et du client */
    TCPsocket server, client;
    /** Dernier paquet de 1024 bits reçus */
    char lastPacket[1024];
    /** Est en train d'écouter */
    char isListening;

    char isActivated;

};

#endif // UI_MANAGER_H
