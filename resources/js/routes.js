import Vue from 'vue';
import VueRouter from 'vue-router';
Vue.use(VueRouter);

// Tutti gli import delle routes
import HomeComponent from './pages/HomeComponent'
import ContactsComponent from './pages/ContactsComponent'
import NotFoundComponent from './pages/NotFoundComponent'
import BlogComponent from './pages/BlogComponent'
import SinglePostComponent from './pages/SinglePostComponent'

// Inseriamo le rotte
const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'home',
            component: HomeComponent
        },
        {
            path: '/contacts',
            name: 'contacts',
            component: ContactsComponent
        },
        {
            path: '/blog',
            name: 'blog',
            component: BlogComponent
        },
        {
            path: '/blog/:slug',
            name: 'single-post',
            component: SinglePostComponent
        },
        {
            path: '/*',
            name: 'notFound',
            component: NotFoundComponent
        }

    ]
})
// Esportiamo il router
export default router;
