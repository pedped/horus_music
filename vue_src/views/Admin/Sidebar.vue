<script setup>

</script>

<template>
  <div class="col-md-3">
    <div class="sidebar">
      <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 280px;">
        <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
          <svg class="bi me-2" width="40" height="32">
            <use xlink:href="#bootstrap"></use>
          </svg>
          <span class="fs-4">Administrator</span>
        </a>
        <hr>
        <ul class="nav nav-pills flex-column mb-auto">
          <li class="nav-item">
            <RouterLink to="/admin/index" href="#" class="nav-link text-white" :class="{active : $route.path.startsWith('/admin/index')}" aria-current="page">
              <svg class="bi me-2" width="16" height="16">
                <use xlink:href="#home"></use>
              </svg>
              Dashboard
            </RouterLink>
          </li>
          <li>
            <RouterLink to="/admin/music/list" href="#" class="nav-link text-white" :class="{active : $route.path.startsWith('/admin/music')}">
              <svg class="bi me-2" width="16" height="16">
                <use xlink:href="#speedometer2"></use>
              </svg>
              Musics
            </RouterLink>
          </li>
        </ul>
      </div>
    </div>
  </div>
</template>

<style scoped>
.nav-pills .nav-link.active,
.nav-pills .show > .nav-link {
  color: #fff;
  background-color: #bb2d3b;
}
</style>