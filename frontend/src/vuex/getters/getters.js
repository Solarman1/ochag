export default {
    PRODUCTS(state){
        return state.products;
    },
    CATEGORYS(state){
        return state.categorys;
    },
    CART(state){
        return state.cart;
    },
    CARTITEMSLENGTH(state){
        //arr.reduce((sum, current) => sum + current);
        let total = [];
        state.cart.forEach((item) => {
           total.push(item.quantity);
        });
        let result = total.reduce((sum, current) => sum + current, 0);
        //console.log(result);
        return result;
    }   
}