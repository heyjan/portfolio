<template>
  <div>
    <h2 class="text-2xl font-semibold mb-4">Welcome to Symfony + Vue.js</h2>
    <p class="mb-4">This is a demonstration of integrating Symfony API with Vue.js frontend.</p>
    <p>
      <router-link to="/items" class="btn">
        View Items
      </router-link>
    </p>
  </div>
</template>

<script>
export default {
  name: 'Home'
}
</script>