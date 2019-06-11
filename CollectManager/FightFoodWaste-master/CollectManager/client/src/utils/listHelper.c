#include "listHelper.h"

// Ajout les produits dans l'inteface 'tableau'
ItemProduct* addItem(ItemProduct* start,int* number, char idProduct[13], char name[48], int quantity, char unity){
    ItemProduct * item;

    ItemProduct * testProduct = start;
    while(testProduct != NULL){
        if(strcmp(testProduct->idProduct,idProduct) == 0 &&
           testProduct->unity == unity){
            testProduct->quantity += quantity;
            return start;
        }
        testProduct = testProduct->next;
    }

    item = malloc(sizeof(ItemProduct));
    strcpy(item->idProduct,idProduct);
    strcpy(item->name,name);
    item->id = *(number);
    item->quantity = quantity;
    item->unity = unity;
    printf("Add : %x", item);
    item->next = start;
    (*number)++;
    return item;


}

//
int pushList(ItemProduct* start){
    ItemProduct* item = start;
    while(item != NULL){
        pushProduct(item->idProduct, item->name, item->quantity, item->unity);
        item = item->next;
    }
    return 1;
}

ItemProduct* removeItem(ItemProduct * start)
{
    ItemProduct * inter;
    if(start == NULL) return NULL;
    inter = start->next;
    free(start);
    return inter;
}
ItemProduct* removeAt(ItemProduct* items,int id){
    ItemProduct* inter;
    if(items == NULL){
        return NULL;
    }
    if(id == items->id){
        inter = items->next;
        free(items);

        inter = removeAt(inter,id);
        return inter;
    }else{
        items->next = removeAt(items->next,id);
        return items;
    }
}
ItemProduct *removeAll(ItemProduct *start){
    ItemProduct * inter = start;
    while(inter != NULL){
        inter = removeItem(inter);
    }
    return inter;
}

int quantiteParseur(char* inputTxt){

    double value;
    int result;

    if(inputTxt[0] == '\0'){
        return -1;
    }

    value = atof(inputTxt);
    if(value < 0.01){
        return -1;
    }else if(value > 99.99){
        return -1;
    }else{
        result = value * 100;
        return result;
    }
}
