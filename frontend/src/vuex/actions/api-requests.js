import axios from "axios";

export default{
    GET_PRODUCTS_FROM_API({commit}){
        return axios('http://127.0.0.1:8000/api/product', {
            method: "GET"
        }).then((products) => {
            commit('SET_PRODUCTS_TO_STATE', products.data);
            return products;
        }).catch((error) => {
            console.log(error);
            return error;
        })
    },
    GET_CATEGORYS_FROM_API({commit}){
        return axios('http://127.0.0.1:8000/api/category', {
            method: "GET"
        }).then((categorys) => {
            commit('SET_CATEGORYS_TO_STATE', categorys.data);
            return categorys;
        }).catch((error) => {
            console.log(error);
            return error;
        })
    }
}