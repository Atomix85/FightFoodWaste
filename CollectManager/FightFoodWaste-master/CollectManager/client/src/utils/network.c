#include "network.h"

int initNet(Datas* datas,Uint16 port){
    if(SDLNet_Init() == -1){
        printf("SDLNet_Init: %s\n",SDLNet_GetError());
        return 0;
    }
    if(SDLNet_ResolveHost(&datas->network->ip, NULL, port)==-1){
        printf("CANNOT RESOLVE IP : %s\n", SDLNet_GetError());
        return 0;
    }
    datas->network->server = SDLNet_TCP_Open(&datas->network->ip);
    if(!datas->network->server){
        printf("CANNOT OPEN TCP CONNECTION : %s\n", SDLNet_GetError());
        return 0;
    }
    return 1;
}

void updateNet(Datas* datas){
    Uint32 ipaddr;
    char response[14];
    short len;
    datas->network->client = SDLNet_TCP_Accept(datas->network->server);
    if(!datas->network->client){
        return;
    }
    datas->network->remoteip = SDLNet_TCP_GetPeerAddress(datas->network->client);
    if(!datas->network->remoteip){
        printf("CANNOT RESOLVE THE CLIENT IP ! %s\n", SDLNet_GetError());
        return;
    }
    ipaddr = SDL_SwapBE32(datas->network->remoteip->host);
    printf("CONNECTED CLIENT %d.%d.%d.%d on %hu\n",
           ipaddr>>24,(ipaddr>>16)&0xff,
           (ipaddr>>8)&0xff,ipaddr&0xff,
           datas->network->remoteip->port);
    len=SDLNet_TCP_Recv(datas->network->client,response, 14);
    SDLNet_TCP_Close(datas->network->client);
    if(!len){
        printf("\tCANNOT RECEIVE CLIENT MESSAGE : %s\n", SDLNet_GetError());
        return;
    }
    response[13] = '\0';
    strcpy(datas->network->lastPacket,response);
    //datas->network->isListening = 0;
    return;

}

void endNet(void){
    SDLNet_Quit();
}
