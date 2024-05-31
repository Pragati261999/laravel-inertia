<template>
    <div>
        <h1>Products</h1>
        <div>
            <label for="size">Size:</label>
            <select v-model="filters.size_id" @change="filterProducts">
                <option value="">All</option>
                <option v-for="size in sizes" :key="size.id" :value="size.id">
                    {{ size.name }}
                </option>
            </select>

            <label for="color">Color:</label>
            <select v-model="filters.color_id" @change="filterProducts">
                <option value="">All</option>
                <option
                    v-for="color in colors"
                    :key="color.id"
                    :value="color.id"
                >
                    {{ color.name }}
                </option>
            </select>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <!-- <th>Price</th> -->
                    <th>Colors</th>
                    <th>Sizes</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="product in products.data" :key="product.id">
                    <td>{{ product.name }}</td>
                    <!-- <td>{{ product.price }}</td> -->
                    <td>
                        {{
                            product.set_items
                                .map((item) => item.color.name)
                                .join(", ")
                        }}
                    </td>
                    <td>
                        {{
                            product.set_items
                                .map((item) => item.size.name)
                                .join(", ")
                        }}
                    </td>
                </tr>
            </tbody>
        </table>

        <div>
            <button @click="prevPage" :disabled="!products.prev_page_url">
                Previous
            </button>
            <button @click="nextPage" :disabled="!products.next_page_url">
                Next
            </button>
        </div>
    </div>
</template>

<script>
import { Inertia } from "@inertiajs/inertia";

export default {
    props: {
        products: Object,
        sizes: Array,
        colors: Array,
    },
    data() {
        return {
            filters: {
                size_id: "",
                color_id: "",
            },
        };
    },
    methods: {
        filterProducts() {
            Inertia.get("/products", this.filters, { preserveState: true });
        },
        nextPage() {
            if (this.products.next_page_url) {
                Inertia.get(this.products.next_page_url, this.filters, {
                    preserveState: true,
                });
            }
        },
        prevPage() {
            if (this.products.prev_page_url) {
                Inertia.get(this.products.prev_page_url, this.filters, {
                    preserveState: true,
                });
            }
        },
    },
};
</script>

<style scoped>

.filters {
  margin-bottom: 20px;
}

.filters label {
  margin-right: 10px;
}

.filters select {
  margin-right: 20px;
}

table {
  width: 100%;
  border-collapse: collapse;
  margin-bottom: 20px;
  font-family: Arial, sans-serif; /* Specify font family */
}

table th, table td {
  border: 1px solid #ddd;
  padding: 8px;
  text-align: left;
}

table th {
  background-color: #f2f2f2;
}

.pagination button {
  background-color: #4CAF50;
  color: white;
  border: none;
  padding: 10px 20px;
  margin: 5px;
  cursor: pointer;
  font-family: Arial, sans-serif; /* Specify font family */
}

.pagination button:disabled {
  background-color: #ddd;
  cursor: not-allowed;
}
</style>
