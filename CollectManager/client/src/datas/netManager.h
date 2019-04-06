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

/**Strcture contenant les diff�rents �l�ments de r�seau*/
typedef struct NET_manager NET_manager;
struct NET_manager {
    IPaddress ip,*remoteip;
    TCPsocket server, client;
    char lastPacket[1024];
    char isListening;

};

#endif // UI_MANAGER_H
