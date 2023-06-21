import AllPosts from './components/AllPost.vue';
import AddPost from './components/AddPost.vue';
import EditPost from './components/EditPost.vue';
import Applications from './components/Applications.vue';
import Home from './components/Home.vue';
import AddApplication from './components/AddApplication.vue';
import Programmes from './components/Programmes.vue'
  
export const routes = [
    {
        name: 'home',
        path: '/',
        component: Home
    },
    {
        name: 'posts',
        path: '/posts',
        component: AllPosts
    },
    {
        name: 'applications',
        path: '/apps',
        component: Applications
    },
    {
        name: 'add',
        path: '/add',
        component: AddPost
    },
    {
        name: 'addApp',
        path: '/addApp',
        component: AddApplication
    },
    {
        name: 'edit',
        path: '/edit/:id',
        component: EditPost
    },
    {
        name: 'programmes',
        path: '/programmes',
        component: Programmes
    },
];