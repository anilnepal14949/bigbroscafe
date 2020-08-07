<template>
  <div class="slider">
    <div class="slidercontainer">
      <div class="showSlide">
        <img :src="asset('images/img1.jpg')" />
      </div>
    </div>
    <div class="openingHours">
      <h2>Opening Hours</h2>
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Day</th>
            <th>Time</th>
          </tr>
        </thead>
        <tbody>
          <tr :class="(this.day_today == 0)?'today':''">
            <td>Sunday</td>
            <td>8am to 4pm</td>
          </tr>
          <tr :class="(this.day_today == 1)?'today':''">
            <td>Monday</td>
            <td>8am to 4pm</td>
          </tr>
          <tr :class="(this.day_today == 2)?'today':''">
            <td>Tuesday</td>
            <td>8am to 4pm</td>
          </tr>
          <tr :class="(this.day_today == 3)?'today':''">
            <td>Wednesday</td>
            <td>8am to 4pm</td>
          </tr>
          <tr :class="(this.day_today == 4)?'today':''">
            <td>Thursday</td>
            <td>8am to 4pm</td>
          </tr>
          <tr :class="(this.day_today == 5)?'today':''">
            <td>Friday</td>
            <td>8am to 4pm</td>
          </tr>
          <tr :class="(this.day_today == 6)?'today':''">
            <td>Saturday</td>
            <td>8am to 4pm</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      day_today: "",
    };
  },
  created() {
    this.day_today = new Date().getDay();
  },
};
</script>

<style scoped>
@import url("https://fonts.googleapis.com/css2?family=Lobster&display=swap");
.slider {
  display: flex;
  color: #fff;
  justify-content: space-between;
}
.showSlide img {
  width: 100%;
  height: 420px;
}
.slidercontainer {
  position: relative;
  width: 70%;
}
.openingHours {
  width: 30%;
  text-align: center;
  padding: 10px;
}
.openingHours h2 {
  font-family: "Lobster", cursive;
}
table {
  color: #fff;
}
table td {
  width: 150px;
}
.today {
  background: rgba(200, 200, 200, 0.3);
}
</style>
