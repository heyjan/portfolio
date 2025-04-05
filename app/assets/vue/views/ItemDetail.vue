<template>
  <div>
    <div class="mb-4">
      <router-link to="/items" class="text-blue-500 hover:underline">&larr; Back to Items</router-link>
    </div>

    <div v-if="loading" class="text-center p-4">
      Loading item details...
    </div>

    <div v-else-if="error" class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
      {{ error }}
    </div>

    <div v-else-if="item" class="border p-6 rounded">
      <h2 class="text-2xl font-semibold mb-2">{{ item.name }}</h2>
      <p class="text-gray-700 mb-4">{{ item.description }}</p>
      <div class="text-gray-500">Item ID: {{ item.id }}</div>
    </div>

    <div v-else class="text-gray-500">
      Item not found.
    </div>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  name: 'ItemDetail',
  props: {
    id: {
      type: String,
      required: true
    }
  },
  data() {
    return {
      item: null,
      loading: true,
      error: null
    };
  },
  mounted() {
    this.fetchItem();
  },
  methods: {
    fetchItem() {
      this.loading = true;
      axios.get(`/api/items/${this.id}`)
          .then(response => {
            this.item = response.data.data;
            this.loading = false;
          })
          .catch(error => {
            this.error = 'Failed to load item details: ' + (error.response?.data?.message || error.message);
            this.loading = false;
          });
    }
  }
}
</script>