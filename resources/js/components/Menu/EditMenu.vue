import { mapActions } from 'vuex';
<template>
    <div>
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 ml-4 text-gray-800">
                Edit <span style="color:red;"> {{ menu.menu_name }} </span> Menu
            </h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="/backend">Home</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    Edit Menu
                </li>
            </ol>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-10">
                <form method="POST" @submit="onSubmit">
                    <div class="card mb-6">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    v-model="menu.menu_name"
                                    aria-describedby
                                    placeholder="Enter menu name.."
                                />
                                <small
                                    class="text-danger"
                                    v-if="
                                        errors.menu_name &&
                                            menu.menu_name === ''
                                    "
                                    >{{ errors.menu_name[0] }}</small
                                >
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <wysiwyg v-model="menu.menu_description" />
                                <small
                                    class="text-danger"
                                    v-if="
                                        errors.menu_description &&
                                            menu.menu_description === ''
                                    "
                                    >{{ errors.menu_description[0] }}</small
                                >
                            </div>
                            <div class="form-group">
                                <input
                                    type="checkbox"
                                    v-model="menu.status"
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
    methods: {
        ...mapActions(["editMenu", "fetchMenu"]),
        onSubmit(e) {
            console.log(this.menu);
            e.preventDefault();
            this.editMenu(this.menu);
            this.$router.push({ name: "menu" });
            this.$snotify.success("Menu Updated Successfully!", "Successful");
        }
    },
    computed: {
        ...mapGetters(["errors", "menu"])
    },
    created() {
        this.fetchMenu();
    }
};
</script>
