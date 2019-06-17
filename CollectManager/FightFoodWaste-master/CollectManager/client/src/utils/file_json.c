#include "file_json.h"
#define TAILLE_max 1000

int parse_json(ItemProduct* start,char *user,char *psw){

    FILE* file = NULL;
    FILE* file_json = NULL;
    char nom[TAILLE_max] = "";
    char id[14];
    int qua = 0;
    int uni = 0;
    char *name;
    char *quantite;
    char *idProduct;
    char *unite;
    char chaine [TAILLE_max] = "";
    char chaine2 [TAILLE_max] = "";
    char chaine3 [TAILLE_max] = "";
    char *user1 = user ;
    char *psw1 = psw ;
    char* answer;
    int result = 0;
    char errorMsg[32];

    file =  fopen("tmp/test.txt","r");
    file_json = fopen("tmp/file.json","w");

    ItemProduct* item = start;
    if(file != NULL){
        if(file_json != NULL){
           fprintf(file_json," { \"user\" : \"%s\" , \n ",user1);
           fprintf(file_json,"  \"psw\" : \"%s\" , \n \"products\":[ ",psw1);
           while(item != NULL){
              strcpy(id,item->idProduct);
              strcpy(nom,item->name);
              qua = item->quantity;
              uni = item->unity;

              //printf("id : %s , uni  : %d , qua : %d , nom : %s  ",id,uni,qua,nom);
              //ItemProduct* addItem(ItemProduct* start,int* number, char idProduct[13], char name[48], int quantity, char unity){
                fprintf(file_json,"{");


                fprintf(file_json,"  \"name\" : \"%s\" , \n ",nom);
                fprintf(file_json," \"quantity\" : %d ,\n",qua);
                fprintf(file_json," \"idProduct\" : \"%s\" , \n ",id);
                fprintf(file_json," \"unity\" : \"%d\" \n ",uni);

                fprintf(file_json,"}");
                if(item->next != NULL)
                    fprintf(file_json,",");
                item = item->next;
                fseek(file, 1, SEEK_SET);
            }
            fprintf(file_json,"\n]\n} ");
        }
    }

     fseek(file_json, 1, SEEK_SET);
     while(fgets(chaine2,TAILLE_max,file_json)!=NULL){
            strcat(chaine3,chaine2);
     }

    fclose(file_json);
    fclose(file);


}
