<template>
  <div class="container">
    <header class="mb-6">
      <h1 class="text-3xl font-bold">Symfony + Vue.js Application</h1>
      <nav class="mt-4">
        <ul class="flex space-x-4">
          <li><router-link to="/" class="btn">Home</router-link></li>
          <li><router-link to="/items" class="btn">Items</router-link></li>
        </ul>
      </nav>
    </header>

    <main>
      <router-view></router-view>
    </main>

    <footer class="mt-10 pt-4 border-t text-gray-500">
      <p>© {{ new Date().getFullYear() }} - Symfony + Vue.js Demo</p>
    </footer>
  </div>
</template>

<script>
export default {
  name: 'App'
}
</script>