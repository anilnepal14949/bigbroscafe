<template>
  <div>
    <h2>Today's Special</h2>
    <div class="special_menu">
      <div class="menu_item" v-for="item in menuItems" :key="item.id">
        <img :src="asset(item.item_image)" />
        <h3 class="item_title">{{ item.item_name }}</h3>
        <h4 class="menu_title">{{ item.menu.menu_name }}</h4>
        <p>{{ item.item_description }}</p>
        <div class="price">
          <h4 class="item_price">${{ item.item_price }}</h4>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ["menuItems"],
};
</script>

<style scoped>
.special_menu {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
}
.menu_item {
  background-color: rgba(200, 200, 200, 0.3);
  flex-basis: 32%;
  position: relative;
  min-height: 200px;
  float: left;
  padding: 10px;
  margin: 5px;
  position: relative;
  font-family: "Recursive", sans-serif;
  color: #fff;
}
img {
  max-width: 100%;
  height: 150px;
  float: right;
  padding-top: 0;
  padding-left: 10px;
}
h2 {
  text-align: center;
  color: #fff;
  font-family: "Lobster", cursive;
  padding: 20px 0;
  border-bottom: 2px solid #aaa;
  border-top: 2px solid #aaa;
  border-radius: 5px;
}
.menu_title {
  font-size: 15px;
  color: #ccc;
}
p {
  text-align: justify;
  margin-top: 20px;
}
.price {
  position: absolute;
  top: 0;
  right: 0;
  background: rgba(0, 136, 169, 1);
  padding: 5px;
  border-radius: 5px;
}

@media screen and (max-width: 1000px) {
  .menu_item {
    flex-basis: 48%;
  }
}

@media screen and (max-width: 768px) {
  .menu_item {
    flex-basis: 98%;
  }
}

@media screen and (max-width: 400px) {
  img {
    width: 100%;
    float: none;
    height: auto;
    margin-bottom: 20px;
    padding-left: 0;
  }
}
</style>
