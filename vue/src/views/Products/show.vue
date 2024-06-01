<template>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="container-full">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="d-flex align-items-center">
                    <div class="me-auto">
                        <h4 class="page-title">{{ product.name }}</h4>
                        <div class="d-inline-block align-items-center">
                            <nav>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="#"><i class="mdi mdi-home-outline"></i></a>
                                    </li>
                                    <li class="breadcrumb-item" aria-current="page">
                                        Products
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        Details
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main content -->
            <section class="content" v-if="product.id">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="box">
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-4 col-sm-6">
                                        <div class="box box-body b-1 text-center no-shadow">
                                            <img :src="product.image" id="product-image" class="img-fluid" alt="" />
                                        </div>
                                        <div class="pro-photos">
                                            <div class="photos-item item-active">
                                                <img :src="product.image" alt="" />
                                            </div>
                                            <div class="photos-item">
                                                <img :src="product.image_cover" alt="" />
                                            </div>
                                      
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                    <div class="col-md-8 col-sm-6">
                                        <h2 class="box-title mt-0">
                                            {{ product.name }}
                                        </h2>
                                        <div class="list-inline">
                                            <a class="text-warning"><i class="mdi mdi-star"></i></a>
                                            <a class="text-warning"><i class="mdi mdi-star"></i></a>
                                            <a class="text-warning"><i class="mdi mdi-star"></i></a>
                                            <a class="text-warning"><i class="mdi mdi-star"></i></a>
                                            <a class="text-warning"><i class="mdi mdi-star"></i></a>
                                        </div>
                                        <h1 class="pro-price mb-0 mt-20">
                                            {{ product.price }}
                                        </h1>
                                        <hr />
                                        <p><strong>Description</strong></p>
                                        <p>{{ product.desc }}</p>

                                        <hr />
                                        <p><strong>Details</strong></p>
                                        <p>{{ product.details }}</p>
                                        <hr />
                                        <div class="gap-items">
                                            <router-link :to="`/products/${$route.params.id}/edit`" class="btn btn-success">
                                                <i class="mdi mdi-shopping"></i>
                                                Edit
                                            </router-link>
                                            <button @click.prevent="remove" class="btn btn-primary">
                                                <i class="mdi mdi-cart-plus"></i>
                                                Delete
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- /.content -->
        </div>
    </div>
    <!-- /.content-wrapper -->
</template>
<script>
import axios from "axios";
export default {
    name: "detailsproduct",

    data() {
        return {
            product: {},
        };
    },

    async created() {
        this.product = (
            await axios.get(`/api/products/${this.$route.params.id}`)
        ).data;
    },

    methods: {
        remove() {
            axios
                .delete(`/api/products/${this.$route.params.id}`) // Adjust the URL as necessary
                .then(() => {
                    // Refresh the list after deletion
                    this.$router.push("/products");
                })
                .catch((error) => {
                    console.error(
                        "There was an error deleting the product:",
                        error,
                    );
                });
        },
    },
};
</script>
