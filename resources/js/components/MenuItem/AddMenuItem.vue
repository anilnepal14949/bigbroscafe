import { mapActions } from 'vuex';
<template>
    <div>
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 ml-4 text-gray-800">Add New Menu Item</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="/backend">Home</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    Create Menu Item
                </li>
            </ol>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-10">
                <form
                    method="POST"
                    @submit="onSubmit"
                    enctype="multipart/form-data"
                >
                    <div class="card mb-6">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="menu_id">Menu</label>
                                <select
                                    class="form-control"
                                    :disabled="
                                        menus.length <= 0 ? 'disabled' : false
                                    "
                                    v-model="item.menu_id"
                                    aria-describedby
                                >
                                    <option value="0" v-if="menus.length > 0"
                                        >Select Menu</option
                                    >
                                    <option value="0" v-else
                                        >No menu found. Please add menu
                                        first.</option
                                    >
                                    <option
                                        v-for="menu in menus"
                                        :value="menu.id"
                                        :key="menu.id"
                                        >{{ menu.menu_name }}</option
                                    >
                                </select>
                                <small
                                    class="text-danger"
                                    v-if="
                                        itemErrors.menu_id && item.menu_id === 0
                                    "
                                    >{{ itemErrors.menu_id[0] }}</small
                                >
                            </div>
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    v-model="item.item_name"
                                    aria-describedby
                                    placeholder="Enter menu item name.."
                                />
                                <small
                                    class="text-danger"
                                    v-if="
                                        itemErrors.item_name &&
                                            item.item_name === ''
                                    "
                                    >{{ itemErrors.item_name[0] }}</small
                                >
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <wysiwyg v-model="item.item_description" />
                                <small
                                    class="text-danger"
                                    v-if="
                                        itemErrors.item_description &&
                                            item.item_description === ''
                                    "
                                    >{{ itemErrors.item_description[0] }}</small
                                >
                            </div>
                            <div class="form-group">
                                <label for="name">Price</label>
                                <input
                                    type="string"
                                    class="form-control"
                                    v-model="item.item_price"
                                    aria-describedby
                                    placeholder="Enter menu item price.."
                                />
                                <small
                                    class="text-danger"
                                    v-if="
                                        itemErrors.item_price &&
                                            item.item_price === ''
                                    "
                                    >{{ itemErrors.item_price[0] }}</small
                                >
                            </div>
                            <div class="form-group">
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <input
                                            type="file"
                                            class="custom-file-input"
                                            id="customFile"
                                            @change="onFileSelected"
                                        />

                                        <small
                                            class="text-danger"
                                            v-if="itemErrors.item_image"
                                        >
                                            {{ itemErrors.item_image[0] }}
                                        </small>
                                        <label
                                            class="custom-file-label"
                                            for="customFile"
                                            >Choose file</label
                                        >
                                    </div>

                                    <div class="col-md-6">
                                        <img
                                            :src="image"
                                            style="height: 40px; width: 40px;"
                                        />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <input
                                    type="checkbox"
                                    v-model="item.status"
                                    aria-describedby
                                />
                                <label for="status">Active</label>
                            </div>
                            <button type="submit" class="btn btn-primary">
                                Save
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
import { mapActions, mapGetters } from "vuex";

export default {
    data() {
        return {
            item: {
                menu_id: 0,
                item_name: "",
                item_description: "",
                item_price: "",
                item_image: "",
                status: true
            },
            image: null
        };
    },
    methods: {
        ...mapActions(["addMenuItem", "fetchMenus"]),
        onSubmit(e) {
            e.preventDefault();
            this.addMenuItem(this.item);
            console.log(this.itemErrors);
            if (!this.itemErrors) {
                this.$router.push({
                    name: "items",
                    params: { menuId: this.item.menu_id }
                });
                this.$snotify.success(
                    "Menu Item Stored Successfully!",
                    "Successful"
                );
            }
        },
        onFileSelected(event) {
            let file = event.target.files[0];
            let reader = new FileReader();
            reader.onload = event => {
                this.image = event.target.result;
                this.item.item_image = event.target.result;
            };
            reader.readAsDataURL(file);
        }
    },
    computed: {
        ...mapGetters(["itemErrors", "menus"])
    },
    created() {
        this.fetchMenus();
    }
};
</script>
