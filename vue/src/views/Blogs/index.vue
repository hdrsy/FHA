<template>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="container-full">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="d-flex align-items-center">
                    <div class="me-auto">
                        <h4 class="page-title">Blog</h4>
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
                                        Blog
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main content -->
            <section class="content">
                <div class="row" v-if="blogs && blogs.data.length">
                    <div
                        class="col-xl-6 col-12 h-p100"
                        v-for="(blog, index) in blogs.data"
                        :key="index"
                    >
                        <div
                            class="box card-inverse bg-img text-center py-80"
                            :style="`
                                background-image: url(${blog.cover});
                            `"
                            data-overlay="5"
                        >
                            <div class="card-body">
                                <span class="bb-1 opacity-80 pb-2">{{
                                    format(blog.created_at)
                                }}</span>
                                <br /><br />
                                <h3>
                                    {{ blog.title.substring(0, 30) }}
                                </h3>
                                <br /><br />
                                <router-link
                                    :to="`/blogs/${blog.id}`"
                                    class="btn btn-primary-light"
                                    >Read More</router-link
                                >
                            </div>
                        </div>
                    </div>
                    <RPagination
                        :links="blogs.links"
                        @update-page="fetchBlogs"
                        v-if="blogs.links && blogs.links.length"
                    />
                </div>
                <!-- /.row -->
            </section>
            <!-- /.content -->
        </div>
    </div>
    <!-- /.content-wrapper -->
</template>
<script>
import RPagination from "@/components/pagination.vue";
import { url, fetch } from "@/utils";

export default {
    name: "BlogsIndex",
    components: { RPagination },
    data() {
        return {
            blogs: {
                data: [],
                links: [],
            },
        };
    },
    async created() {
        await this.fetchBlogs(url("blogs?page=1"));
    },
    methods: {
        async fetchBlogs(url) {
            await fetch(url, (blogs) => (this.blogs = blogs));
        },
        format(date) {
            return new Date(date).toLocaleString();
        },
    },
};
</script>
