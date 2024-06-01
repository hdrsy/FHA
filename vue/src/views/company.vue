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
                    <div class="col-12 col-lg-7 col-xl-8">
                        <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs">
                                <li>
                                    <a href="#usertimeline" data-bs-toggle="tab">Media</a>
                                </li>
                                <li>
                                    <a class="active" href="#activity" data-bs-toggle="tab">Features - Services</a>
                                </li>

                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane" id="usertimeline">
                                    <div class="box p-15">
                                        <div class="timeline timeline-single-column timeline-single-full-column">
                                            <span class="timeline-label">
                                                <span class="badge badge-info badge-pill">Images</span>
                                            </span>
                                            <div class="timeline-item">
                                                <div class="timeline-point timeline-point-success">
                                                    <i class="fa fa-image"></i>
                                                </div>
                                                <div class="timeline-event">
                                                    <div class="timeline-heading">
                                                        <h4 class="timeline-title">
                                                            <a href="#">Images</a>
                                                        </h4>
                                                    </div>
                                                    <div class="timeline-body">
                                                        <img src="../assets/dashboard/images/150x100.png" alt="..."
                                                            class="m-10" />
                                                        <img src="../assets/dashboard/images/150x100.png" alt="..."
                                                            class="m-10" />
                                                        <img src="../assets/dashboard/images/150x100.png" alt="..."
                                                            class="m-10" />
                                                        <img src="../assets/dashboard/images/150x100.png" alt="..."
                                                            class="m-10" />
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
                                                                src="https://assets.website-files.com/63bab3c727acad36f05e17b8/63bab3c727acad088c5e1914_pexels-ron-lach-8141575-transcode.mp4"
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
                                <div class="active tab-pane" id="activity">
                                    <div class="box no-shadow">
                                        <div class="box box-inverse" style="background-color: #3b5998">
                                            <div class="box-header no-border">
                                                <div class="box-tools pull-right">
                                                    <h5 class="box-title">Feature</h5>
                                                </div>
                                            </div>
                                            <blockquote class="blockquote blockquote-inverse no-border m-0 py-15">
                                                <p>
                                                    Holisticly benchmark plug imperatives for multifunctional
                                                    deliverables. Seamlessly incubate cross functional action.
                                                </p>
                                            </blockquote>
                                        </div>
                                        <div class="box box-inverse" style="background-color: #ff0000">
                                            <div class="box-header no-border">
                                                <div class="box-tools pull-right">
                                                    <h5 class="box-title">Services</h5>
                                                </div>
                                            </div>
                                            <blockquote class="blockquote blockquote-inverse no-border m-0 py-15">
                                                <p>
                                                    Holisticly benchmark plug imperatives for multifunctional
                                                    deliverables. Seamlessly incubate cross functional action.
                                                </p>
                                            </blockquote>
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

                    <div class="col-12 col-lg-5 col-xl-4">
                        <div class="box box-widget widget-user">
                            <!-- Add the bg color to the header using any of the bg-* classes -->
                            <div class="widget-user-header bg-img bbsr-0 bber-0" style="
                      background: url('../assets/dashboard/images/gallery/full/10.jpg') center
                        center;
                    " data-overlay="5">
                                <h3 class="widget-user-username text-white">
                                    Name
                                </h3>
                                <h6 class="widget-user-desc text-white">Type</h6>
                            </div>
                            <div class="widget-user-image">
                                <img class="rounded-circle" src="../assets/dashboard/images/user3-128x128.jpg"
                                    alt="User Avatar" />
                            </div>
                            <div class="box-footer">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="description-block">
                                            <h5 class="description-header">Title</h5>
                                            <span class="description-text">Title</span>
                                        </div>
                                        <!-- /.description-block -->
                                    </div>

                                </div>
                                <!-- /.row -->
                            </div>
                        </div>
                        <div class="box">
                            <div class="box-body box-profile">
                                <div class="row">
                                    <div class="col-12">
                                        <p class="mb-10">Salon</p>
                                        <div>
                                            <p>
                                                Email :<span class="text-gray ps-10">David@yahoo.com</span>
                                            </p>
                                            <p>
                                                Phone :<span class="text-gray ps-10">+11 123 456 7890</span>
                                            </p>
                                            <p>
                                                Time :<span class="text-gray ps-10">123, Lorem Ipsum, Florida, USA</span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <p class="mb-10">Office</p>
                                        <div>
                                            <p>
                                                Email :<span class="text-gray ps-10">David@yahoo.com</span>
                                            </p>
                                            <p>
                                                Phone :<span class="text-gray ps-10">+11 123 456 7890</span>
                                            </p>
                                            <p>
                                                Time :<span class="text-gray ps-10">123, Lorem Ipsum, Florida, USA</span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <p class="mb-10">Support</p>
                                        <div>
                                            <p>
                                                Email :<span class="text-gray ps-10">David@yahoo.com</span>
                                            </p>
                                            <p>
                                                Phone :<span class="text-gray ps-10">+11 123 456 7890</span>
                                            </p>
                                            <p>
                                                Time :<span class="text-gray ps-10">123, Lorem Ipsum, Florida, USA</span>
                                            </p>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div>
                                            <div class="map-box">
                                                <iframe
                                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2805244.1745767146!2d-86.32675167439648!3d29.383165774894163!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x88c1766591562abf%3A0xf72e13d35bc74ed0!2sFlorida%2C+USA!5e0!3m2!1sen!2sin!4v1501665415329"
                                                    width="100%" height="100" frameborder="0" style="border: 0"
                                                    allowfullscreen></iframe>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.box-body -->
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
export default { name: 'Company', }
</script>
