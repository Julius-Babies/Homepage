import {createRouter, createWebHistory} from 'vue-router'
import HomeView from '../views/HomeView.vue'
import E404 from '../views/E404.vue'
import InternView from "@/views/InternView.vue";

const routes = [
    {
        path: '/',
        name: 'home',
        component: HomeView,
        meta: {
            title: 'home @ Julius Babies'
        }
    },
    {
        path: '/intern',
        name: 'intern',
        component: InternView,
        meta: {
            title: 'intern @ Julius Babies'
        }
    },
    {
        path: '/error/404',
        name: '404',
        component: E404,
        meta: {
            title: '404 @ Julius Babies',
            redirect: false
        }
    },
    {
        path: '/:pathMatch(.*)*',
        name: '404',
        component: E404,
        meta: {
            title: '404 @ Julius Babies'
        }
    }
]

const router = createRouter({
    history: createWebHistory(process.env.BASE_URL),
    routes
})
router.beforeEach((to, from, next) => {
    // Get the page title from the route metadata that we have defined
    // See further down below for how we set up this data
    const title = to.meta.title

    //Take the title from the parameters
    const titleFromParams = to.params.pageTitle;
    // If the route has a title, set it as the page title of the document/page
    if (title) {
        document.title = title
    }
    // If we have a title from the params, extend the title with the title
    // from our params
    if (titleFromParams) {
        document.title = `${titleFromParams} - ${document.title}`;
    }
    // Continue resolving the route
    next()
})


export default router
