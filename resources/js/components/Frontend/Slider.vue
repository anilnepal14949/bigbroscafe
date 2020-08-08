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
          <tr :class="(day_today == 0)?'today':''">
            <td>Sunday</td>
            <td>8am to 4pm</td>
          </tr>
          <tr :class="(day_today == 1)?'today':''">
            <td>Monday</td>
            <td>8am to 4pm</td>
          </tr>
          <tr :class="(day_today == 2)?'today':''">
            <td>Tuesday</td>
            <td>8am to 4pm</td>
          </tr>
          <tr :class="(day_today == 3)?'today':''">
            <td>Wednesday</td>
            <td>8am to 4pm</td>
          </tr>
          <tr :class="(day_today == 4)?'today':''">
            <td>Thursday</td>
            <td>8am to 4pm</td>
          </tr>
          <tr :class="(day_today == 5)?'today':''">
            <td>Friday</td>
            <td>8am to 4pm</td>
          </tr>
          <tr :class="(day_today == 6)?'today':''">
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
  props: ["day_today"],
};
</script>

<style scoped>
.slider {
  display: flex;
  flex-wrap: wrap;
  color: #fff;
  padding-top: 15px;
  justify-content: space-between;
}
.showSlide img {
  width: 100%;
  height: 420px;
}
.slidercontainer {
  position: relative;
  flex-basis: 70%;
}
.openingHours {
  flex-basis: 30%;
  text-align: center;
  padding: 10px;
  font-family: "Rowdies", cursive;
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
  background: rgba(200, 200, 200, 0.7) !important;
  color: #333;
}

@media screen and (max-width: 765px) {
  .slidercontainer {
    flex-basis: 100%;
  }
  .showSlide img {
    height: auto;
  }
  .openingHours {
    flex-basis: 100%;
  }
}
</style>
