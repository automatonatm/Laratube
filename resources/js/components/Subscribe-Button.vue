<template>

</template>

<script>
    import numeral from 'numeral'
    export default {
        name: "Subscribe-Button",
        props: {
            channel: {
                type: Object,
                required: true,
                default: ()=> ({})
            }
        },

        data() {
            return {
                subscriptions : this.channel.subscriptions,
            }
        },

        mounted() {

        },

        computed: {

            signedIn() {
                return window.App.signedIn;
            },

            count() {
                return numeral(this.subscriptions.length).format('0a')
            },

            canSubscribe() {
                     return  this.authorize(user => this.channel.user_id !== user.id)
                },


            subscriptionId() {
                return  this.subscriptions.find(subscription => subscription.user_id === window.App.user.id)

            },

            subscribed() {
                if(! this.signedIn ) return false
                return  !!this.subscriptionId
            }
        },

        // location.pathname+'/subscriptions/'+this.subscriptionId+'/' : location.pathname+'/subscriptions'

        methods: {
            toggleSubscription() {

               if(!this.subscribed) {
                   //post
                   axios
                       .post(`/channels/${this.channel.id}/subscriptions`)
                       //channels/{channel}/subscriptions
                       .then(({data}) => {

                           this.subscriptions = [
                               ...this.subscriptions,
                               data
                           ]
                       })
                       .catch((error) => {
                           console.log(error)
                       })

               }else{
                   //delete
                   axios
                       .delete(`${location.pathname}/subscriptions/${this.subscriptionId.id}`)
                       // channels/{channel}/subscriptions/{subscription}
                       .then(({data}) => {

                            this.subscriptions = this.subscriptions.filter(
                                s => s.id !== this.subscriptionId.id
                            )
                       })
                       .catch((error) => {
                           console.log(error)
                       })
               }
            }

        }
    }
</script>

<style scoped>

</style>