import Dashboard from "./pages/Dashboard";

import Items from "./components/MenuItem/AllMenuItems";
import AddItems from "./components/MenuItem/AddMenuItem";
import EditMenuItem from "./components/MenuItem/EditMenuItem";

import Menu from "./components/Menu/AllMenus";
import AddMenu from "./components/Menu/AddMenu";
import EditMenu from "./components/Menu/EditMenu";

export const routes = [
    {
        path: "/backend/",
        component: Dashboard,
        name: "dashboard"
    },
    {
        path: "/backend/menu",
        component: Menu,
        name: "menu"
    },
    {
        path: "/backend/menu/create",
        component: AddMenu,
        name: "add-menu"
    },
    {
        path: "/backend/menu/:menuId/edit/",
        component: EditMenu,
        name: "edit-menu"
    },
    {
        path: "/backend/menu/:menuId/items",
        component: Items,
        name: "items"
    },
    {
        path: "/backend/menu/:menuId/items/edit/:id",
        component: EditMenuItem,
        name: "edit-menu-item"
    },
    {
        path: "/backend/menu/items/create",
        component: AddItems,
        name: "add-items"
    }
];
