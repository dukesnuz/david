/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/*****add axios ******/
import axios from 'axios'
import VueAxios from 'vue-axios'

Vue.use(VueAxios, axios)

/******add for social media sharing*****/
var SocialSharing = require('vue-social-sharing');
Vue.use(SocialSharing);

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

//Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('search', require('./components/Search.vue').default);
Vue.component('searches', require('./components/Searches.vue').default);
Vue.component('blog-home', require('./components/blog/Home.vue').default);
Vue.component('create-blog-post', require('./components/blog/CreateBlogPost.vue').default);
Vue.component('show-blog-posts', require('./components/blog/ShowBlogPosts.vue').default);
Vue.component('show-all-blog-posts', require('./components/blog/ShowAllBlogPosts.vue').default);
Vue.component('show-a-blog-post', require('./components/blog/ShowAblogPost.vue').default);
Vue.component('edit-blog-post', require('./components/blog/EditBlogPost.vue').default);
Vue.component('search-blog', require('./components/blog/Search.vue').default);
Vue.component('searches-blog', require('./components/blog/Searches.vue').default);
Vue.component('uses', require('./components/utility/Uses.vue').default);
Vue.component('index', require('./components/album/Index.vue').default);
Vue.component('photo-create', require('./components/album/PhotoCreate.vue').default);
Vue.component('photo-comment', require('./components/album/PhotoComment.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});