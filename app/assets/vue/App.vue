<template>
  <div class="min-h-screen" style="background-color: #e6e3dc; font-family: 'Archivo', sans-serif;">
    <header class="p-6">
      <h1 class="text-2xl font-bold text-black">HEYJAN</h1>
    </header>

    <main>
      <router-view></router-view>
    </main>
  </div>
</template>

<script>
export default {
  name: 'App'
}
</script>