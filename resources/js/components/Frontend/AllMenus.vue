<template>
  <div>
    <button
      class="btn btn-lg btn-outline-primary"
      v-for="menu in menus"
      :key="menu.id"
    >{{ menu.menu_name }}</button>
  </div>
</template>

<script>
export default {
  props: ["menus"],
};
</script>

<style scoped>
button {
  margin: 10px 5px;
}
</style>
