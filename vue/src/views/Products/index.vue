<template>
    <div class="content-wrapper">
        <div class="container-full">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <!-- header content -->
            </div>
            <!-- Main content -->
            <section class="content">
                <div class="row fx-element-overlay">
                    <div
                        class="col-12 col-lg-6 col-xl-4"
                        v-for="product in products.data"
                        :key="product.id"
                    >
                        <div class="box">
                            <div class="fx-card-item">
                                <div class="fx-card-avatar fx-overlay-1">
                                    <img
                                        :src="
                                            product.image ||
                                            '../../assets/dashboard/images/product/default.png'
                                        "
                                        alt="product"
                                        class="bbsr-0 bber-0"
                                    />
                                    <div class="fx-overlay scrl-up">
                                        <ul class="fx-info">
                                            <li>
                                                <router-link
                                                    :to="`/products/${product.id}`"
                                                    class="btn btn-outline image-popup-vertical-fit"
                                                    ><i
                                                        class="mdi mdi-magnify"
                                                    ></i
                                                ></router-link>
                                            </li>
                                            <li>
                                                <a
                                                    class="btn btn-outline"
                                                    @click="
                                                        deleteProduct(
                                                            product.id,
                                                        )
                                                    "
                                                    ><i
                                                        class="mdi mdi-delete"
                                                    ></i
                                                ></a>
                                            </li>
                                            <li>
                                                <router-link
                                                    :to="
                                                        '/products/' +
                                                        product.id +
                                                        '/edit'
                                                    "
                                                    class="btn btn-outline"
                                                    ><i
                                                        class="mdi mdi-settings"
                                                    ></i
                                                ></router-link>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="fx-card-content text-start">
                                    <div class="product-text">
                                        <h2 class="pro-price text-blue">
                                            {{ product.price }}
                                        </h2>
                                        <h4 class="box-title mb-0">
                                            {{ product.name }}
                                        </h4>
                                        <small class="text-muted db">{{
                                            product.category.description
                                        }}</small>
                                        <!-- Assume category_name is available -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.box -->
                    </div>
                </div>
                <RPagination
                    :links="products.links"
                    @update-page="fetchProducts"
                    v-if="products.links && products.links.length"
                />
            </section>
            <!-- /.content -->
        </div>
    </div>
    <!-- /.content-wrapper -->
</template>

<script>
import RPagination from "@/components/pagination.vue";
import axios from "axios";
import { fetch, url } from "@/utils";

export default {
    name: "Products",
    components: { RPagination },
    data() {
        return {
            products: [], // Initialize products as an empty array
        };
    },
    methods: {
        async fetchProducts(url) {
            await fetch(url, (products) => (this.products = products));
        },
        async deleteProduct(productId) {
            try {
                await axios.delete(`/api/products/${productId}`); // Adjust the URL as necessary
                // Refresh the list after deletion
                this.fetchProducts(url("products?page=1"));
            } catch (e) {
                console.error(
                    "There was an error deleting the product:",
                    error,
                );
            }
        },
    },
    async created() {
        await this.fetchProducts(url("products?page=1")); // Fetch products when the component mounts
    },
};
</script>
