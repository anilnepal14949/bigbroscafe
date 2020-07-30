import Vue from "vue";
import Vuex from "vuex";

import menu from "./modules/menu";
import menuItem from "./modules/menuItem";

Vue.use(Vuex);

export default new Vuex.Store({
    modules: {
        menu,
        menuItem
    }
});
