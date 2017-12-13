// require('./bootstrap');

window.Vue = require('vue');

window.Event = new Vue({});

window.autcomplete = require('autocomplete.js');

var algoliasearch = require('algoliasearch'); 

window.search = algoliasearch("969BNCLV39", "875bae542d6515d93af2367a758cfefd");

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// Vue.component('example', require('./components/Example.vue'));
Vue.component('search', require('./components/Search.vue'));

Vue.component('categories-list', require('./components/CategoriesList.vue'));

Vue.component('category-item', require('./components/CategoryItem.vue'));

const app = new Vue({
    el: '#app',
    data: {
    
    }
});