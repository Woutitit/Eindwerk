<style>
	.List {
		padding-left: 0;
	}

  .List--inline > li {
    display: inline-block;
    padding: 0 16px;
  }

  .List--how-it-works,
  .List--team {
    display: flex;
    flex-wrap: wrap;
    text-align: center;
  }

	.List--team{
		display: flex;
		flex-direction: column;
		align-content: center;
	}

	.List--team li{
		margin: 20px 0 20px 0;
	}



  .List--team .ImageContainer,
  .List--how-it-works .ImageContainer {
    margin: 0 auto;
    width: 180px;
  }

  .List--nav {
    font-weight: 500;
    font-size: 14px;
    height: 60px; /* = height header. TODO: Dit zouden we beter via SASS moeten doen via $header-height ofzo. */
  }

  .List--footer-nav > li {
    padding: 0 8px;
  }

  .List--my-items > li {
    padding: 16px 0;
  }

  .List--user-items {
    margin-top: 16px;
    width: 100%;
  }

  .List--user-items > .List__item {
    margin: 0 4px;
    width: 100%;
  }



  @media (min-width: 420px){
    .List--user-items > .List__item  {
      width: calc(50% - 8px);
    }
  }

  @media (min-width: 768px){
    .List--how-it-works > li,
    .List--team > li {
      padding: 0 32px;
      flex: 0 0 33.33%;
      box-sizing: border-box;
    }

		.List--team{
			flex-direction: row;
			justify-content: space-around;
		}

		.List--team li{
			margin: 0px 0 0px 0;
		}
  }

  @media (min-width: 1200px){
    .List--user-items > .List__item {
      width: calc(33.33% - 8px);
    }
  }

</style>
<template>
  <ul>
    <slot></slot>
  </ul>
</template>
<script>
  export default {
    mounted() {
      console.log('Component ready.')
    }
  }
</script>
