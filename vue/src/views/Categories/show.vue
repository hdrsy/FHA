<template>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="container-full">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="d-flex flex-column align-items-start gap-2">
                    <div class="me-auto d-flex justify-content-between align-items-center col-12">
                        <h4 class="page-title">Categories</h4>

                        <div class="d-flex gap-2">
                            <router-link :to="`/categories/${$route.params.id}/edit`"
                                class="waves-effect waves-light btn shadow push-btn btn-primary-light">
                                <i class="fa fa-pencil"></i>
                                Edit
                            </router-link>
                            <button type="button" @click.prevent="remove"
                                class="waves-effect waves-light btn shadow push-btn btn-warning-light">
                                <i class="fa fa-trash"></i>
                                Remove
                            </button>
                        </div>
                    </div>
                    <div>
                        <div class="d-inline-block align-items-center">
                            <nav>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="#"><i class="mdi mdi-home-outline"></i></a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        Category Details
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main content -->
            <section class="content" v-if="category.id">
                <div class="row">
                    <div class="col-xl-8 col-12">
                        <div class="box">
                            <div class="box-body text-end min-h-150" :style="`
                                    background-image: url(${category.cover});
                                    background-repeat: no-repeat;
                                    background-position: center;
                                    background-size: cover;
                                `" alt="cover">
                                <!--<div
                                    class="bg-success rounded10 p-15 fs-18 d-inline"
                                >
                                    <i class="fa fa-stethoscope"></i> ENT
                                    Specialist
                                </div>
                                -->
                            </div>
                            <div class="box-body wed-up position-relative">
                                <div class="d-md-flex align-items-start">
                                    <img :src="category.avatar" class="bg-success-light rounded10 me-20 w-200"
                                        alt="avatar" />
                                    <div>
                                        <h4></h4>
                                   
                                    </div>
                                </div>
                            </div>
                            <div class="box-body">
                                <h4>Description</h4>
                                <p>{{ category.description }}</p>
                                <br />
                                <h4>Details</h4>
                                <p>{{ category.details }}</p>
                            </div>
                        </div>
                        <div class="box" v-if="category.features">
                            <div class="box-header">
                                <h4 class="box-title">Features</h4>
                            </div>
                            <div class="box-body">
                                <div class="media d-lg-flex d-block text-lg-start text-center" v-for="(
                                        feature, index
                                    ) in category.features" :key="index">
                                    <img class="me-3 img-fluid rounded bg-primary-light w-100" v-if="feature.img"
                                        :src="feature.img" />
                                    <div class="media-body my-10 my-lg-0">
                                        <h4 class="mt-0 mb-2" v-if="feature.title">
                                            {{ feature.title }}
                                        </h4>
                                        <div v-if="feature.description"
                                            class="d-flex justify-content-center justify-content-lg-start">
                                            {{ feature.description }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box">
                            <div class="box-header">Offer</div>
                            <div class="box-body">
                                <div class="media d-lg-flex d-block text-lg-start text-center">
                                    <img class="me-3 img-fluid rounded bg-primary-light w-100" :src="category.offer_image"
                                        alt="" />
                                    <div class="media-body my-10 my-lg-0">
                                        <h4 class="mt-0 mb-2">
                                            {{ category.offer_title }}
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-12">
                        <div class="box">
                            <div class="box-header">
                                <h4 class="box-title">Gallery</h4>
                            </div>
                            <div class="box-body">
                                <div class="inner-user-div4">
                                    <div>
                                        <div class="d-flex align-items-center mb-30" v-if="Array.isArray(
                                            category.gallery,
                                        ) && category.gallery.length
                                            ">
                                            <div class="me-30" v-for="image in category.gallery">
                                                <img :src="image" class="avatar avatar-lg rounded10 bg-primary-light"
                                                    alt="image" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="box">
                            <div class="box-header">Symbol</div>
                            <div class="box-body">
                                <img :src="category.image_symbol" />
                                <div id="paginator1"></div>
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
    name: "CategoryDetails",

    data() {
        return {
            category: {},
        };
    },
    async created() {
        try {
            this.category = (
                await axios.get(`/api/categories/${this.$route.params.id}`)
            ).data;
        } catch (error) {
            console.error("There was an error fetching the categories:", error);
        }
    },
    methods: {
        async remove() {
            try {
                await axios.delete(`/api/categories/${this.$route.params.id}`);
                this.$router.push("/categories");
            } catch (e) { }
        },
    },
};
</script>
