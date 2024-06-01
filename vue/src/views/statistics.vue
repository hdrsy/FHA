<template>
    <div class="content-wrapper">
        <div class="container-full">
            <section class="content">
                <div class="row">
                    <div class="col-xl-2 col-md-6 col-6">
                        <div class="box">
                            <div class="box-body">
                                <div class="text-center">
                                    <h1 class="fs-50 text-primary"><i class="mdi mdi-chart-line"></i></h1>
                                    <h2>{{ products_count }}</h2>
                                    <span class="badge badge-pill badge-primary px-10 mb-10">Products</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-md-6 col-6">
                        <div class="box">
                            <div class="box-body">
                                <div class="text-center">
                                    <h1 class="fs-50 text-warning"><i class="mdi mdi-format-list-bulleted-type"></i>
                                    </h1>
                                    <h2>{{ categories_count }}</h2>
                                    <span class="badge badge-pill badge-warning px-10 mb-10">Categories</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-md-6 col-6">
                        <div class="box">
                            <div class="box-body">
                                <div class="text-center">
                                    <h1 class="fs-50 text-success"><i class="mdi mdi-blogger"></i></h1>
                                    <h2>{{ blogs_count }}</h2>
                                    <span class="badge badge-pill badge-success px-10 mb-10">Blogs</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</template>
<script>
import axios from 'axios';

export default {
    name: 'Statistics',
    data() {
        return {
            categories_count: 0, // Assuming you fetch this from your backend
            products_count: 0, // Assuming you fetch this from your backend
            blogs_count: 0, // Assuming you fetch this from your backend
        };
    },
    async created() {
        if (localStorage.getItem('firstTimeStatisticsReload') === 'true') {
            localStorage.removeItem('firstTimeStatisticsReload');
            window.location.reload();
        }
        this.categories_count = (await axios.get("/api/categories_count")).data;
        this.products_count = (await axios.get("/api/products_count")).data;
        this.blogs_count = (await axios.get("/api/blogs_count")).data;
    },
}
</script>
