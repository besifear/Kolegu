// require('./bootstrap');

window.Vue = require('vue');

window.Event = new Vue({});

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// Vue.component('example', require('./components/Example.vue'));
Vue.component('categories-list', require('./components/CategoriesList.vue'));

Vue.component('category-item', require('./components/CategoryItem.vue'));



const app = new Vue({
    el: '#app',
    data: {
    
    }
});