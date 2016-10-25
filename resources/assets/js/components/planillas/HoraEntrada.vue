<style scoped>
    .action-link {
        cursor: pointer;
    }

    .m-b-none {
        margin-bottom: 0;
    }
</style>

<template>
    <div v-if="horas.length > 0">
        <div class="panel panel-default">
            <div class="panel-body">
                <!-- Current Planillas -->
                <table class="table table-borderless m-b-none">
                    <thead>
                        <tr>
                            <th></th>
                            <th v-for="hora in horas">
                                {{ hora.fecha_entrada }}
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                    <tr>
                        <!-- Action -->
                        <td style="vertical-align: middle;">
                            Hora de entrada
                        </td>

                        <!-- Name -->
                        <td style="vertical-align: middle;" v-for="hora in horas">
                            {{ hora.hora_entrada }}
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        /*
         * The component's data.
         */
        data() {
            return {
            };
        },

        props: ['horas'],

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
                // this.getHoras();
            },

            /**
             * Get all of the horas for the user.
             */
            getHoras() {
                this.$http.get('/api/horas').then(response => {
                    this.horas = response.data;
                });
            },
        }
    }
</script>
