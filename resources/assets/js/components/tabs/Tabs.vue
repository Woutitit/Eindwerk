<style>

	.Tabs__navigation .Container {
		height: 55px;
		min-height: 55px;
	}

	.Tabs__navigation--theme-default {
		background-color: #FFF;
		border-bottom: 1px solid #DDD;
		margin-bottom: 16px;
	}

	.Tabs__navigation--theme-default button {
		font-weight: 500;
		color: #000;
	}

	.Tab--header {
		background-color: transparent;
		height: 100%;
		padding: 0 12px;
		border: 0;
	}

	.Tab--header:focus {
		outline: 0;
	}

	.Tab--header.active {
		color: #18B4DC;
		position: relative;
	}

	.Tab--header.active::after {
		border-bottom: 3px solid #18B4DC;
		position: absolute;
		content: "";
		bottom: 0;
		left: 1px;
		right: 1px;
	}

	@media screen and (min-width: 768px) {
		.Tab--header {
			margin-right: 20px;
		}
	}

	@media screen and (max-width: 768px) {
		.Tab--header {
			text-align: center;
			width: 49%;
		}
	}
</style>
<template>
	<div>
		<nav class="Tabs__navigation Tabs__navigation--theme-default">
			<div class="Container">
				<button class="Tab--header"  :class="{ active: (activeTab === tab)}" v-for="tab in tabs" v-on:click="activate(tab)">{{ tab }}</button>
			</div>
		</nav>
		<slot></slot>
	</div>
</template>
<script>
	export default {
		data: function() {
			return {
				activeTab: '',
				tabs: []
			}
		},
		props: ['activeLink'],
		methods: {
			activate: function(tab){
// Give tab the active color
this.activeTab = tab;
// Broadcast event to change tab content
this.$emit('activateTab', tab);
}
}
}
</script>
