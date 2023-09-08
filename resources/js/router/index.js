import {createRouter,createWebHistory} from "vue-router";
import About from "../pages/About.vue";
import Home from "../pages/Home.vue";
import Blog from "../pages/Blog.vue";
import Login from "../pages/Login.vue";
import Register from "../pages/Register.vue";
import SingleBlog from "../pages/SingleBlog.vue";
import Contact from "../pages/Contact.vue";
import Dashboard from "../pages/Dashboard.vue";



const routes =[
    {
        path: "/",
        name: "Home",
        component: Home
    },
    {
        path: "/about",
        name: "About",
        component: About
    },
    {
        path: "/dashboard",
        name: "Dashboard",
        component: Dashboard
    },
    {
        path: "/register",
        name: "Register",
        component: Register
    },
    {
        path: "/login",
        name: "Login",
        component: Login
    },
    {
        path: "/blog",
        name: "Blog",
        component: Blog
    },
    {
        path: "/contact",
        name: "contact",
        component: Contact
    },
    {
        path: "/blog/:slug",
        name: "singleBlog",
        component: SingleBlog,
        props:true
    }

];
const router = createRouter({
    history: createWebHistory(),
    routes,
});
export default router;
