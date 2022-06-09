import Vue from 'vue';
import VueRouter from 'vue-router';
Vue.use(VueRouter);

// Tutti gli import delle routes
import HomeComponent from './pages/HomeComponent'

// Inseriamo le rotte
const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'home',
            component: HomeComponent
        }
    ]
})
// Esportiamo il router
export default router;
