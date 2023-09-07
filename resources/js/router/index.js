import {createRouter,createWebHistory} from "vue-router";
import About from "../pages/About.vue";
import Home from "../pages/Home.vue";
import Blog from "../pages/Blog.vue";
import SingleBlog from "../pages/SingleBlog.vue";
import Contact from "../pages/Contact.vue";



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
