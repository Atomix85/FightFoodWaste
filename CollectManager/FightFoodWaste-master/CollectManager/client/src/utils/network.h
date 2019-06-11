#include <stdio.h>
#include <stdlib.h>
#include <SDL2/SDL_net.h>
#include "../datas/commons_datas.h"

#ifndef NET_INCLUDE
#define NET_INCLUDE

int initNet(Datas* datas,Uint16 port);

void updateNet(Datas* datas);

void endNet(void);
#endif // NET_INCLUDE
