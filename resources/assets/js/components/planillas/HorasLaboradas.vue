<style scoped>
    .action-link {
        cursor: pointer;
    }

    .m-b-none {
        margin-bottom: 0;
    }

    .input-group-addon {
        padding: 6px 1px;
    }

    .form-control {
        padding: 6px;
    }
</style>

<template>
    <div>
        <!-- Current Planillas -->
        <table class="table table-borderless m-b-none">
            <thead>
            <tr>
                <th class="col-xs-3">Cuenta de costo</th>
                <th class="col-xs-2">Beneficio</th>
                <th class="col-xs-3">Cuenta de beneficio</th>
                <th v-for="hora in getUltimasFechas()">
                    {{ hora | date_format('MMM-DD') }}
                </th>
                <th></th>
            </tr>
            </thead>

            <tbody>
            <tr v-for="hora in horas_laboradas">
                <!-- Cuenta de Costo -->
                <td>
                    <input
                            v-bind:id="'horas[' + hora.id + '].id'"
                            v-model="hora.id"
                            type="hidden"
                            v-if="hora.id"
                    />
                    <select class="form-control" v-model="hora.cuenta_costo_id">
                        <option value="">---</option>
                        <option v-for="option in cuentas_costo" v-bind:value="option.id">{{option.nombre}}</option>
                    </select>
                </td>

                <!-- Beneficio -->
                <td>
                    <select class="form-control" v-model="hora.beneficio_id">
                        <option value="">---</option>
                        <option v-for="option in beneficios" v-bind:value="option.id">{{option.nombre}}</option>
                    </select>
                </td>

                <!-- Cuenta de Costo -->
                <td>
                    <select class="form-control" v-model="hora.cuenta_beneficio_id">
                        <option value="">---</option>
                        <option v-for="option in cuentas_beneficios" v-bind:value="option.id">{{option.nombre}}</option>
                    </select>
                </td>

                <!-- Dias -->
                <td v-for="ultima_hora in hora.ultimas_horas">
                    <input
                            v-bind:id="'ultima_hora[' + ultima_hora.id + '].id'"
                            v-model="ultima_hora.id"
                            type="hidden"
                            v-if="ultima_hora.id"
                    />
                    <input
                            v-bind:id="'ultima_hora[' + ultima_hora.id + '].fecha_laborada'"
                            v-model="ultima_hora.fecha_laborada"
                            type="hidden"
                            v-if="ultima_hora.id"
                    />
                    <input
                            v-bind:id="'ultima_hora[' + ultima_hora.id + '].horas_laborada_id'"
                            v-model="hora.id"
                            type="hidden"
                    />

                    <!--TODO: We need to send the model to the events in order to correctly manipulate and preseve changes-->
                    <input
                            type="text"
                            min="0"
                            max="24"
                            maxlength="5"
                            v-on:focusout="validateDecimal(ultima_hora)"
                            v-bind:id="'ultima_hora[' + ultima_hora.id + '].horas_laboradas'"
                            v-model="ultima_hora.horas_laboradas"
                            class="form-control text-center"
                    />
                </td>
                <td>
                    <remove-hora
                            v-bind:eventHub="eventHub"
                            v-bind:planilla_id="planilla_id"
                            v-bind:hora_id="hora.id"></remove-hora>
                </td>
            </tr>
            <tr>
                <!-- Cuenta de Costo -->
                <td>
                    <select class="form-control" v-model="new_horas_laboradas.cuenta_costo_id">
                        <option value="">---</option>
                        <option v-for="option in cuentas_costo" v-bind:value="option.id">{{option.nombre}}</option>
                    </select>
                </td>

                <!-- Beneficio -->
                <td>
                    <select class="form-control" v-model="new_horas_laboradas.beneficio_id">
                        <option value="">---</option>
                        <option v-for="option in beneficios" v-bind:value="option.id">{{option.nombre}}</option>
                    </select>
                </td>

                <!-- Cuenta de Costo -->
                <td>
                    <select class="form-control" v-model="new_horas_laboradas.cuenta_beneficio_id">
                        <option value="">---</option>
                        <option v-for="option in cuentas_beneficios" v-bind:value="option.id">{{option.nombre}}</option>
                    </select>
                </td>

                <!-- Dias -->
                <td v-for="new_detalle in new_detalles">
                    <input
                            v-bind:id="'new_detalle.fecha_laborada'"
                            v-model="new_detalle.fecha_laborada"
                            type="hidden"
                    />
                    <input
                            type="text"
                            min="0"
                            max="24"
                            maxlength="5"
                            v-on:focusout="validateDecimal(new_detalle)"
                            v-bind:id="new_detalle.horas_laboradas"
                            v-model="new_detalle.horas_laboradas"
                            class="form-control text-center"
                    />
                </td>
                <td></td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    import {BASE_URL} from '../../config.js'
    import RemoveHora from './RemoveHora.vue'
    function initializeNewHorasLaboradas() {
        return {
            cuenta_costo_id: '',
            beneficio_id: '',
            cuenta_beneficio_id: '',
        };
    }

    function initializeNewDetalles() {
        var ultimas_fechas = _.map(_.range(3, 0), function (day) {
            return moment().subtract(day - 1, 'days').format('YYYY-MM-DD');
        });
        return _.map(_.range(0, 3), function (index) {
            return {
                fecha_laborada: ultimas_fechas[index],
                horas_laboradas: '0.00',
            }
        });
    }
    export default {
        /*
         * The component's data.
         */
        data() {
            return {
                horas_indexes: 0,
                new_horas_laboradas: initializeNewHorasLaboradas(),
                new_detalles: initializeNewDetalles(),
            };
        },

        props: ['horas_laboradas', 'planilla_id', 'colaborador_id', 'cuentas_costo', 'beneficios', 'cuentas_beneficios', 'eventHub', 'isSaving'],

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
                var vm = this;
                this.eventHub.$on('horasLaboradas.save' + this.planilla_id, function (event) {
                    vm.saveHorasLaboradas(event);
                });
            },

            getUltimasFechas() {
                return _.map(_.range(3, 0), function (day) {
                    return moment().subtract(day - 1, 'days');
                });
            },

            saveHorasLaboradas: function (event) {
                var horas_laboradas_for_save = _.clone(this.horas_laboradas);
                if (this.new_detalles.length
                        && this.new_horas_laboradas.cuenta_costo_id
                        && this.new_horas_laboradas.beneficio_id
                        && this.new_horas_laboradas.cuenta_beneficio_id) {
                    this.new_horas_laboradas.planilla_id = this.planilla_id;
                    this.new_horas_laboradas.colaborador_id = this.colaborador_id;
                    this.new_horas_laboradas.ultimas_horas = this.new_detalles;
                    horas_laboradas_for_save.push(this.new_horas_laboradas);
                }
                this.$http.post(BASE_URL + 'api/horas_laboradas/' + this.planilla_id, {horas_laboradas: horas_laboradas_for_save}).then(response => {
                    var message = '';
                    if (response.data.add) {
                        message = 'Horas laboradas ingresadas correctamente';
                        toastr.success(message, 'Exito!');
                        var temp = _.merge(this.horas_laboradas, response.data);
                        this.horas_laboradas = Object.assign({}, this.horas_laboradas, temp);

                    } else if (response.data.update) {
                        message = 'Horas laboradas actualizadas correctamente';
                        toastr.success(message, 'Exito!');
                    }
                    this.new_horas_laboradas = initializeNewHorasLaboradas();
                    this.new_detalles = initializeNewDetalles();
                    this.eventHub.$emit('horas.saveCompleted');
                }, (response) => {
                    toastr.error('Ocurrio un error al guardar horas laboradas', 'Error!');
                    console.log(response);
                    this.eventHub.$emit('horas.saveCompleted');
                })
            },

            validateDecimal: function(hora) {
                var min = 0;
                var max = 24;
                if (typeof hora.horas_laboradas === 'string') {
                    hora.horas_laboradas = hora.horas_laboradas.replace(',', '.');
                }
                var value = parseFloat(hora.horas_laboradas);

                if (!value) {
                    value = 0;
                }

                if (value < min) {
                    value = 0;
                }

                if (value > max) {
                    value = max;
                }

                hora.horas_laboradas = parseFloat(value).toFixed(2);
            }

        },

        components: {
            removeHora: RemoveHora
        },

        filters: {
            date_format: function (value, format) {
                if (!value) return ''
                return moment(new Date(value)).format(format)
            },
        }
    }
</script>
