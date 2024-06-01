<template>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="container-full">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="d-flex align-items-center">
                    <div class="me-auto">
                        <h4 class="page-title">Blogs</h4>
                        <div class="d-inline-block align-items-center">
                            <nav>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="#"><i class="mdi mdi-home-outline"></i></a>
                                    </li>
                                    <li class="breadcrumb-item" aria-current="page">
                                        Blogs
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        Edit
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Main content -->
            <section class="content" v-if="blog.id">
                <div class="row">
                    <div class="col-lg-12 col-12">
                        <div class="box">
                            <!-- /.box-header -->
                            <form class="form" @submit.prevent="submitBlog">
                                <div class="box-header">
                                    <h4 class="box-title text-info mb-0">
                                        <i class="ti-user me-15"></i>Edit Blog
                                    </h4>
                                </div>
                                <div class="box-body">
                                    <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">English Title</label>
                                    <input
                                        type="text"
                                        v-model="blog.title"
                                        class="form-control"
                                        placeholder="Title"
                                    />
                                    <span
                                        v-if="errors.title"
                                        class="text-danger"
                                        >{{ errors.title[0] }}</span
                                    >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">English Author</label>
                                    <input
                                        type="text"
                                        v-model="blog.author"
                                        class="form-control"
                                        placeholder="Author"
                                    />
                                    <span
                                        v-if="errors.author"
                                        class="text-danger"
                                        >{{ errors.author[0] }}</span
                                    >
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Arabic Title</label>
                                    <input
                                        type="text"
                                        v-model="blog.ar_title"
                                        class="form-control"
                                        placeholder="العنوان"
                                    />
                                    <span
                                        v-if="errors.ar_title"
                                        class="text-danger"
                                        >{{ errors.ar_title[0] }}</span
                                    >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Arabic Author</label>
                                    <input
                                        type="text"
                                        v-model="blog.ar_author"
                                        class="form-control"
                                        placeholder="المؤلف"
                                    />
                                    <span
                                        v-if="errors.ar_author"
                                        class="text-danger"
                                        >{{ errorsar_.author[0] }}</span
                                    >
                                </div>
                            </div><div class="form-group">
                                <label>Category</label>
                                <select v-model="blog.category_id" class="form-control">
                                    <option v-for="category in categories" :key="category.id" :value="category.id">
                                        {{ category.description }}
                                    </option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                            <RFileUpload
                                                :file="blog.image"
                                                label="Image"
                                                @update-file="
                                                    (file) =>
                                                        (blog.image = file)
                                                "
                                            />
                                        </div>
                                        <div class="col-md-4">
                                            <RFileUpload
                                                :file="blog.cover"
                                                label="Cover"
                                                @update-file="
                                                    (file) =>
                                                        (blog.cover = file)
                                                "
                                            />
                                        </div>
                                        <div
                                            v-if="images.length"
                                            class="col-md-6"
                                        >
                                            <RFilesUpload
                                                label="Images"
                                                :files="images"
                                                @update-files="
                                                    (files) => (images = files)
                                                "
                                            />
                                        </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Article</label>
                                    <QuillEditor
                                        style="height: 50vh"
                                        class="form-control"
                                        v-model:content="blog.article"
                                        contentType="html"
                                        theme="snow"
                                    />
                                    <span
                                        v-if="errors.article"
                                        class="text-danger"
                                        >{{ errors.article[0] }}</span
                                    >
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Arabic Article</label>
                                    <QuillEditor
                                        style="height: 50vh"
                                        class="form-control"
                                        v-model:content="blog.ar_article"
                                        contentType="html"
                                        theme="snow"
                                    />
                                    <span
                                        v-if="errors.ar_article"
                                        class="text-danger"
                                        >{{ errors.ar_article[0] }}</span
                                    >
                                </div>
                            </div>
                        </div>
                                </div>
                                <!-- /.box-body -->
                                <div class="box-footer">
                                    <button type="button" class="btn btn-warning me-1">
                                        <i class="ti-trash"></i> Cancel
                                    </button>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="ti-save-alt"></i> Save
                                    </button>
                                </div>
                            </form>
                        </div>
                        <!-- /.box -->
                    </div>
                </div>
            </section>
            <!-- /.content -->
        </div>
    </div>

</template>

<script>
import axios from "axios";
import { QuillEditor } from "@vueup/vue-quill";
import { fetch, url } from "@/utils";
import RFileUpload from "@/components/file-upload.vue";
import RFilesUpload from "@/components/files-upload.vue";

export default {
    name: "EditBlog",
    components: { RFileUpload, RFilesUpload, QuillEditor },
    data() {
        return {
            blog: {
                title: "",
                ar_title: "",
                author: "",
                ar_author: "",
                article: "",
                ar_article: "",
                cover: null,
                image: null,
                category_id: null,
            },
            images: [],
            errors: {},
            categories: [],
        };
    },
    async created() {
        await fetch(
            url(`blogs/${this.$route.params.id}`),
            (blog) => (this.blog = blog),

        );
        this.categories = (await axios.get("/api/blog-categories-list")).data;
        this.images = this.blog.images;
        console.log(blog.images);
    },
    methods: {
        submitBlog() {
            const formData = new FormData();

            formData.append("_method", "put");

            Object.keys(this.blog).forEach((key) => {
                formData.append(key, this.blog[key]);
            });
            for (let img of this.images) {
                formData.append("images[]", img);
            }

            axios
                .post(`/api/blogs/${this.blog.id}`, formData, {
                    headers: {
                        "Content-Type": "multipart/form-data",
                    },
                })
                .then((response) => {
                    this.$router.push(`/blogs/${this.blog.id}`); // توجيه المستخدم إلى صفحة المنتجات
                })
                .catch((error) => {
                    console.error(error);
                    if (error.response && error.response.data.errors) {
                        this.errors = error.response.data.errors; // تخزين الأخطاء لعرضها
                    }
                });
        },
    },
};
</script>

<style scoped>
/* Add component-specific styles here */
</style>
