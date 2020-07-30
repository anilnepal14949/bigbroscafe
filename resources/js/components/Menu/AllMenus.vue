<template>
    <div>
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 ml-4 text-gray-800">All Menus</h1>
            <ol class="breadcrumb">
                <input
                    type="text"
                    v-model="search"
                    placeholder="Search Menu..."
                    class="form-control"
                />
            </ol>
        </div>
        <!-- Datatables -->
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="table-responsive p-3">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th>SN</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Order</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr
                                v-for="(menu, index) in filterMenu"
                                :key="index"
                            >
                                <td>{{ index + 1 }}</td>
                                <td>{{ menu.menu_name }}</td>
                                <td>{{ menu.menu_description }}</td>
                                <td>{{ menu.menu_order }}</td>
                                <td v-if="menu.status == 0">
                                    <span class="badge badge-success">
                                        Active
                                    </span>
                                </td>
                                <td v-else>
                                    <span class="badge badge-danger">
                                        Not Active
                                    </span>
                                </td>
                                <td>
                                    <router-link
                                        :to="{
                                            name: 'items',
                                            params: { menuId: menu.id }
                                        }"
                                        class="btn btn-xs btn-outline-primary"
                                        :class="{
                                            disabled: menu.items[0].length === 0
                                        }"
                                        >View Items</router-link
                                    >
                                    <router-link
                                        :to="{
                                            name: 'edit-menu',
                                            params: { menuId: menu.id }
                                        }"
                                        class="btn btn-xs btn-outline-secondary"
                                    >
                                        Edit
                                    </router-link>
                                    <button
                                        class="btn btn-danger"
                                        @click="deleteThis(menu.id)"
                                    >
                                        Delete
                                    </button>
                                </td>
                            </tr>
                            <td
                                v-if="menus.length === 0"
                                colspan="5"
                                class="text-center"
                            >
                                <strong
                                    >No Menu to display... Add Menu
                                    first.</strong
                                >
                            </td>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { mapGetters, mapActions } from "vuex";

export default {
    data() {
        return {
            search: ""
        };
    },
    computed: {
        filterMenu() {
            return this.menus.filter(menu => {
                return menu.menu_name.match(this.search);
            });
        },
        ...mapGetters(["menus"])
    },
    methods: {
        ...mapActions(["fetchMenus", "deleteMenu"]),
        deleteThis(menuId) {
            this.$snotify.confirm(
                "Do you really want to delete this menu?",
                "Delete Menu",
                {
                    position: "centerCenter",
                    showProgressBar: true,
                    closeOnClick: false,
                    buttons: [
                        {
                            text: "Yes",
                            action: () => {
                                this.remove(menuId);
                            },
                            bold: true
                        },
                        { text: "No", action: "" }
                    ]
                }
            );
        },
        remove(menuId) {
            // alert("done");
            this.deleteMenu(menuId);
            this.$snotify.remove();
            this.$snotify.success("Menu Deleted Successfully!", "Successful");
        }
    },
    created() {
        this.fetchMenus();
    }
};
</script>
