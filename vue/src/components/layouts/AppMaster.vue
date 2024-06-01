<template>
    <div class="wrapper" ref="container">
        <!-- <div id="loader"></div> -->
        <header class="main-header"  v-if="showHeaderAndSidebar">
            <div class="d-flex align-items-center logo-box justify-content-start">
                <!-- Logo -->
                <a href="#" class="logo">
                    <!-- logo-->
                    <div class="logo-mini w-100">
                        <span class="light-logo"><img src="/src/assets/dashboard/images/logo.webp" alt="logo" /></span>
                        <span class="dark-logo"><img src="/src/assets/dashboard/images/logo.webp" alt="logo" /></span>
                    </div>

                </a>
            </div>
            <nav class="navbar navbar-static-top">
                <div class="app-menu">
                    <ul class="header-megamenu nav">
                        <li class="btn-group nav-item">
                            <a href="#" class="waves-effect waves-light nav-link push-btn btn-primary-light"
                                data-toggle="push-menu" role="button">
                                <i data-feather="align-left"></i>
                            </a>
                        </li>
                        <li class="btn-group d-lg-inline-flex d-none">
                            <div class="app-menu">
                                <div class="search-bx mx-5">
                                    <form>
                                        <div class="input-group">
                                            <input type="search" class="form-control" placeholder="Search"
                                                aria-label="Search" aria-describedby="button-addon2" />
                                            <div class="input-group-append">
                                                <button class="btn" type="submit" id="button-addon3">
                                                    <i data-feather="search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>

                <div class="navbar-custom-menu r-side">
                    <ul class="nav navbar-nav">
                        <li class="btn-group nav-item d-lg-inline-flex d-none">
                            <a href="#" data-provide="fullscreen"
                                class="waves-effect waves-light nav-link full-screen btn-warning-light"
                                title="Full Screen">
                                <i data-feather="maximize"></i>
                            </a>
                        </li>




                        <!-- User Account-->
                        <li class="dropdown user user-menu">
                            <a href="#"
                                class="waves-effect waves-light dropdown-toggle w-auto l-h-12 bg-transparent py-0 no-shadow"
                                title="User" @click.prevent="toggleDropdown">
                                <div class="d-flex pt-5">
                                    <div class="text-end me-10">
                                        <p class="pt-5 fs-14 mb-0 fw-700 text-primary">FHA Pharma</p>
                                        <small class="fs-10 mb-0 text-uppercase text-mute">Admin</small>
                                    </div>
                                    <img src="/src/assets/dashboard/images/avatar/avatar-1.png"
                                        class="avatar rounded-10 bg-primary-light h-40 w-40" alt="" />
                                </div>
                            </a>
                            <!-- Dropdown menu -->
                            <ul v-if="dropdownVisible" class="dropdown-menu" :class="{ visible: dropdownVisible }"
                                style="
                  position: absolute;
                  right: 0;
                  top: 100%;
                  background: white;
                  list-style: none;
                  padding: 10px;
                  margin: 0;
                  z-index: 1000;
                ">
                                <li @click="logout" style="cursor: pointer;">Logout</li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <aside class="main-sidebar" v-if="showHeaderAndSidebar" style="margin-top: 20px;">
            <section class="sidebar position-relative">

                <div class="multinav">
                    <div class="multinav-scroll" style="height: 100%">
                        <!-- sidebar menu-->
                        <ul class="sidebar-menu" data-widget="tree">
                            <li>
                                <router-link to="/">
                                    <i data-feather="calendar"></i>
                                    <span>Statistics</span>
                                </router-link>
                            </li>
                            <!-- <li>
                                <router-link to="/company">
                                    <i data-feather="calendar"></i>
                                    <span>Company</span>
                                </router-link>
                            </li> -->
                            <li class="treeview">
                                <a href="#">
                                    <i data-feather="monitor"></i>
                                    <span>Company</span>
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-right pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li>
                                        <router-link to="/updateprofile"><i class="icon-Commit"><span
                                                    class="path1"></span><span class="path2"></span></i>Update
                                            Company</router-link>
                                    </li>
                                    <!-- <li>
                                        <router-link to="/company_profile"><i class="icon-Commit"><span
                                                    class="path1"></span><span class="path2"></span></i>Profile
                                            Company</router-link>
                                    </li> -->
                                </ul>




                            </li>
                            <li class="treeview">
                                <a href="#">
                                    <i data-feather="monitor"></i>
                                    <span>Contact</span>
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-right pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li>
                                        <router-link to="/updatecontact"><i class="icon-Commit"><span
                                                    class="path1"></span><span class="path2"></span></i>Update
                                            Contact</router-link>
                                    </li>
                                    <!-- <li>
                                        <router-link to="/contact_profile"><i class="icon-Commit"><span
                                                    class="path1"></span><span class="path2"></span></i>Profile
                                            Contact</router-link>
                                    </li> -->
                                </ul>
                            </li>

                            <li class="treeview">
                                <a href="#">
                                    <i data-feather="monitor"></i>
                                    <span>Products</span>
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-right pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li>
                                        <router-link to="/products"><i class="icon-Commit"><span
                                                    class="path1"></span><span class="path2"></span></i>List
                                            Products</router-link>
                                    </li>

                                    <li>
                                        <router-link to="/products/create"><i class="icon-Commit"><span
                                                    class="path1"></span><span class="path2"></span></i>Add
                                            Product</router-link>
                                    </li>
                                </ul>
                            </li>
                            <li class="treeview">
                                <a href="#">
                                    <i data-feather="monitor"></i>
                                    <span>Categories</span>
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-right pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li>
                                        <router-link to="/categories"><i class="icon-Commit"><span
                                                    class="path1"></span><span class="path2"></span></i>List
                                            Category</router-link>
                                    </li>
                                    <li>
                                        <router-link to="/newcategory"><i class="icon-Commit"><span
                                                    class="path1"></span><span class="path2"></span></i>Add
                                            Category</router-link>
                                    </li>
                                </ul>
                            </li>
                            <!-- <li class="treeview">
                                <a href="#">
                                    <i data-feather="monitor"></i>
                                    <span>Services</span>
                                    <span class="pull-right-container">
                                        <i
                                            class="fa fa-angle-right pull-right"
                                        ></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li>
                                        <router-link to="/services"
                                            ><i class="icon-Commit"
                                                ><span class="path1"></span
                                                ><span class="path2"></span></i
                                            >List Services</router-link
                                        >
                                    </li>
                                    <li>
                                        <router-link to="/newervice"
                                            ><i class="icon-Commit"
                                                ><span class="path1"></span
                                                ><span class="path2"></span></i
                                            >Add Service</router-link
                                        >
                                    </li>
                                </ul>
                            </li>
                            <li class="treeview">
                                <a href="#">
                                    <i data-feather="monitor"></i>
                                    <span>Reviews</span>
                                    <span class="pull-right-container">
                                        <i
                                            class="fa fa-angle-right pull-right"
                                        ></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li>
                                        <router-link to="/reviews"
                                            ><i class="icon-Commit"
                                                ><span class="path1"></span
                                                ><span class="path2"></span></i
                                            >List Reviews</router-link
                                        >
                                    </li>
                                    <li>
                                        <router-link to="/newreview"
                                            ><i class="icon-Commit"
                                                ><span class="path1"></span
                                                ><span class="path2"></span></i
                                            >Add Review</router-link
                                        >
                                    </li>
                                </ul>
                            </li> -->
                            <li class="treeview">
                                <a href="#">
                                    <i data-feather="monitor"></i>
                                    <span>Blogs</span>
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-right pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li>
                                        <router-link to="/blogs"><i class="icon-Commit"><span class="path1"></span><span
                                                    class="path2"></span></i>List Blogs</router-link>
                                    </li>
                                    <li>
                                        <router-link to="/newblog"><i class="icon-Commit"><span
                                                    class="path1"></span><span class="path2"></span></i>Add
                                            Blog</router-link>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <div class="sidebar-widgets">
                            <div class="copyright text-center m-25">
                                <p>
                                    <strong class="d-block">Powered By HDR Group</strong>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </aside>
        <router-view />
        <RLoading />
    </div>
