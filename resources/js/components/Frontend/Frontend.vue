<template>
  <div>
    <main-slider :day_today="day_today"></main-slider>
    <!-- <all-menus :menus="menus"></all-menus> -->
    <special-items :menuItems="menuItems"></special-items>
  </div>
</template>

<script>
import { mapGetters, mapActions } from "vuex";
export default {
  data() {
    return {
      day_today: "",
      menu_counts: [1, 2],
    };
  },
  methods: {
    ...mapActions(["fetchMenuItems"]),
  },
  computed: {
    ...mapGetters(["menuItems"]),
  },
  created() {
    // this.menu_counts.map((count) => {
    //   this.fetchMenuItems(this.menu_counts.random());
    // });
    this.fetchMenuItems(1);
    this.day_today = new Date().getDay();
  },
};
</script>

<style>
</style>
