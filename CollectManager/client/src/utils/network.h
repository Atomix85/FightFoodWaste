#include <stdio.h>
#include <stdlib.h>
#include <winsock2.h>
typedef int socklen_t;

int initWSA(void){
    WSADATA wsa;
    int err = WSAStartup(MAKEWORD(2,2), &wsa);
    if(err < 0){
        puts("WSAStartup failed !");
        return 0;
    }
    return 1;
}

void updateNet(void){

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
        sin.sin_port = htons(85340);
        sock_err = bind(sock, (SOCKADDR*) &sin, recsize);

        if(sock_err != SOCKET_ERROR){
            csock = accept(sock, (SOCKADDR*) &csin, &crecsize);
            printf("Client connecté");
        }else
            perror("listen");
    }else
        perror("bind");

    closesocket(csock);
    closesocket(sock);


    sock = socket(AF_INET, SOCK_STREAM,0);


}

void endWSA(void){
    WSACleanup();
}
