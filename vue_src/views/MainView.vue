<template>
  <div class="main">
    <h1>You are in main menu</h1>
    <button
        class="btn btn-primary"
        data-bs-target="#collapseTarget"
        data-bs-toggle="collapse">
      Bootstrap collapse
    </button>
    <div class="collapse py-2" id="collapseTarget">
      This is the toggle-able content!
    </div>

  </div>
</template>

<style>
@media (min-width: 1024px) {
  .main {
    min-height: 100vh;
    display: flex;
    align-items: center;
  }
}
</style>
