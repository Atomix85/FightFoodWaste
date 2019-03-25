#include <curl/curl.h>

int userConnect(char* user, char* psw){

    CURL * curl;
    CURLcode res;

    //Init curl lib
    curl = curl_easy_init();

    if(curl){

        //Specify URL and POST args
        curl_easy_setopt(curl, CURLOPT_URL, "http://3dhandler.org");
        curl_easy_setopt(curl, CURLOPT_POSTFIELDS, "name=daniel&project=curl");

        //Send request
        res = curl_easy_perform(curl);

        if(res != CURLE_OK)
            fprintf(stderr, "curl_easy_perform() failed: %s\n",
              curl_easy_strerror(res));

        curl_easy_cleanup(curl);
    }
    return 1;
}
