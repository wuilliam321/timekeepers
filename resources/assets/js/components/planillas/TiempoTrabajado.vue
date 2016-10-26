<style scoped>
    .action-link {
        cursor: pointer;
    }

    .m-b-none {
        margin-bottom: 0;
    }
</style>

<template>
    <div v-if="tiempos.length > 0">
    </div>
</template>

<script>
    export default {
        /*
         * The component's data.
         */
        data() {
            return {
                tiempos: [],
            };
        },

        /**
         * Prepare the component (Vue 1.x).
         */
        ready() {
            this.prepareComponent();
        },

        /**
         * Prepare the component (Vue 2.x).
         */
        mounted() {
            this.prepareComponent();
        },

        methods: {
            /**
             * Prepare the component.
             */
            prepareComponent() {
                // this.getTiempos();
            },

            /**
             * Get all of the tiempos for the user.
             */
            getTiempos() {
                this.$http.get('/api/tiempos').then(response => {
                    this.tiempos = response.data;
                });
            },
        }
    }
</script>
