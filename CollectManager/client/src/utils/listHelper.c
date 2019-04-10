#include "listHelper.h"

ItemProduct* addItem(ItemProduct* start, char idProduct[13], char name[48], int quantity, char unity){
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
    item->quantity = quantity;
    item->unity = unity;
    printf("Add : %x", item);
    item->next = start;
    return item;


}

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
ItemProduct *removeAll(ItemProduct *start){
    ItemProduct * inter = start;
    while(inter != NULL){
        inter = removeItem(inter);
    }
    return inter;
}
