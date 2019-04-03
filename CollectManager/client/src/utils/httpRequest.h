#include <curl/curl.h>

#define GET_REQUEST     0
#define POST_REQUEST    1

int userConnect(char* user, char* psw, char *errorMsg){
    char* answer;

    char inlineArgs[255];
    char key[2][32] = {"user", "psw"};
    char value[2][64];
    int result=0;

    strcpy(value[0],user);    strcpy(value[1],psw);

    makeArgs(key,value, 2,&inlineArgs);

    if(sendRequest("176.132.110.29",
                POST_REQUEST,inlineArgs,&answer)){
        if(strcmp(answer, "ok") == 0){
            result=1;
        }
        else{
            strcpy(errorMsg, answer);
            result=0;
        }

        destroyAnswer(&answer);
        return result;
    }else{
        return 0;
    }
}
int makeArgs(char (*argsKey)[32],char (*argsValue)[64], int nb, char **inlineArgs){
    int i;
    (inlineArgs)[0] = '\0';
    for(i = 0; i < nb; i++){
        strcat(inlineArgs, argsKey[i]);
        strcat(inlineArgs, "=");
        strcat(inlineArgs, argsValue[i]);
        if(i + 1 != nb){
            strcat(inlineArgs, "&");
        }
    }
    return 1;
}
int getInformationProduct(long long numProduct){
    char* answer;
    char url[255];
    char strProduct[32];

    strcpy(url, "fr.openfoodfacts.org/api/v0/produit/");
    lltoa(numProduct,strProduct ,10);
    strcat(url, strProduct);
    strcat(url, ".json");

    if(sendRequest(url, GET_REQUEST,"",&answer)){


        destroyAnswer(&answer);
    }
    else{
        return 0;
    }
    return 1;
}

struct MemoryAnswer{
    char *buffer;
    size_t _size;
};

size_t ptrFuncWriteAnswer(void *contents, size_t _size, size_t nmemb, void *userp){
    size_t appliedSize = _size * nmemb;
    struct MemoryAnswer *mem = (struct MemoryAnswer*) userp;

    char *ptr = realloc(mem->buffer, mem->_size + appliedSize + 1);
    if(ptr == NULL){
        fprintf(stderr, "Out of memory error while getting datas from server !");
        return 0;
    }
    mem->buffer = ptr;
    memcpy(&(mem->buffer[mem->_size]), contents, appliedSize);
    mem->_size += appliedSize;
    mem->buffer[mem->_size] = 0;
    return appliedSize;
}

int sendRequest(char* url, int method ,char* args, char** answer ){
    CURL * curl;
    CURLcode res;
    char realUrl[512];
    struct MemoryAnswer buffer;

    //Init buffer and buffer size of answer
    buffer.buffer = malloc(1);
    buffer._size = 0;

    //Init curl lib
    curl = curl_easy_init();

    if(curl){

        //Set the callback function to specify how to write data from server
        curl_easy_setopt(curl, CURLOPT_WRITEFUNCTION, ptrFuncWriteAnswer);
        curl_easy_setopt(curl, CURLOPT_WRITEDATA, (void*)&buffer);

        //Initialize the real url (for GET request)
        strcpy(realUrl, url);

        if(method == GET_REQUEST){
            //Add to url the GET methods
            if(strlen(args))
                strcat(realUrl,"?");
            strcat(realUrl, args);
        }else if(method == POST_REQUEST){
            //Set the args in post fields
            curl_easy_setopt(curl, CURLOPT_POSTFIELDSIZE, strlen(args));
            curl_easy_setopt(curl, CURLOPT_POSTFIELDS, args);
        }
        //Set the url in option of request
        curl_easy_setopt(curl, CURLOPT_URL, realUrl);

        printf("%s\n",args);

        //Send request
        res = curl_easy_perform(curl);

        //If it failed, we catch an error and return 0
        if(res != CURLE_OK){
            fprintf(stderr, "curl_easy_perform() failed: %s\n",
              curl_easy_strerror(res));
            curl_easy_cleanup(curl);
            return 0;
        }
        //For debug (to remove), print the size of buffer writen
        printf("%lu bytes retrieved from %s\n", (unsigned long)buffer._size, realUrl);

        //Allocate a char* to push the buffer in it (will have to free)
        *answer = (char*) malloc(sizeof(char) * buffer._size);
        strcpy(*answer, buffer.buffer);

        //Destroy buffer and curl
        curl_easy_cleanup(curl);
        free(buffer.buffer);

        //Return the number of byte of buffer (to check)
        return (int) buffer._size;

    }
}

void destroyAnswer(char** answer){
    //Destroy an allocated answer
    free(*answer);
}
