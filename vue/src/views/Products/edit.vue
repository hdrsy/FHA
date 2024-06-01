<template>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="container-full">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="d-flex align-items-center">
                    <div class="me-auto">
                        <h4 class="page-title">Products</h4>
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
                                        Edit
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
                    <div class="col-lg-12 col-12">
                        <div class="box">
                            <!-- /.box-header -->
                            <form class="form" @submit.prevent="submitProduct">
                                <div class="box-header">
                                    <h4 class="box-title text-info mb-0">
                                        <i class="ti-user me-15"></i>Edit Product
                                    </h4>
                                </div>
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="form-label">Name</label>
                                                <input type="text" v-model="product.name" class="form-control"
                                                    placeholder="Name" />
                                            </div>
                                        </div><div class="col-md-12">
                                            <div class="form-group">
                                                <label class="form-label">Arabic Name</label>
                                                <input type="text" v-model="product.ar_name" class="form-control"
                                                    placeholder="الاسم" />
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Category</label>
                                                <select v-model="product.category_id" class="form-control">
                                                    <option v-for="category in categories" :key="category.id"
                                                        :value="category.id">
                                                        {{ category.description }}
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="form-label">Price</label>
                                                <input type="number" v-model="product.price" class="form-control"
                                                    placeholder="Price" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="form-label"
                                                    >Description</label
                                                >
                                                <textarea
                                                    rows="5"
                                                    v-model="
                                                        product.desc
                                                    "
                                                    class="form-control"
                                                    placeholder="About Product"
                                                ></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="form-label"
                                                    >Arabic Description</label
                                                >
                                                <textarea
                                                    rows="5"
                                                    v-model="
                                                        product.ar_desc
                                                    "
                                                    class="form-control"
                                                    placeholder="وصف المنتج"
                                                ></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="form-label"
                                                    >Details</label
                                                >
                                                <textarea v-model="product.details" class="form-control"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="form-label"
                                                    >Arabic Details</label
                                                >
                                                <textarea v-model="product.ar_details" class="form-control"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <RFileUpload
                                                :file="product.image"
                                                label="Image"
                                                @update-file="
                                                    (file) =>
                                                        (product.image = file)
                                                "
                                            />
                                        </div>
                                        <div class="col-md-12">
                                            <RFileUpload
                                                :file="product.image_cover"
                                                label="Image Cover"
                                                @update-file="
                                                    (file) =>
                                                        (product.image_cover = file)
                                                "
                                            />
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
    <!-- /.content-wrapper -->
</template>

<script>
import axios from "axios";
import { fetch, url } from "@/utils";
import RFileUpload from "@/components/file-upload.vue";
import RFilesUpload from "@/components/files-upload.vue";

export default {
    name: "EditProduct",
    components: { RFileUpload, RFilesUpload },
    data() {
        return {
            product: {
                name: "",
                ar_name: "",
                price: "",
                desc: "",
                ar_desc: "",
                image: null,
                image_cover: null,
                details: "",
                ar_details: "",
                category_id: null
                // Initialize other fields as needed
            },
            categories: [],
        };
    },
    async created() {
        await fetch(
            url(`products/${this.$route.params.id}`),
            (product) => (this.product = product),

        );
        this.categories = (await axios.get("/api/categories-list")).data;
        console.log(categories);
    },
    methods: {
        submitProduct() {
            const formData = new FormData();

            formData.append("_method", "put");

            Object.keys(this.product).forEach((key) => {
                formData.append(key, this.product[key]);
            });

            axios
                .post(`/api/products/${this.product.id}`, formData, {
                    headers: {
                        "Content-Type": "multipart/form-data",
                    },
                })
                .then((response) => {
                    this.$router.push(`/products/${this.product.id}`); // توجيه المستخدم إلى صفحة المنتجات
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
