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
                            <tr @click="togglePlanillaView" v-bind:data-colaborador-id="planilla.colaborador_id" v-bind:data-planilla-id="planilla.id">
                                <!-- Action -->
                                <td class="display-button" style="vertical-align: middle;">
                                    <i class="fa fa-angle-right" aria-hidden="true"></i>
                                    <i class="fa fa-angle-down hidden" aria-hidden="true"></i>
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
                                            <horas-entrada v-bind:colaborador_id="planilla.colaborador_id" v-bind:horas_entrada="horas_entrada[planilla.colaborador_id]"></horas-entrada>
                                            <horas-laboradas v-bind:planilla_id="planilla.id" v-bind:cuentas_beneficios="cuentas_beneficios" v-bind:beneficios="beneficios" v-bind:cuentas_costo="cuentas_costo" v-bind:horas_laboradas="horas_laboradas[planilla.id]"></horas-laboradas>
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
    import HorasEntrada from './HorasEntrada.vue'
    import HorasLaboradas from './HorasLaboradas.vue'

    export default {
        /*
         * The component's data.
         */
        data() {
            return {
                planillas: [],
                horas_entrada: {},
                horas_laboradas: {},
                cuentas_costo: [],
                beneficios: [],
                cuentas_beneficios: [],
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
                $element.find('i').toggleClass('hidden');

                if (!$element.next().hasClass('hidden')) {
                    this.getHorasEntrada($element.data('colaborador-id'));
                    this.getHorasLaboradas($element.data('planilla-id'));
                    this.getCuentasCosto();
                    this.getBeneficios();
                    this.getCuentasBeneficios();
                }
            },

            getHorasEntrada(colaborador_id) {
                var vm = this;
                if (colaborador_id) {
                    this.$http.get('/api/horas_entrada/' + colaborador_id).then(response => {
                        var horas = _.clone(vm.horas_entrada);;
                        horas[colaborador_id] = response.data;
                        Vue.set(vm, 'horas_entrada', horas);
                    });
                }
            },

            getHorasLaboradas(planilla_id) {
                var vm = this;
                if (planilla_id) {
                    this.$http.get('/api/horas_laboradas/' + planilla_id).then(response => {
                        var horas = _.clone(vm.horas_laboradas);
                        horas[planilla_id] = response.data;
                        Vue.set(vm, 'horas_laboradas', horas);
                    });
                }
            },

            getCuentasCosto() {
                if (!this.cuentas_costo.length) {
                    var vm = this;
                    this.$http.get('/api/cuentas_costo').then(response => {
                        Vue.set(vm, 'cuentas_costo', response.data);
                    });
                }
            },

            getBeneficios() {
                if (!this.beneficios.length) {
                    var vm = this;
                    this.$http.get('/api/beneficios').then(response => {
                        Vue.set(vm, 'beneficios', response.data);
                    });
                }
            },

            getCuentasBeneficios() {
                if (!this.cuentas_beneficios.length) {
                    var vm = this;
                    this.$http.get('/api/cuentas_beneficios').then(response => {
                        Vue.set(vm, 'cuentas_beneficios', response.data);
                    });
                }
            },
        },

        components: {
            horasEntrada: HorasEntrada,
            horasLaboradas: HorasLaboradas
        },
    }
</script>
