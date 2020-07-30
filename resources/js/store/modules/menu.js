import axios from "axios";
import router from "../../app";

const state = {
    menuu: [],
    menu_errors: {}
};

const getters = {
    menus: state => state.menuu,
    errors: state => state.menu_errors
};

const actions = {
    async fetchMenus({ commit }) {
        const response = await axios.get("/api/menu");
        commit("setMenus", response.data.data);
    },
    async addMenu({ commit }, menu) {
        await axios
            .post("/api/menu/", menu)
            .then(response => {
                console.log(response.data);
                commit("newMenu", response.data);
            })
            .catch(error => {
                commit("menuErrors", error.response.data.errors);
            });
    },
    async editMenu({ commit }, menu) {
        await axios
            .put("/api/menu/" + router.currentRoute.params.menuId, menu)
            .then(response => {
                console.log(response.data);
                commit("updateMenu", response.data);
            })
            .catch(error => {
                commit("menuErrors", error.response.data.errors);
            });
    },
    async deleteMenu({ commit }, menuId) {
        await axios
            .delete("/api/menu/" + menuId)
            .then(response => {
                commit("removeMenu", menuId);
            })
            .catch(errors => {
                commit("menuErrors", error.response.data.errors);
            });
    }
};

const mutations = {
    setMenus: (state, menuu) => (state.menuu = menuu),
    newMenu: (state, menu) => state.menuu.unshift(menu),
    updateMenu: (state, menu) => state.menuu.unshift(menu),
    removeMenu: (state, menuId) => {
        const index = state.menuu.findIndex(menu => menu.id === menuId);
        if (~index) state.menuu.splice(index, 1);
    },
    menuErrors: (state, errors) => (state.menu_errors = errors)
};

export default {
    state,
    getters,
    actions,
    mutations
};
