#include "network.h"

int initNet(Uint16 port){
    IPaddress ip;
    if(SDLNet_Init() == -1){
        printf("SDLNet_Init: %s\n",SDLNet_GetError());
        return 0;
    }
    if(SDLNet_ResolveHost(&ip, NULL, port)==-1){
        printf("CANNOT RESOLVE IP : %s", SDLNet_GetError());
        return 0;
    }

    return 1;
}

void updateNet(){

/*
    SOCKADDR_IN sin;
    SOCKET sock;
    socklen_t recsize = sizeof(sin);

    SOCKADDR_IN csin;
    SOCKET csock;
    socklen_t crecsize = sizeof(csin);

    int sock_err;

    sock = socket(AF_INET, SOCK_STREAM,0);
    if(sock != INVALID_SOCKET){
        sin.sin_addr.s_addr = htonl(INADDR_ANY);
        sin.sin_family = AF_INET;
        sin.sin_port = htons(15340);
        sock_err = bind(sock, (SOCKADDR*) &sin, recsize);

        if(sock_err != SOCKET_ERROR){

            sock_err = listen(sock, 1);
            printf("LISTENING ON %d...\n", 15340);

            if(sock_err != SOCKET_ERROR){
                printf("TRYING CONNECT %d...\n", 15340);
                csock = accept(sock, (SOCKADDR*) &csin, &crecsize);
                printf("A CLIENT WAS CONNECTED ON SOCKET %d OF %s:%d\n", csock, inet_ntoa(csin.sin_addr), htons(csin.sin_port));
            }
            else
                perror("listen");
        }else
            perror("bind");
    }else
        perror("socket");

    closesocket(csock);
    closesocket(sock);


    sock = socket(AF_INET, SOCK_STREAM,0);

*/
}

void endNet(void){
    SDLNet_Quit();
}
