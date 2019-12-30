<template>
    
</template>

<script>
    export default {
        name: "Subscribe-Button",
        props: {
            subscriptions: {
                type: Array,
                required: true,
                default: ()=> []
            }
        },

        mounted() {

        },

        methods: {
            toggleSubscription() {
                if (! __auth()) {
                    window.location = '/login'
                } else {

                }

            }
        }
    }
</script>

<style scoped>

</style>