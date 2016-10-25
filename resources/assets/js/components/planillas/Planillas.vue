<style scoped>
    .action-link {
        cursor: pointer;
    }

    .m-b-none {
        margin-bottom: 0;
    }
</style>

<template>
    <div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <span>
                        Planillas
                    </span>
                </div>
            </div>

            <div class="panel-body">
                <!-- Current Planillas -->
                <p class="m-b-none" v-if="planillas.length === 0">
                    You have not created any planillas.
                </p>

                <table class="table table-borderless m-b-none" v-if="planillas.length > 0">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Colaborador</th>
                            <th>Cedula</th>
                            <th>Proyecto</th>
                            <th>Planilla</th>
                            <th>Tipo Salario</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr v-for="planilla in planillas">
                            <!-- Action -->
                            <td style="vertical-align: middle;">
                                +
                            </td>

                            <!-- Name -->
                            <td style="vertical-align: middle;">
                                {{ planilla.nombre_colaborador }}
                            </td>

                            <!-- Cedula -->
                            <td style="vertical-align: middle;">
                                {{ planilla.cedula }}
                            </td>

                            <!-- Proyecto -->
                            <td style="vertical-align: middle;">
                                {{ planilla.nombre_proyecto }}
                            </td>

                            <!-- Codigo -->
                            <td style="vertical-align: middle;">
                                {{ planilla.codigo }}
                            </td>

                            <!-- Tipo Salario -->
                            <td style="vertical-align: middle;">
                                {{ planilla.tipo_salario}}
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
                planillas: [],
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
                this.getPlanillas();
            },

            /**
             * Get all of the planillas for the user.
             */
            getPlanillas() {
                this.$http.get('/api/planillas').then(response => {
                    this.planillas = response.data;
                    console.log(this.planillas);
                });
            },
        }
    }
</script>
