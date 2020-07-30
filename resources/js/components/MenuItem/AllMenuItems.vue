<template>
  <div>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 ml-4 text-gray-800">
        All Menu Items in
        <span style="color:red">{{ menu.menu_name }}</span>
      </h1>
      <ol class="breadcrumb">
        <input type="text" v-model="search" placeholder="Search Menu Items..." class="form-control" />
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
                <th>Item Name</th>
                <th>Item Description</th>
                <th>Item Image</th>
                <th>Item Price</th>
                <th>Item Status</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="(item, index) in filterMenuItems" :key="index">
                <td>{{ index + 1 }}</td>
                <td>{{ item.item_name }}</td>
                <td>{{ item.item_description }}</td>
                <td>
                  <img :src="asset(item.item_image)" width="50" />
                </td>
                <td>${{ item.item_price }}</td>
                <td v-if="item.status == 0">
                  <span class="badge badge-success">Active</span>
                </td>
                <td v-else>
                  <span class="badge badge-danger">Not Active</span>
                </td>
                <td>
                  <router-link
                    :to="{
                        name: 'edit-menu-item',
                        params: { menuId: menu.id, id: item.id }
                    }"
                    class="btn btn-xs btn-outline-secondary"
                  >Edit</router-link>
                  <button class="btn btn-danger" @click="deleteThis(item.id)">Delete</button>
                </td>
              </tr>
              <td v-if="menuItems.length === 0" colspan="6" class="text-center">
                <strong>
                  No Menu Items to display... Add Menu Item
                  first.
                </strong>
              </td>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Vue from "vue";
import { mapGetters, mapActions } from "vuex";

export default {
  data() {
    return {
      search: ""
    };
  },
  computed: {
    filterMenuItems() {
      return this.menuItems.filter(menuItem => {
        return menuItem.item_name.match(this.search);
      });
    },
    ...mapGetters(["menu", "menuItems"])
  },
  methods: {
    ...mapActions(["fetchMenu", "fetchMenuItems", "deleteMenuItem"]),
    deleteThis(id) {
      this.$snotify.confirm(
        "Do you really want to delete this menu item?",
        "Delete Menu Item",
        {
          position: "centerCenter",
          showProgressBar: true,
          closeOnClick: false,
          buttons: [
            {
              text: "Yes",
              action: () => {
                this.remove(id);
              },
              bold: true
            },
            { text: "No", action: "" }
          ]
        }
      );
    },
    remove(id) {
      // alert("done");
      this.deleteMenuItem(id);
      this.$snotify.remove();
      this.$snotify.success("Menu Item Deleted Successfully!", "Successful");
    }
  },
  created() {
    this.fetchMenu();
    this.fetchMenuItems();
  }
};
</script>
