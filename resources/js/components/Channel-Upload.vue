<template>
    
</template>

<script>
    export default {
        name: "Channel-Upload",
        props: {
            /*channel_id: {
                required: true,
                default:  ()=> ('')
            }*/
        },
        data() {
            return {
                selected: false,
                videos: [],
                progress: {}
            }
        },

        methods: {
            upload() {
                this.selected = true
                this.videos = Array.from(this.$refs.video.files)

                const  uploaders = this.videos.map(video => {

                    const form = new FormData()

                    this.progress[video.name] = 0

                    form.append('video', video)

                    form.append('title', video.name)
                    return axios
                        .post(`${location.pathname}`, form, {
                            onUploadProgress: (event) => {
                                this.progress[video.name] = Math.ceil((event.loaded / event.total) * 100)
                                this.$forceUpdate()
                            }
                        })

                })
            }
        }



    }
</script>

<style scoped>

</style>