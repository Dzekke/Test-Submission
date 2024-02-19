const Home = ()=> import('./components/Home.vue');
const Contact = ()=> import('./components/Contact.vue');
const Login = ()=> import('./components/Login.vue');
const NewAccount = ()=> import('./components/NewAccount.vue');


//components for the users CRUD

const Show = ()=> import('./components/users/Show.vue');
const New = ()=> import('./components/users/New.vue');
const Edit = ()=> import('./components/users/Edit.vue');

export const routes = [
    {
        name:'home',
        path:'/home',
        component:Home
    },
    {
        name:'login',
        path: '/',
        component:Login
    },
    {
        name:'contact',
        path: '/contact',
        component:Contact
    },
    {
        name:'register',
        path: '/register',
        component:NewAccount
    },
    {
        name:'showUsers',
        path: '/users',
        component:Show
    },
    {
        name:'newUser',
        path: '/new',
        component:New
    },
    {
        name:'editUser',
        path: '/edit/:id',
        component:Edit
    }

];