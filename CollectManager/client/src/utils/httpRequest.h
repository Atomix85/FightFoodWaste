#include <curl/curl.h>

int userConnect(char* user, char* psw){
    char* answer;
    sendRequest("world.openfoodfacts.org/api/v0/product/737628064502.json",
                1,"",answer);

}

int sendRequest(char* url, int method ,char* args, char* answer ){
    CURL * curl;
    CURLcode res;

    //Init curl lib
    curl = curl_easy_init();

    if(curl){

        //Specify URL and POST args
        curl_easy_setopt(curl, CURLOPT_URL, url);
        if(method == 0){
            //GET
        }else
            //POST
            curl_easy_setopt(curl, CURLOPT_POSTFIELDS, args);

        //Send request
        res = curl_easy_perform(curl);

        if(res != CURLE_OK){
            fprintf(stderr, "curl_easy_perform() failed: %s\n",
              curl_easy_strerror(res));
            curl_easy_cleanup(curl);
            return 0;
        }
        else{
            res = curl_easy_getinfo(curl, CURLINFO_CONTENT_TYPE,answer);
            if((res==CURLE_OK) && answer){
                fprintf(stderr, "\n\n\n%s",
              &answer);
            }
            curl_easy_cleanup(curl);
            return 1;
        }

    }
}
