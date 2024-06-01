<template>
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
                                    <li class="breadcrumb-item" aria-current="page">Extrass</li>
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
                        <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs">
                                <li>
                                    <a class="active" href="#usertimeline" data-bs-toggle="tab">Media</a>
                                </li>
                                <li>
                                    <a href="#Features" data-bs-toggle="tab">Features</a>
                                </li>
                                <li>
                                    <a href="#Services" data-bs-toggle="tab">Services</a>
                                </li>

                            </ul>
                            <div class="tab-content">
                                <div class="active tab-pane" id="usertimeline">
                                    <div class="box p-15">
                                        <div class="timeline timeline-single-column timeline-single-full-column">
                                            <span class="timeline-label">
                                                <span class="badge badge-info badge-pill">Image</span>
                                            </span>
                                            <div class="timeline-item">
                                                <div class="timeline-point timeline-point-success">
                                                    <i class="fa fa-image"></i>
                                                </div>
                                                <div class="timeline-event">
                                                    <div class="timeline-heading">
                                                        <h4 class="timeline-title">
                                                            <a href="#">Image</a>
                                                        </h4>
                                                    </div>
                                                    <div class="timeline-body">
                                                        <img
                                                        :src= "about_us.image "
                                                       alt="..."
                                                            />

                                                    </div>
                                                    <div class="timeline-footer">
                                                        <p class="text-end">

                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="timeline-item">
                                                <div class="timeline-point timeline-point-danger">
                                                    <i class="ion ion-ios-videocam"></i>
                                                </div>
                                                <div class="timeline-event">
                                                    <div class="timeline-heading">
                                                        <h4 class="timeline-title">
                                                            <a href="#">Video</a>
                                                        </h4>
                                                    </div>
                                                    <div class="timeline-body">
                                                        <div class="ratio ratio-16x9">
                                                            <iframe
                                                            :src="about_us.video"
                                                                frameborder="0" allowfullscreen></iframe>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <span class="timeline-label">
                                                <button class="btn btn-danger">
                                                    <i class="fa fa-clock-o"></i>
                                                </button>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class=" tab-pane" id="Features">
                                    <div class="box no-shadow">
                                        <div class="box box-inverse" style="background-color: #3b5998">
                                            <div class="box-header no-border">
                                                <div class="box-tools pull-right">
                                                    <h5 class="box-title">Feature</h5>
                                                </div>
                                            </div>
                                            <blockquote class="blockquote blockquote-inverse no-border m-0 py-15"
                                                v-for="(feature, index) in about_us.feature" :key="index">
                                                <p>{{ feature.title }}</p>
                                            </blockquote>
                                        </div>


                                    </div>
                                </div>
                                <div class="tab-pane" id="Services">
                                    <div v-for="(service, index) in about_us.services" :key="index"
                                        class="col-12 col-lg-12 col-xl-12">
                                        <div class="box box-widget widget-user">
                                            <div class="widget-user-header bg-img bbsr-0 bber-0"
                                                :style="`background: url('../assets/dashboard/images/gallery/full/10.jpg') center center;`"
                                                data-overlay="5">
                                                <!-- لا يبدو أن هناك صورة مرتبطة بكل خدمة في البيانات المعطاة، لذا يتم استخدام صورة ثابتة هنا -->
                                            </div>
                                            <div class="box-footer">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="description-block">
                                                            <h5 class="description-header">{{ service.title }}</h5>
                                                            <span class="description-text">{{ service.description }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <!-- /.tab-pane -->
                            </div>
                            <!-- /.tab-content -->
                        </div>
                        <!-- /.nav-tabs-custom -->
                    </div>
                    <!-- /.col -->


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
    name: "Company",

    data() {
        return {
            about_us: {},
        };
    },
    async created() {
        try {
            const response = await axios.get(`/api/abouts/1`);
            console.log(response); // طباعة الريسبونس كاملاً في الكونسول
            this.about_us = response.data;
        } catch (error) {
            console.error("Error fetching about us data:", error);
            // Handle error appropriately
        }
    },
};
</script>







