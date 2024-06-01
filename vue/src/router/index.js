import { createRouter, createWebHistory } from 'vue-router';
import { isLoggedIn } from '../auth.js';
// Layout component
import AppMaster from "../components/layouts/AppMaster.vue";

// Pages
import login from '../views/login.vue';
import Statistics from '../views/statistics.vue';
import Products from '../views/Products/index.vue';
import NewProduct from '../views/Products/create.vue';
import ProductDetails from '../views/Products/show.vue';
import EditProduct from '../views/Products/edit.vue';
import EditBlog from '../views/Blogs/edit.vue';
import Company from '../views/company.vue';
import Categories from '../views/Categories/index.vue';
import NewCategory from '../views/Categories/create.vue';
import EditCategory from '../views/Categories/edit.vue';
import DetailsCategory from '../views/Categories/show.vue';
import NewService from '../views/Services/create.vue';
import Services from '../views/Services/index.vue';
import Service from '../views/Services/show.vue';
import NewReview from '../views/Reviews/create.vue';
import Reviews from '../views/Reviews/index.vue';
import Review from '../views/Reviews/show.vue';
import NewBlog from '../views/Blogs/create.vue';
import Blogs from '../views/Blogs/index.vue';
import Blog from '../views/Blogs/show.vue';
import UpdateContact from '../views/Contact/update.vue';
import UpdateProfile from '../views/Profile/update.vue';
import ContactProfile from '../views/Contact/profile.vue';
import CompanyProfile from '../views/Profile/company_profile.vue';

const routes = [
  {
    path: '/login',
    name: 'login',
    component: login,
  },
  {
    path: '/',
    component: AppMaster,
    children: [
      {
        path: '',
        name: 'statistics',
        component: Statistics,
        meta: { requiresAuth: true },
      },
      {
        path: '/products',
        name: 'Products',
        component: Products,
        meta: { requiresAuth: true },
      },
      {
        path: '/products/create',
        name: 'NewProduct',
        component: NewProduct,
        meta: { requiresAuth: true },
      },
      {
        path: '/products/:id',
        name: 'ProductDetails',
        component: ProductDetails,
        meta: { requiresAuth: true },
      },
      {
        path: '/products/:id/edit',
        name: 'EditProduct',
        component: EditProduct,
        meta: { requiresAuth: true },
      },
      {
        path: '/company',
        name: 'company',
        component: Company,
        meta: { requiresAuth: true },
      },
      {
        path: '/categories',
        name: 'Categories',
        component: Categories,
        meta: { requiresAuth: true },
      },
      {
        path: '/categories/:id',
        name: 'CategoryDetails',
        component: DetailsCategory,
        meta: { requiresAuth: true },
      },
      {
        path: '/categories/:id/edit',
        name: 'CategoryEdit',
        component: EditCategory,
        meta: { requiresAuth: true },
      },
      {
        path: '/newcategory',
        name: 'NewCategory',
        component: NewCategory,
        meta: { requiresAuth: true },
      },
      {
        path: '/services',
        name: 'Services',
        component: Services,
        meta: { requiresAuth: true },
      },
      {
        path: '/services/:id',
        name: 'Service',
        component: Service,
        meta: { requiresAuth: true },
      },
      {
        path: '/newservice',
        name: 'NewService',
        component: NewService,
        meta: { requiresAuth: true },
      },
      {
        path: '/review',
        name: 'Review',
        component: Review,
        meta: { requiresAuth: true },
      },
      {
        path: '/reviews',
        name: 'Reviews',
        component: Reviews,
        meta: { requiresAuth: true },
      },
      {
        path: '/newreview',
        name: 'NewReview',
        component: NewReview,
        meta: { requiresAuth: true },
      },
      {
        path: '/blogs',
        name: 'Blogs',
        component: Blogs,
        meta: { requiresAuth: true },
      },
      {
        path: '/blogs/:id',
        name: 'Blog',
        component: Blog,
        meta: { requiresAuth: true },
      },
      {
        path: '/blogs/:id/edit',
        name: 'EditBlog',
        component: EditBlog,
        meta: { requiresAuth: true },
      },
      {
        path: '/newblog',
        name: 'NewBlog',
        component: NewBlog,
        meta: { requiresAuth: true },
      },
      {
        path: '/updateprofile',
        name: 'UpdateProfile',
        component: UpdateProfile,
        meta: { requiresAuth: true },
      },
      {
        path: '/updatecontact',
        name: 'UpdateContact',
        component: UpdateContact,
        meta: { requiresAuth: true },
      },
      {
        path: '/contact_profile',
        name: 'ContactProfile',
        component: ContactProfile,
        meta: { requiresAuth: true },
      },
      {
        path: '/company_profile',
        name: 'company_profile',
        component: CompanyProfile,
        meta: { requiresAuth: true },
      },
    ],
  },
];

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes,
});
// Add a global navigation guard
router.beforeEach((to, from, next) => {
    if (to.matched.some(record => record.meta.requiresAuth)) {
      // If route requires authentication and the user isn't logged in
      if (!isLoggedIn()) {
        next({ name: 'login' }); // Redirect to the login page
      } else {
        next(); // Allow access
      }
    } else {
      next(); // Allow access to routes that don't require authentication
    }
  });
export default router;
