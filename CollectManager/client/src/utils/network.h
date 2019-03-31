#include <stdio.h>
#include <stdlib.h>
#include <SDL2/SDL_net.h>

#ifndef NET_INCLUDE
#define NET_INCLUDE

typedef int socklen_t;

int initWSA(void);

void updateNet();

void endWSA(void);
#endif // NET_INCLUDE