</template>
<script>
import PerfectScrollbar from "perfect-scrollbar";
import RLoading from "@/components/loading.vue";
import feather from 'feather-icons';

export default {
    name: "AppMaster",
    components: { RLoading },
    data() {
        return {
            dropdownVisible: false,
        };
    },
    computed: {
    // Computed property to determine if the sidebar and navbar should be displayed
    showHeaderAndSidebar() {
      return this.$route.path !== '/login';
    }
  },
    methods: {
        toggleDropdown() {
            this.dropdownVisible = !this.dropdownVisible;
            console.log(this.dropdownVisible);
        },
        logout() {
            // Example logout logic: Replace with your actual logout mechanism
            localStorage.removeItem('user-token'); // Clear user session token
            this.$router.push('/login'); // Redirect to login page
        },
    },
    mounted() {
        const container = this.$refs.container;
        const ps = new PerfectScrollbar(container);
        feather.replace();
    },
};
import "@/assets/dashboard/css/vendors_css.css";
import "@/assets/dashboard/css/style.css";
import "@/assets/dashboard/css/skin_color.css";
import "@/assets/dashboard/js/vendors.min.js";
import "@/assets/dashboard/js/pages/chat-popup.js";
import "@/assets/dashboard/icons/feather-icons/feather.min.js";
import "@/assets/dashboard/vendor_components/apexcharts-bundle/dist/apexcharts.js";
import "@/assets/dashboard/vendor_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js";
import "@/assets/dashboard/vendor_components/date-paginator/moment.min.js";
import "@/assets/dashboard/vendor_components/date-paginator/bootstrap-datepaginator.min.js";
import "@/assets/dashboard/js/template.js";
import "@/assets/dashboard/js/pages/dashboard.js";
</script>
<style scoped>
.dropdown-menu.visible {
  display: block;
}

.dropdown-menu {
  display: none;
}
</style>
