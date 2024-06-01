<template>
    <div class="content-wrapper">
        <div class="container-full">
            <div class="content-header">
                <h4 class="page-title">Create New Product</h4>
            </div>
            <section class="content">
                <div class="box">
                    <form @submit.prevent="submitForm">
                        <div class="box-body">
                            <!-- Product Name -->
                            <div class="form-group">
                                <label>English Name</label>
                                <input type="text" v-model="form.name" class="form-control" required />
                            </div>
                            <div class="form-group">
                                <label>Arabic Name</label>
                                <input type="text" v-model="form.ar_name" class="form-control" required />
                            </div>

                            <!-- Product Category -->
                            <div class="form-group">
                                <label>Category</label>
                                <select v-model="form.category_id" class="form-control">
                                    <option v-for="category in categories" :key="category.id" :value="category.id">
                                        {{ category.description }}
                                    </option>
                                </select>
                            </div>

                            <!-- Product Price -->
                            <div class="form-group">
                                <label>Price</label>
                                <input type="number" v-model="form.price" class="form-control" required />
                            </div>

                            <!-- Product Description -->
                            <div class="form-group">
                                <label>English Description</label>
                                <textarea v-model="form.desc" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Arabic Description</label>
                                <textarea v-model="form.ar_desc" class="form-control"></textarea>
                            </div>


                            <div class="form-group">
                                <label>English Details</label>
                                <textarea v-model="form.details" class="form-control"></textarea>
                            </div>

                            <div class="form-group">
                                <label>Arabic Details</label>
                                <textarea v-model="form.ar_details" class="form-control"></textarea>
                            </div>


                            <!-- Product Images -->
                            <div class="form-group">
                                <label>Image</label>
                                <input type="file" @change="onFileChange($event, 'image')" accept="image/*" />
                            </div>


                            <div class="form-group">
                                <label>Image Cover</label>
                                <input type="file" @change="
                                    onFileChange($event, 'image_cover')
                                    " accept="image/*" />
                            </div>




                            <button type="submit" class="btn btn-primary">
                                Submit
                            </button>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </div>
</template>
<script>
import axios from "axios";

export default {
    name: "NewProduct",
    data() {
        return {
            form: {
                name: "",
                ar_name: "",
                price: null,
                desc: "",
                details: "",
                ar_desc: "",
                ar_details: "",
                category_id: null,
                image: null,
                image_cover: null,
            },

            categories: [], // Assuming you fetch this from your backend
        };
    },
    methods: {
        submitForm() {
            let formData = new FormData();
            formData.append("name", this.form.name);
            formData.append("ar_name", this.form.ar_name);
            formData.append("price", this.form.price);
            formData.append("desc", this.form.desc);
            formData.append("details", this.form.details);
            formData.append("ar_desc", this.form.ar_desc);
            formData.append("ar_details", this.form.ar_details);
            formData.append("category_id", this.form.category_id);
            formData.append("image", this.form.image);
            formData.append("image_cover", this.form.image_cover);
            formData.append("image_cover", this.form.image_cover);



            axios
                .post("/api/products", formData, {
                    headers: {
                        "Content-Type": "multipart/form-data",
                    },
                })
                .then((response) => {
                    this.$router.push(`/products/${response.data.id}`);
                })
                .catch((error) => {
                    // Handle error
                    console.error(error.response.data);
                });
        },
        onFileChange(e, field) {
            this.form[field] = e.target.files[0];
            // Similarly handle image_cover if needed
        },
        onFilesChange(e, field) {
            this.details = e.target.files;
            // Similarly handle image_cover if needed
        },
    },
    async created() {
        this.categories = (await axios.get("/api/product-categories-list")).data;
    },
};
</script>
