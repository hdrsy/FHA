<template>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="container-full">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="d-flex align-items-center">
                    <div class="me-auto">
                        <h4 class="page-title">Profile</h4>
                        <div class="d-inline-block align-items-center">
                            <nav>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="#"><i class="mdi mdi-home-outline"></i></a>
                                    </li>
                                    <li class="breadcrumb-item" aria-current="page">Extra</li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        Profile
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <section class="content">
                <div class="row">



                    <div class="col-12 col-lg-12 col-xl-12">
                        <div class="box box-widget widget-user">
                            <!-- Add the bg color to the header using any of the bg-* classes -->
                            <div class="widget-user-header bg-img bbsr-0 bber-0" style="
                      background: url('../../assets/dashboard/images/gallery/full/10.jpg') center
                        center;
                    " data-overlay="5">

                            </div>
                            <div class="widget-user-image">
                                <img class="rounded-circle" src="../../assets/dashboard/images/user3-128x128.jpg"
                                    alt="User Avatar" />
                            </div>
                            <div class="box-footer">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="description-block">
                                            <h5 class="description-header">{{ contact ? contact.contact_title : '' }}</h5>
                                            <span class="description-text">{{ contact ? contact.contact_description : ''}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="box">
                            <div class="box-body box-profile">
                                <div class="row">
                                    <div class="col-12" v-for="(link, index) in contact.links" :key="index">
                                        <div>
                                            <p>Email: <span class="text-gray ps-10">{{ link.email }}</span></p>
                                            <p>Phone: <span class="text-gray ps-10">{{ link.phone }}</span></p>
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
    name: "profile",

    data() {
        return {
            contact: {},
        };
    },
    async created() {
        this.contact = (
            await axios.get(`/api/contact`)
        ).data;
    },
};
</script>
