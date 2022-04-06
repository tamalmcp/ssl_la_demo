<template>
    <div class="alert alert-success alert-dismissible fade show spacing" role="alert" v-show="show">
        {{ body }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
</template>

<script>
    export default {
        props: ['message'],
                data() {
            return {
                show : false,
                body : ''
            }
        },
        created() {
            if(this.message) {
                this.flash(this.message)
            }
            window.events.$on('flash',(message) => this.flash(message))
        },
        methods: {
            flash(message) {
                this.show = true
                this.body = message

                setTimeout(() => {
                    this.hide()
            },5000)
        },
        hide() {
            this.show = false
        }
    }
    }
</script>

<style>
    .spacing {
        position: fixed;
        right: 25px;
        bottom: 25px;
        z-index: 1;
    }
</style>

<!--ref: flash message
https://www.w3adda.com/blog/laravel-8-vue-js-flash-message-tutorial
https://www.codecheef.org/article/display-flash-message-in-vue-js-laravel-application
-->