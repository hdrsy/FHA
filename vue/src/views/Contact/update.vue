<template>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="container-full">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="d-flex align-items-center">
                    <div class="me-auto">
                        <h4 class="page-title">Contact</h4>
                        <div class="d-inline-block align-items-center">
                            <nav>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="#"><i class="mdi mdi-home-outline"></i></a>
                                    </li>
                                    <li class="breadcrumb-item" aria-current="page">
                                        Contact
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        Update
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
                    <div class="col-lg-12 col-12">
                        <div class="box">
                            <!-- /.box-header -->
                            <form class="form" @submit.prevent="submitContact">
                                <div class="box-header">
                                    <h4 class="box-title text-info mb-0">
                                        <i class="ti-user me-15"></i>Contact
                                        Update
                                    </h4>
                                </div>
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">contact title</label>
                                                <input type="text" v-model="contact.contact_title" class="form-control"
                                                    placeholder="contact title" />
                                                <span v-if="errors.contact_title" class="text-danger">{{
                                                    errors.contact_title[0]
                                                    }}</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">contact description</label>
                                                <textarea rows="5" v-model="contact.contact_description
                                                    " class="form-control"
                                                    placeholder="contact description"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Arabic contact title</label>
                                                <input type="text" v-model="contact.ar_contact_title"
                                                    class="form-control" placeholder="arabic contact title" />
                                                <span v-if="errors.ar_contact_title" class="text-danger">{{
                                                    errors.ar_contact_title[0]
                                                    }}</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Arabic contact description</label>
                                                <textarea rows="5" v-model="contact.ar_contact_description
                                                    " class="form-control"
                                                    placeholder="arabic contact description"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <RFileUpload label="Cover" :file="contact.cover" @update-file="(file) =>
                                                (contact.cover =
                                                    file)
                                                " />
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="form-label">Location En</label>
                                                <input type="text" v-model="contact.location" class="form-control"
                                                    placeholder="Location" />
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="form-label">Location Ar</label>
                                                <input type="text" v-model="contact.ar_location" class="form-control"
                                                    placeholder="Arabic Location" />
                                            </div>
                                        </div>

                                    </div>
                                </div>


                                <div class="box-header">
                                    <h3>Links</h3>

                                    <button type="button" @click.prevent="addFeature"
                                        class="waves-effect waves-light btn shadow push-btn btn-primary-light">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </div>
                                <div v-if="links.length" class="box-body">
                                    <div class="row" v-for="(link, i) in links" :key="i" style="
                                            border-bottom: 1px solid #ccc;
                                            margin-bottom: 1em;
                                        ">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label class="form-label">Email</label>
                                                <textarea v-model="link.email
                                                    " class="form-control" placeholder="Email" />
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label class="form-label">Phone</label>
                                                <textarea v-model="link.phone
                                                    " class="form-control" placeholder="Phone" />
                                            </div>
                                        </div>
                                        <!-- Remove Button -->
                                        <div class="col-md-2 d-flex align-items-center">
                                            <button type="button" @click="removeFeature(i)" class="btn btn-danger"
                                                style="margin-top: 10px">
                                                <i class="fa fa-trash"></i> Remove
                                            </button>
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
import RFileUpload from "@/components/file-upload.vue";
import RFilesUpload from "@/components/files-upload.vue";
export default {
    name: "update",
    components: { RFileUpload, RFilesUpload },
    data() {
        return {
            contact: {
                contact_title: "",
                contact_description: "",
                ar_contact_title: "",
                ar_contact_description: "",
                location: "",
                ar_location: "",
                cover: null,
            },
            links: [],
            errors: {},
        };
    },
    async created() {
        this.contact = (await axios.get("/api/contact")).data;
        this.links = this.contact.links;
    },
    methods: {
        addFeature() {
            this.links.push({
                name: "",
                email: "",
                phone: "",
            });
        },
        removeFeature(index) {
            this.links.splice(index, 1); // تصحيح للإزالة الصحيحة للعناصر
        },
        submitContact() {
            const formData = new FormData();
            formData.append("_method", "put");
            formData.append('contact_title', this.contact.contact_title);
            formData.append('contact_description', this.contact.contact_description);
            formData.append('ar_contact_title', this.contact.ar_contact_title);
            formData.append('ar_contact_description', this.contact.ar_contact_description);
            formData.append('location', this.contact.location);
            formData.append('ar_location', this.contact.ar_location);
            if (this.contact.cover) {
                formData.append('cover', this.contact.cover);
            }
            formData.append('links', JSON.stringify(this.links)); // تحويل الروابط إلى JSON string

            axios.post("/api/contacts/1", formData, {
                headers: {
                    "Content-Type": "multipart/form-data",
                },
            })
                .then(response => {
                    // التعامل مع الرد
                    console.log(response.data);
                    this.$router.push({ name: "ContactProfile" }); // توجيه المستخدم إلى صفحة الملف الشخصي للاتصال
                })
                .catch(error => {
                    console.error(error);
                    if (error.response && error.response.data.errors) {
                        this.errors = error.response.data.errors; // عرض الأخطاء
                    }
                });
        },
        onFileChange(event, fieldName) {
            this.contact[fieldName] = event.target.files[0];
        },
    },
};
</script>
