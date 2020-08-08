<template>
  <div>
    <footer>
      <h3>
        Copyright &copy; {{ year_now }}, Big Bro's Cafe & Restro. Created with
        <span
          class="love"
        >&hearts;</span>
        for BigBro's.
      </h3>
    </footer>
  </div>
</template>

<script>
export default {
  data() {
    return {
      year_now: "",
    };
  },
  created() {
    this.year_now = new Date().getFullYear();
  },
};
</script>

<style scoped>
footer {
  text-align: center;
  background-color: rgba(0, 136, 169, 1);
  height: 50px;
  clear: both;
  width: 100%;
}
h3 {
  color: #ccc;
  padding-top: 10px;
  font-size: 18px;
  vertical-align: middle;
  font-family: "Recursive", sans-serif;
}
.love {
  color: #f00;
  text-shadow: 1px 1px 0px #000;
}

@media screen and (max-width: 600px) {
  footer {
    height: auto;
    padding-bottom: 10px;
    margin-bottom: 0;
  }
}
</style>
