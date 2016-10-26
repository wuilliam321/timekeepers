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
                        <template v-for="planilla in planillas">
                            <tr @click="togglePlanillaView">
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
                            <tr class="horas-container hidden">
                                <td colspan="6">
                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            <horas v-bind:colaborador_id="planilla.colaborador_id"></horas>
                                            <tiempos v-bind:colaborador_id="planilla.colaborador_id"></tiempos>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </template>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
    import Horas from './HoraEntrada.vue'
    import TiempoTrabajado from './TiempoTrabajado.vue'

    export default {
        /*
         * The component's data.
         */
        data() {
            return {
                planillas: [],
                horas: [],
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
                });
            },

            togglePlanillaView(event) {
                var $element = $(event.currentTarget);
                $element.next().toggleClass('hidden');
            }
        },

        components: {
            horas: Horas,
            tiempos: TiempoTrabajado
        },
    }
</script>
