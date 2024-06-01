<template>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="container-full" v-if="blog.id">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="d-flex align-items-center">
                    <div class="me-auto">
                        <h4 class="page-title">{{ blog.title }}</h4>
                        <div class="d-inline-block align-items-center">
                            <nav>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <router-link to="/"
                                            ><i class="mdi mdi-home-outline"></i
                                        ></router-link>
                                    </li>
                                    <li
                                        class="breadcrumb-item"
                                        aria-current="page"
                                    >
                                        <router-link to="/blogs">
                                            Blogs
                                        </router-link>
                                    </li>
                                    <li
                                        class="breadcrumb-item active"
                                        aria-current="page"
                                    >
                                        {{ blog.title }}
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-md-8">
                        <div class="box overflow-hidden">
                            <figure class="img-hov-zoomin mb-0">
                                <img :src="blog.cover" />
                            </figure>
                            <div class="box-body">
                                <h4>
                                    <a href="#">{{ blog.title }}</a>
                                </h4>
                                <p>
                                    <strong>author: </strong>{{ blog.author }}
                                </p>
                                <p>
                                    <strong>created at:</strong>
                                    {{ format(blog.created_at) }}
                                </p>
                                <p>
                                    <strong>updated at:</strong>
                                    {{ format(blog.created_at) }}
                                </p>
                                <div class="flexbox align-items-center mt-3">
                                    <div class="d-flex gap-2">
                                        <router-link
                                            :to="`/blogs/${$route.params.id}/edit`"
                                            class="waves-effect waves-light btn shadow push-btn btn-primary"
                                        >
                                            <i class="fa fa-pencil"></i>
                                            Edit
                                        </router-link>
                                        <button
                                            type="button"
                                            @click.prevent="remove"
                                            class="waves-effect waves-light btn shadow push-btn btn-warning"
                                        >
                                            <i class="fa fa-trash"></i>
                                            Remove
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box">
                            <div class="box-body">
                                <p v-html="blog.article" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="box">
                            <div class="box-header">
                                <h4 class="box-title">Images</h4>
                            </div>
                            <div class="box-body">
                                <div class="inner-user-div4">
                                    <div>
                                        <div
                                            class="d-flex align-items-center mb-30"
                                            v-if="
                                                Array.isArray(blog.images) &&
                                                blog.images.length
                                            "
                                        >
                                            <div
                                                class="me-30"
                                                v-for="image in blog.images"
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

                <!-- /.row -->
            </section>
            <!-- /.content -->
        </div>
    </div>
    <!-- /.content-wrapper -->
</template>
<script>
import axios from "axios";
export default {
    name: "newproduct",

    data() {
        return {
            blog: {},
        };
    },

    async created() {
        try {
            this.blog = (
                await axios.get(`/api/blogs/${this.$route.params.id}`)
            ).data;
        } catch (error) {
            console.error("There was an error fetching the blogs:", error);
        }
    },
    methods: {
        async remove() {
            try {
                await axios.delete(`/api/blogs/${this.$route.params.id}`);
                this.$router.push("/blogs");
            } catch (e) {}
        },
        format(date) {
            return new Date(date).toLocaleString();
        },
    },
};
</script>
