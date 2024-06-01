<template>
    <div class="content-wrapper">
        <div class="container-full">
            <div class="content-header">
                <div class="d-flex align-items-center">
                    <div class="me-auto">
                        <h4 class="page-title">Company</h4>
                        <div class="d-inline-block align-items-center">
                            <nav>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a>
                                    </li>
                                    <li class="breadcrumb-item" aria-current="page">Company</li>
                                    <li class="breadcrumb-item active" aria-current="page">Update Profile</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <section class="content">
                <div class="row">
                    <div class="col-lg-12 col-12">
                        <div class="box">
                            <form class="form" @submit.prevent="submitcompany">
                                <div class="box-header">
                                    <h4 class="box-title text-info mb-0"><i class="ti-user me-15"></i>Company Add</h4>
                                </div>
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Name</label>
                                                <input type="text" v-model="company.name" class="form-control"
                                                    placeholder="name" />
                                                <span v-if="errors.name" class="text-danger">{{ errors.name[0] }}</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Type</label>
                                                <input type="text" v-model="company.type" class="form-control"
                                                    placeholder="type" />
                                                <span v-if="errors.details" class="text-danger">{{ errors.details[0]
                                                    }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Arabic Name</label>
                                                <input type="text" v-model="company.ar_name" class="form-control"
                                                    placeholder="arabic name" />
                                                <span v-if="errors.ar_name" class="text-danger">{{ errors.ar_name[0]
                                                    }}</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Arabic Type</label>
                                                <input type="text" v-model="company.ar_type" class="form-control"
                                                    placeholder="arabic type" />
                                                <span v-if="errors.ar_details" class="text-danger">{{
                                                    errors.ar_details[0]
                                                    }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <RFileUpload
                                                label="Cover"
                                                :file="company.video"
                                                @update-file="
                                                    (file) =>
                                                        (company.video =
                                                            file)
                                                "
                                            />
                                        </div>
                                        <div class="col-md-6">
                                            <RFileUpload :file="company.image" label="Image" @update-file="(file) =>
                                                (company.image = file)
                                                " />
                                        </div>
                                    </div>
                                </div>
                                <div class="box-header">
                                    <h3>Features</h3>
                                    <button type="button" @click.prevent="addFeature"
                                        class="waves-effect waves-light btn shadow push-btn btn-primary-light">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </div>
                                <div v-if="feature.length" class="box-body">
                                    <div class="row" v-for="(feat, i) in feature" :key="i" style="
                                            border-bottom: 1px solid #ccc;
                                            margin-bottom: 1em;
                                        ">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Title</label>
                                                <input type="text" v-model="feat.title" class="form-control"
                                                    placeholder="Feature Title" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Arabic Title</label>
                                                <input type="text" v-model="feat.ar_title" class="form-control"
                                                    placeholder="Arabic Feature Title" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="box-header">
                                    <h3>Services</h3>

                                    <button type="button" @click.prevent="addService"
                                        class="waves-effect waves-light btn shadow push-btn btn-primary-light">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </div>
                                <div v-if="services.length" class="box-body">
                                    <div class="row" v-for="(service, i) in services" :key="i" style="
                                            border-bottom: 1px solid #ccc;
                                            margin-bottom: 1em;
                                        ">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Title</label>
                                                <input type="text" v-model="service.title" class="form-control"
                                                    placeholder="service Title" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Description</label>
                                                <textarea v-model="service.description
                                                    " class="form-control" placeholder="service Title" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">ِArabic Title</label>
                                                <input type="text" v-model="service.ar_title" class="form-control"
                                                    placeholder="Arabic service title" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Arabic Description</label>
                                                <textarea v-model="service.ar_description
                                                    " class="form-control" placeholder="arabic service description" />
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <RFileUpload label="Image" :file="service.img" @update-file="(file) =>
                                                    (service.img = file)
                                                " />
                                        </div>
                                    </div>
                                </div>
                                <div class="box-footer">
                                    <button type="button" class="btn btn-warning me-1"><i class="ti-trash"></i>
                                        Cancel</button>
                                    <button type="submit" class="btn btn-primary"><i class="ti-save-alt"></i>
                                        Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</template>

<script>
import axios from "axios";

import RFileUpload from "@/components/file-upload.vue";
import RFilesUpload from "@/components/files-upload.vue";

export default {
    name: "newcompany",
    components: { RFileUpload, RFilesUpload },
    data() {
        return {
            company: {
                name: "",
                type: "",
                ar_name: "",
                ar_type: "",
                video: null,
                image: null,
            },
            feature: [],
            services: [],
            errors: {},
        };
    },
    async created() {
        this.company = (await axios.get("/api/profile")).data;
        console.log(this.company);
        if (typeof this.company.feature === 'string') {
            this.feature = JSON.parse(this.company.feature);
        } else {
            this.feature = this.company.feature;
        }
        if (typeof this.company.services === 'string') {
            this.services = JSON.parse(this.company.services);
        } else {
            this.services = this.company.services;
        }
    },
    methods: {
        addFeature() {
            this.feature.push({ title: "", ar_title: "" });
        },
        removeFeature(index) {
            this.feature.splice(index, 1);
        },
        addService() {
            this.services.push({ title: "", ar_title: "", description: "", ar_description: "", img: null });
        },
        removeService(index) {
            this.services.splice(index, 1);
        },
        submitcompany() {
            const formData = new FormData();
            Object.keys(this.company).forEach((key) => formData.append(key, this.company[key]));
            this.feature.forEach((feature, index) => {
                formData.append(`feature[${index}][title]`, feature.title);
                formData.append(`feature[${index}][ar_title]`, feature.ar_title);
            });

            // Add all services to the form data
            this.services.forEach((service, index) => {
                formData.append(`services[${index}][title]`, service.title);
                formData.append(`services[${index}][description]`, service.description);
                formData.append(`services[${index}][ar_title]`, service.ar_title);
                formData.append(`services[${index}][ar_description]`, service.ar_description);
                // Only append an image if it is not null
                if (service.img !== null) {
                    formData.append(`services[${index}][img]`, service.img);
                }
            });


            axios.post("/api/abouts", formData, {
                headers: { "Content-Type": "multipart/form-data" },
            })
                .then((response) => {
                    this.$router.push({ name: "company_profile" });
                })
                .catch((error) => {
                    console.error(error);
                    this.errors = error.response && error.response.data.errors ? error.response.data.errors : {};
                });
        },
    },
};
</script>
