
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));

/**
 * Search Components...
 */
// Scholarship Search Components
Vue.component('scholarship-search-form', require('./components/search/scholarship/SearchForm.vue'));
Vue.component('scholarship-search-results', require('./components/search/scholarship/SearchResults.vue'));
Vue.component('scholarship-search-result-item', require('./components/search/scholarship/SearchResultItem.vue'));

import store from './store';

const app = new Vue({
    el: '#app',
    store
});
