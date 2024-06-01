<template>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="container-full">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="d-flex align-items-center">
                    <div class="me-auto">
                        <h4 class="page-title">Services</h4>
                        <div class="d-inline-block align-items-center">
                            <nav>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <router-link to="/"
                                            ><i class="mdi mdi-home-outline"></i
                                        ></router-link>
                                    </li>
                                    <li
                                        class="breadcrumb-item active"
                                        aria-current="page"
                                    >
                                        Services
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main content -->
            <section class="content" v-if="services && services.data.length">
                <div class="row">
                    <div
                        class="col-12 col-lg-4"
                        v-for="(service, index) in services.data"
                        :key="index"
                    >
                        <div class="box">
                            <div class="box-header no-border p-0">
                                <router-link :to="`/services/${service.id}`">
                                    <img
                                        class="img-fluid"
                                        :src="service.avatar"
                                        alt=""
                                    />
                                </router-link>
                            </div>
                            <div class="box-body">
                                <div class="text-center">
                                    <h3 class="my-10">
                                        <router-link
                                            :to="`/services/${service.id}`"
                                            >{{ service.name }}</router-link
                                        >
                                    </h3>
                                    <h6 class="user-info mt-0 mb-10 text-fade">
                                        {{ service.description }}
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <RPagination
                    :links="services.links"
                    @update-page="fetchServices"
                    v-if="services.links && services.links.length"
                />
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
    name: "ServicesIndex",
    components: { RPagination },
    data() {
        return { services: {} };
    },
    async created() {
        await this.fetchServices(url("services?page=1"));
    },
    methods: {
        async fetchServices(url) {
            await fetch(url, (services) => (this.services = services));
        },
    },
};
</script>
