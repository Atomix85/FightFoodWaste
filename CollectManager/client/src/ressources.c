#include "ressources.h"


Ressources getFilledRessources(char * configFile){

    int i;
    char temp[64];
    //Remplit la structure des ressources
    Ressources r = {
        initConf(configFile),
        NB_IMAGES,
        {
            "fond.png",         //0
        },
        NB_TEXT,
        {   //Info : les textes précédents d'un _ sont des textes dynamiques par convention
            "Utilisateur :",
            "Mot de passe :",
            "_inputText",
            "Se connecter",
            "   Annuler   ",
            "Ajouter un article", //5
            "Supprimer un article",
            "Soumettre la liste",
            " " //Error


        },
        "Atures-700_PERSONAL_USE.ttf",  //Police
    };

    //On ajoute le chemin contenant les images
    for(i = 0; i < r.sizeListImgFiles;i++){
        strcpy(temp, r.config.imgPath);
        strcat(temp, r.listImgFiles[i]);
        strcpy(r.listImgFiles[i], temp);
    }
    //On ajoute le chemin contenant la police
    strcpy(temp, r.config.fontsPath);
    strcat(temp, r.font);
    strcpy(r.font, temp);

    return r;
}


