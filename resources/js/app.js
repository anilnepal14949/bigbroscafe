require("./bootstrap");

window.Vue = require("vue");
Vue.mixin(require("./asset"));

import { routes } from "./routes";
import VueRouter from "vue-router";
import store from "./store";

import Snotify from "vue-snotify";
import "vue-snotify/styles/material.css";

import wysiwyg from "vue-wysiwyg";
import "vue-wysiwyg/dist/vueWysiwyg.css";

Vue.use(VueRouter);
Vue.use(Snotify);
Vue.use(wysiwyg);

const router = new VueRouter({
    mode: "history",
    routes
});

export default router;

Vue.component("admin", require("./components/Admin.vue").default);
Vue.component("sidebar", require("./components/Sidebar.vue").default);
Vue.component("navbar", require("./components/Navbar.vue").default);
Vue.component(
    "main-navbar",
    require("./components/Frontend/Navbar.vue").default
);
Vue.component(
    "main-slider",
    require("./components/Frontend/Slider.vue").default
);
Vue.component(
    "special-menu",
    require("./components/Frontend/SpecialMenu.vue").default
);
Vue.component(
    "frontend",
    require("./components/Frontend/Frontend.vue").default
);

const app = new Vue({
    el: "#app",
    store,
    router
});
