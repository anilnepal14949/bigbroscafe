<template>
  <div>
    <span class="badge badge-primary" v-for="menu in menus" :key="menu.id">{{ menu.menu_name }}</span>
  </div>
</template>

<script>
import { mapGetters, mapActions } from "vuex";
export default {
  data() {
    return {};
  },
  methods: {
    ...mapActions(["fetchMenus"]),
  },
  computed: {
    ...mapGetters(["menus"]),
  },
  created() {
    this.fetchMenus();
  },
};
</script>

<style>
</style>
