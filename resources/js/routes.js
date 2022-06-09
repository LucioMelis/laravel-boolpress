import Vue from 'vue';
import VueRouter from 'vue-router';
Vue.use(VueRouter);

// Tutti gli import delle routes
import HomeComponent from './pages/HomeComponent'
import ContactsComponent from './pages/ContactsComponent'

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
        }
    ]
})
// Esportiamo il router
export default router;
