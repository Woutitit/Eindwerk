<style>
    .MainHeaderSearch input {
        height: 42px;
        border-bottom: 1px solid #DDD;
        border-radius: 0;
    }

    .MainHeaderSearch__button {
        background-color: transparent;
        border: 0;
        position: absolute;
        top: 0;
        right: 0;
        line-height: 0;
        width: 42px;
        height: 42px;
    }

    .Search__field {
        border-radius: 2px;
        box-sizing: border-box;
        font-size: 14px;
        padding: 0 8px;

    }

    .Search__button {
        line-height: 0;
    }

    .Search__suggestions {
        background-color: #FFF;
        position: absolute;
        top: 42px;
        width: 90%;
    }

    .Search__button--blue {
        background-color: #22A8CA;
        color: #FFF;
    }

    .Search__field,
    .Search__button {
        height: 42px;
    }

    .Search--main {
        margin: 0 auto;
        padding-bottom: 4em;
        max-width: 480px;
    }

    .Search--main form {
        border: 1px solid #22A8CA;
        display: inline-block;
        width: 100%;
    }

    .Search--main .Search__field,
    .Search--main .Search__button {
        border: 0;
        border-radius: 0;
        float: left;
    }

    .Search--main .Search__field {
        width: 90%;
    }

    .Search--main .Search__button {
        background-color: #FFF;
        width: 10%;
    }

    .Search--header {
        width: 320px;
    }

    .Search__field--header,
    .Search__field--sub-nav {
        padding-right: 36px;
    }


    .Search__field--header,
    .Search__button--header {
        border: 0;
        height: 32px;
    }

    .Search__field--sub-nav {
        border: 1px solid #C0C0C0;
        padding: 0 36px 0 8px;
    }

    .Search__button--sub-nav {
        background-color: transparent;
        border: 0;
        width: 36px;
    }

    .Search__field--sub-nav,
    .Search__button--sub-nav {
        height: 36px;
    }

    @media (min-width: 768px){
        .Search--main {
            padding-bottom: 8em;
        }

    }

</style>
<template>
    <div>     
        <slot></slot>
    </div>
</template>

<script>
    export default {
        mounted() {

        }
    }
</script>
