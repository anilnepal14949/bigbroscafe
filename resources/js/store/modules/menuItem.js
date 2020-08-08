import axios from "axios";
import router from "../../app";

const state = {
    menuItems: [],
    menu: [],
    itemErrors: {}
};

const getters = {
    menu: state => state.menu,
    menuItems: state => state.menuItems,
    itemErrors: state => state.itemErrors
};

const actions = {
    async fetchMenu({ commit }) {
        const response = await axios.get(
            "/api/menu/" + router.currentRoute.params.menuId
        );
        commit("setMenu", response.data.data);
    },
    async fetchMenuItems({ commit }, id) {
        const response = await axios.get("/api/menu/" + id + "/items");
        commit("setMenuItems", response.data.data);
    },
    async addMenuItem({ commit }, item) {
        await axios
            .post("/api/menu/items", item)
            .then(response => {
                commit("newMenuItem", response.data);
            })
            .catch(error => {
                commit("menuItemErrors", error.response.data.errors);
            });
    },
    async deleteMenuItem({ commit }, id) {
        await axios
            .delete("/api/menu/items/" + id)
            .then(response => {
                commit("removeMenuItem", id);
            })
            .catch(errors => {
                commit("menuItemErrors", error.response.data.errors);
            });
    }
};

const mutations = {
    setMenu: (state, menu) => (state.menu = menu),
    setMenuItems: (state, menuItems) => (state.menuItems = menuItems),
    newMenuItem: (state, item) => state.menuItems.unshift(item),
    removeMenuItem: (state, id) => {
        const index = state.menuItems.findIndex(item => item.id === id);
        if (~index) state.menuItems.splice(index, 1);
    },
    menuItemErrors: (state, errors) => (state.itemErrors = errors)
};

export default {
    state,
    getters,
    actions,
    mutations
};
