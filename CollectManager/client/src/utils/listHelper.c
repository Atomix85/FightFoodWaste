#include "listHelper.h"

ItemProduct* addItem(ItemProduct* start, char idProduct[13], char name[48], int quantity, char unity){
    ItemProduct * item;
    item = malloc(sizeof(ItemProduct));
    strcpy(item->idProduct,idProduct);
    strcpy(item->name,name);
    item->quantity = quantity;
    item->unity = unity;

    item->next = start;
    return item;


}

ItemProduct* removeItem(ItemProduct * start)
{
    ItemProduct * inter;
    if(start == NULL) return NULL;
    inter = start->next;
    free(start);
    return inter;
}
ItemProduct *removeAll(ItemProduct *start){
    ItemProduct * inter = start;
    while(inter != NULL){
        inter = removeItem(inter);
    }
    return inter;
}
