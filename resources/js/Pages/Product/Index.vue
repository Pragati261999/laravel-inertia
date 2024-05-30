<template>
  <div>
    <h1>Products</h1>
    <div>
      <label for="size">Size:</label>
      <select v-model="filters.size_id" @change="filterProducts">
        <option value="">All</option>
        <option v-for="size in sizes" :key="size.id" :value="size.id">{{ size.name }}</option>
      </select>

      <label for="color">Color:</label>
      <select v-model="filters.color_id" @change="filterProducts">
        <option value="">All</option>
        <option v-for="color in colors" :key="color.id" :value="color.id">{{ color.name }}</option>
      </select>
    </div>

    <div>
      <ul>
        <li v-for="product in products" :key="product.id">
          <h2>{{ product.name }}</h2>
          <p>Price: {{ product.price }}</p>
          <p>Colors: {{ product.setItems.map(item => item.color.name).join(', ') }}</p>
          <p>Sizes: {{ product.setItems.map(item => item.size.name).join(', ') }}</p>
        </li>
      </ul>
    </div>
  </div>
</template>

<script>
import { Inertia } from '@inertiajs/inertia';

export default {
  props: {
    products: Array,
    sizes: Array,
    colors: Array,
  },
  data() {
    return {
      filters: {
        size_id: '',
        color_id: '',
      },
    };
  },
  methods: {
    filterProducts() {
      Inertia.get('/products', this.filters, { preserveState: true });
    },
  },
};
</script>

<style scoped>
/* Add some basic styling */
</style>
