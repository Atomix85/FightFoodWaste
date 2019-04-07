#include "listHelper.h"

void addItem(ItemProduct** start, Product product){
    ItemProduct * item;
    Product * ptrProduct;
    item = malloc(sizeof(ItemProduct));
    ptrProduct = malloc(sizeof(Product));
    *ptrProduct = (Product) product;
    item->product = ptrProduct;
    item->next = *start;
    *start = item;
}

ItemProduct* removeItem(ItemProduct * start)
{
    ItemProduct * inter;
    if(start == NULL) return NULL;
    inter = start->next;
    free(start->product);
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
