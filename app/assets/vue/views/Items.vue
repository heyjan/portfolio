<template>
  <div>
    <h2 class="text-2xl font-semibold mb-4">Items List</h2>

    <div v-if="loading" class="text-center p-4">
      Loading items...
    </div>

    <div v-else-if="error" class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
      {{ error }}
    </div>

    <div v-else>
      <div class="mb-6">
        <h3 class="text-xl mb-2">Add New Item</h3>
        <div class="flex flex-col space-y-2 max-w-md">
          <input
              v-model="newItem.name"
              placeholder="Item name"
              class="border p-2 rounded"
          />
          <input
              v-model="newItem.description"
              placeholder="Item description"
              class="border p-2 rounded"
          />
          <button
              @click="addItem"
              class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded"
          >
            Add Item
          </button>
        </div>
      </div>

      <div v-if="items.length === 0" class="text-gray-500">
        No items found.
      </div>

      <ul v-else class="space-y-4">
        <li
            v-for="item in items"
            :key="item.id"
            class="border p-4 rounded hover:bg-gray-50"
        >
          <h3 class="font-bold">{{ item.name }}</h3>
          <p class="text-gray-600">{{ item.description }}</p>
          <router-link
              :to="{ name: 'item-detail', params: { id: item.id }}"
              class="text-blue-500 hover:underline"
          >
            View Details
          </router-link>
        </li>
      </ul>
    </div>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  name: 'Items',
  data() {
    return {
      items: [],
      loading: true,
      error: null,
      newItem: {
        name: '',
        description: ''
      }
    };
  },
  mounted() {
    this.fetchItems();
  },
  methods: {
    fetchItems() {
      this.loading = true;
      axios.get('/api/items')
          .then(response => {
            this.items = response.data.data;
            this.loading = false;
          })
          .catch(error => {
            this.error = 'Failed to load items: ' + (error.response?.data?.message || error.message);
            this.loading = false;
          });
    },
    addItem() {
      if (!this.newItem.name) {
        this.error = 'Item name is required';
        return;
      }

      axios.post('/api/items', this.newItem)
          .then(response => {
            this.items.push(response.data.data);
            this.newItem.name = '';
            this.newItem.description = '';
            this.error = null;
          })
          .catch(error => {
            this.error = 'Failed to add item: ' + (error.response?.data?.message || error.message);
          });
    }
  }
}
</script>