
/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */

 require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// Avatar
Vue.component('v-avatar', require('./components/avatar/Avatar.vue'));

// Button
Vue.component('v-button', require('./components/button/Button.vue'));

// Form, Input
Vue.component('v-form', require('./components/form/Form.vue'));
Vue.component('v-input', require('./components/form/Input.vue'));

// Header
Vue.component('v-header', require('./components/header/Header.vue'));

// Link
Vue.component('v-link', require('./components/link/Link.vue'));

// List, List item
Vue.component('v-ul', require('./components/list/UnorderedList.vue'));
Vue.component('v-li', require('./components/list/ListItem.vue'));

// Logo
Vue.component('v-logo', require('./components/logo/Logo.vue'));

// Nav
Vue.component('v-nav', require('./components/nav/Nav.vue'));
Vue.component('v-item', require('./components/nav/NavItem.vue'));

// Popover
Vue.component('v-popover', require('./components/popover/Popover.vue'));

// Search Box
Vue.component('v-search-box', require('./components/search-box/SearchBox.vue'));

// Tabs
Vue.component('v-tabs', require('./components/tabs/Tabs.vue'));
Vue.component('v-tab', require('./components/tabs/Tab.vue'));

Vue.component('profile-nav', require('./components/ProfileNav.vue'));
Vue.component('transactions-nav', require('./components/TransactionsNav.vue'));
Vue.component('requests-nav', require('./components/RequestsNav.vue'));
Vue.component('useractions-popover', require('./components/UserActionsPopover.vue'));

const app = new Vue({
	el: '#app',
	data: {
		showUserActions: false,
	},
	methods: {
		toggleUserActions: function(){
			if(this.showUserActions){
				this.showUserActions = false;	
			} else {
				this.showUserActions = true;
			}
		}
	}
});
