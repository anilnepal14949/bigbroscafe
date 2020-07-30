<template>
  <!-- Container Fluid-->
  <div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <!-- <img :src="asset('logo.png')" width="400" class="m-auto"> -->
    </div>

    <div class="row mb-3">
      <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-4 col-md-6 mb-4">
        <div class="card h-100">
          <div class="card-body">
            <div class="row align-items-center">
              <div class="col mr-2">
                <div class="text-lg font-weight-bold text-uppercase mb-1">Menu</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ menu_count }}</div>
                <div class="mt-2 mb-0 text-muted text-xs"></div>
              </div>
              <div class="col-auto">
                <i class="fas fa-cart-plus fa-2x text-primary"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Earnings (Annual) Card Example -->
      <div class="col-xl-4 col-md-6 mb-4">
        <div class="card h-100">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-lg font-weight-bold text-uppercase mb-1">Items</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ items_count }}</div>
                <div class="mt-2 mb-0 text-muted text-xs"></div>
              </div>
              <div class="col-auto">
                <i class="fas fa-paper-plane fa-2x text-success"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- New User Card Example -->
      <div class="col-xl-4 col-md-6 mb-4">
        <div class="card h-100">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-lg font-weight-bold text-uppercase mb-1">Users</div>
                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ user_count }}</div>
                <div class="mt-2 mb-0 text-muted text-xs"></div>
              </div>
              <div class="col-auto">
                <i class="fas fa-users fa-2x text-info"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!---Container Fluid-->
</template>

<script>
export default {
  data() {
    return {
      user_count: 0,
      menu_count: 0,
      items_count: 0
    };
  },
  created() {
    let users = axios
      .get("/api/users")
      .then(user => {
        // console.log(data.data.length);
        this.user_count = user.data.length;
      })
      .catch(error => console.log(error));

    let menus = axios
      .get("/api/menu")
      .then(menu => {
        // console.log(menu);
        this.menu_count = menu.data.data.length;
      })
      .catch(error => console.log(error));

    let items = axios
      .get("/api/items")
      .then(item => {
        console.log(item);
        this.items_count = item.data.length;
      })
      .catch(error => console.log(error));
  }
};
</script>
