<template>
  <div>
    <header>
      <a href="/">
        <img :src="asset('logo.png')" />
      </a>
      <nav>
        <ul class="nav__links">
          <li>
            <a href="#">About Us</a>
          </li>
          <li>
            <a href="#">Foods</a>
          </li>
          <li>
            <a href="#">Contact</a>
          </li>
        </ul>
      </nav>
      <a class="cta" href="/backend" target="_blank">
        <button>Go to Admin</button>
      </a>
    </header>
  </div>
</template>

<script>
export default {};
</script>

<style scoped>
@import url("https://fonts.googleapis.com/css2?family=Recursive:wght@500&display=swap");
li,
a,
button {
  font-family: "Recursive", sans-serif;
  font-size: 16px;
  color: #555;
  text-decoration: none;
}

header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 10px 12%;
  margin-bottom: 10px;
  background: rgba(255, 255, 255, 0.8);
}

img {
  width: 120px;
  position: relative;
  background: none;
}

h3 {
  cursor: pointer;
}

.nav__links {
  list-style: none;
  margin-bottom: 0;
}

.nav__links li {
  display: inline-block;
  padding: 0 20px;
  background: none !important;
}

.nav__links li a {
  font-weight: bold;
  text-transform: uppercase;
  transition: all 0.3s ease 0s;
}

.nav__links li a:hover {
  color: rgba(0, 136, 169, 1);
}

button {
  padding: 9px 20px;
  background-color: rgba(0, 136, 169, 1);
  border: none;
  border-radius: 50px;
  color: #edf0f1;
  cursor: pointer;
  transition: all 0.3s ease 0s;
}

button:hover {
  background-color: rgba(0, 136, 169, 0.7);
}
</style>
