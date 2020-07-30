<template>
  <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
    <router-link
      to="/backend"
      class="sidebar-brand d-flex align-items-center justify-content-center"
    >
      <div class="sidebar-brand-icon mr-1">
        <img :src="asset('logoico.png')" width="50" />
        BigBro's
      </div>
      <div class="sidebar-brand-text">Admin</div>
    </router-link>
    <hr class="sidebar-divider my-0" />
    <li class="nav-item @if($activeMenu == 'home') active @endif">
      <router-link to="/backend" class="nav-link">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span>
      </router-link>
    </li>
    <hr class="sidebar-divider" />
    <div class="sidebar-heading">Admin</div>
    <li class="nav-item">
      <a
        class="nav-link"
        href="#"
        data-toggle="collapse"
        data-target="#collapseMenu"
        aria-expanded="true"
        aria-controls="collapseMenu"
      >
        <i class="far fa-fw fa-building"></i>
        <span>Menu</span>
      </a>
      <div
        id="collapseMenu"
        class="collapse"
        aria-labelledby="headingMenu"
        data-parent="#accordionSidebar"
      >
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Menu</h6>
          <router-link to="/backend/menu/create" class="collapse-item">Add New Menu</router-link>
          <router-link to="/backend/menu" class="collapse-item">All Menus</router-link>
        </div>
      </div>
    </li>
    <li class="nav-item">
      <a
        class="nav-link"
        href="#"
        data-toggle="collapse"
        data-target="#collapseMenuItems"
        aria-expanded="true"
        aria-controls="collapseMenuItems"
      >
        <i class="far fa-fw fa-building"></i>
        <span>Menu Items</span>
      </a>
      <div
        id="collapseMenuItems"
        class="collapse"
        aria-labelledby="headingMenuItems"
        data-parent="#accordionSidebar"
      >
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Menu Items</h6>
          <router-link to="/backend/menu/items/create" class="collapse-item">Create Menu Items</router-link>
        </div>
      </div>
    </li>
  </ul>
  <!-- Sidebar -->
</template>

<script>
export default {};
</script>
