<template>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="container-full">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="d-flex flex-column align-items-start gap-2">
                    <div
                        class="me-auto d-flex justify-content-between align-items-center col-12"
                    >
                        <h4 class="page-title">
                            Service: <strong>{{ service.name }}</strong>
                        </h4>

                        <div class="d-flex gap-2">
                            <router-link
                                :to="`/services/${$route.params.id}/edit`"
                                class="waves-effect waves-light btn shadow push-btn btn-primary-light"
                            >
                                <i class="fa fa-pencil"></i>
                                Edit
                            </router-link>
                            <button
                                type="button"
                                @click.prevent="remove"
                                class="waves-effect waves-light btn shadow push-btn btn-warning-light"
                            >
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
                                        <router-link to="/"
                                            ><i class="mdi mdi-home-outline"></i
                                        ></router-link>
                                    </li>
                                    <li
                                        class="breadcrumb-item active"
                                        aria-current="page"
                                    >
                                        <router-link to="/services">
                                            Services
                                        </router-link>
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main content -->
            <section class="content" v-if="service.id">
                <div class="row">
                    <div class="col-xl-8 col-12">
                        <div class="box">
                            <div class="box-body min-h-150" alt="cover">
                                <!--<div
                                    class="bg-success rounded10 p-15 fs-18 d-inline"
                                >
                                    <i class="fa fa-stethoscope"></i> ENT
                                    Specialist
                                </div>
                                -->
                            </div>
                            <div class="box-body wed-up">
                                <div class="d-md-flex align-items-start">
                                    <img
                                        :src="service.avatar"
                                        class="bg-success-light rounded10 w-200"
                                        alt="avatar"
                                    />
                                    <div>
                                        <h4></h4>
                                        <!--<p>
                                            <i class="fa fa-clock-o"></i> Join
                                            on 15 May 2019, 10:00 AM
                                        </p>-->
                                    </div>
                                </div>
                            </div>
                            <div class="box-body">
                                <video
                                    style="
                                        width: 100%;
                                        height: auto;
                                        background: #bbb;
                                        border-radius: 1em;
                                    "
                                    controls
                                >
                                    <source :src="service.video_cover" />
                                </video>
                            </div>

                            <div class="box-body">
                                <h4>Name</h4>
                                <p>{{ service.name }}</p>
                                <br />
                                <h4>Description</h4>
                                <p>{{ service.description }}</p>
                            </div>
                        </div>
                        <div class="box" v-if="service.reviews">
                            <div class="box-header">
                                <h4 class="box-title">Reviews</h4>
                            </div>
                            <div class="box-body">
                                <div
                                    class="media d-lg-flex d-block text-lg-start text-center"
                                    v-for="(review, index) in service.reviews"
                                    :key="index"
                                >
                                    <img
                                        class="me-3 img-fluid rounded bg-primary-light w-100"
                                        v-if="review.img"
                                        :src="review.img"
                                    />
                                    <div class="media-body my-10 my-lg-0">
                                        <h4
                                            class="mt-0 mb-2"
                                            v-if="review.name"
                                        >
                                            {{ review.name }}
                                        </h4>
                                        <div
                                            v-if="review.comment"
                                            class="d-flex justify-content-center justify-content-lg-start"
                                        >
                                            {{ review.comment }}
                                        </div>
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
                                        <div
                                            class="d-flex align-items-center mb-30"
                                            v-if="
                                                Array.isArray(
                                                    service.gallery,
                                                ) && service.gallery.length
                                            "
                                        >
                                            <div
                                                class="me-30"
                                                v-for="image in service.gallery"
                                            >
                                                <img
                                                    :src="image"
                                                    class="avatar avatar-lg rounded10 bg-primary-light"
                                                    alt="image"
                                                />
                                            </div>
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
    name: "ServiceDetails",

    data() {
        return {
            service: {},
        };
    },

    async created() {
        try {
            this.service = (
                await axios.get(`/api/services/${this.$route.params.id}`)
            ).data;
        } catch (error) {
            console.error("There was an error fetching the services:", error);
        }
    },
    methods: {
        async remove() {
            try {
                await axios.delete(`/api/services/${this.$route.params.id}`);
                this.$router.push("/services");
            } catch (e) {}
        },
    },
};
</script>
