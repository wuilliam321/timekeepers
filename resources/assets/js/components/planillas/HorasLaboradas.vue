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
        <!-- Current Planillas -->
        <table class="table table-borderless m-b-none">
            <thead>
            <tr>
                <th>Cuenta de costo</th>
                <th>Beneficio</th>
                <th>Cuenta de beneficio</th>
                <th v-for="hora in getUltimasFechas()">
                    {{ hora | date_format('MMM-DD') }}
                </th>
                <th></th>
            </tr>
            </thead>

            <tbody>
            <tr v-for="hora in horas_laboradas">
                <!-- Cuenta de Costo -->
                <td style="vertical-align: middle;">
                    <input v-bind:id="'horas[' + hora.id + '].id'" v-model="hora.id" type="hidden" v-if="hora.id">
                    <select class="form-control" v-model="hora.cuenta_costo_id">
                        <option value="">---</option>
                        <option v-for="option in cuentas_costo" v-bind:value="option.id">{{option.nombre}}</option>
                    </select>
                </td>

                <!-- Beneficio -->
                <td style="vertical-align: middle;">
                    <select class="form-control" v-model="hora.beneficio_id">
                        <option value="">---</option>
                        <option v-for="option in beneficios" v-bind:value="option.id">{{option.nombre}}</option>
                    </select>
                </td>

                <!-- Cuenta de Costo -->
                <td style="vertical-align: middle;">
                    <select class="form-control" v-model="hora.cuenta_beneficio_id">
                        <option value="">---</option>
                        <option v-for="option in cuentas_beneficios" v-bind:value="option.id">{{option.nombre}}</option>
                    </select>
                </td>

                <!-- Dias -->
                <td style="vertical-align: middle;" v-for="ultima_hora in hora.ultimas_horas">
                    <input v-bind:id="'ultima_hora[' + ultima_hora.id + '].id'" v-model="ultima_hora.id" type="hidden" v-if="ultima_hora.id">
                    <input v-bind:id="'ultima_hora[' + ultima_hora.id + '].fecha_laborada'" v-model="ultima_hora.fecha_laborada" type="hidden" v-if="ultima_hora.id">
                    <input v-bind:id="'ultima_hora[' + ultima_hora.id + '].horas_laboradas_id'" v-model="hora.id" type="hidden">
                    <input v-bind:id="'ultima_hora[' + ultima_hora.id + '].horas_laboradas'"  v-model="ultima_hora.horas_laboradas" class="form-control text-center">
                </td>
                <td style="vertical-align: middle;">
                    <button class="btn btn-default btn-sm">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </td>
            </tr>
            <tr>
                <!-- Cuenta de Costo -->
                <td style="vertical-align: middle;">
                    <select class="form-control" v-model="new_horas_laboradas.cuenta_costo_id">
                        <option value="">---</option>
                        <option v-for="option in cuentas_costo" v-bind:value="option.id">{{option.nombre}}</option>
                    </select>
                </td>

                <!-- Beneficio -->
                <td style="vertical-align: middle;">
                    <select class="form-control" v-model="new_horas_laboradas.beneficio_id">
                        <option value="">---</option>
                        <option v-for="option in beneficios" v-bind:value="option.id">{{option.nombre}}</option>
                    </select>
                </td>

                <!-- Cuenta de Costo -->
                <td style="vertical-align: middle;">
                    <select class="form-control" v-model="new_horas_laboradas.cuenta_beneficio_id">
                        <option value="">---</option>
                        <option v-for="option in cuentas_beneficios" v-bind:value="option.id">{{option.nombre}}</option>
                    </select>
                </td>

                <!-- Dias -->
                <td style="vertical-align: middle;" v-for="(hora, index) in getUltimasFechas()">
                    <input v-bind:id="'new_detalles[' + index + '].fecha_laborada'" v-model="new_detalles[index].fecha_laborada" type="hidden">
                    <input v-bind:id="'new_detalles[' + index + '].horas_laboradas'"  v-model="new_detalles[index].horas_laboradas" class="form-control text-center">
                </td>
                <td style="vertical-align: middle;"></td>
            </tr>
            <tr>
                <td colspan="7" class="text-right">
                    <button v-on:click="saveHorasLaboradas" class="btn btn-default">
                        <span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span>
                        Save
                    </button>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    function initializeNewHorasLaboradas() {
        return {
            cuenta_costo_id: '',
            beneficio_id: '',
            cuenta_beneficio_id: '',
        };
    }

    function initializeNewDetalles() {
        var ultimas_fechas = _.map(_.range(3, 0), function(day) {
            return moment().subtract(day - 1, 'days').format('YYYY-MM-DD');
        });
        return _.map(_.range(0, 3), function(index) {
            return {
                fecha_laborada: ultimas_fechas[index],
                horas_laboradas: 0,
            }
        });
    }
    export default {
        /*
         * The component's data.
         */
        data() {
            return {
                new_horas_laboradas: initializeNewHorasLaboradas(),
                new_detalles: initializeNewDetalles(),
            };
        },

        props: ['horas_laboradas', 'planilla_id', 'colaborador_id', 'cuentas_costo', 'beneficios', 'cuentas_beneficios'],

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
            },

            getUltimasFechas() {
                return _.map(_.range(3, 0), function(day) {
                    return moment().subtract(day - 1, 'days');
                });
            },

            saveHorasLaboradas: function (event) {
                event.preventDefault();
                if (this.new_detalles.length
                        && this.new_horas_laboradas.cuenta_costo_id
                        && this.new_horas_laboradas.beneficio_id
                        && this.new_horas_laboradas.cuenta_beneficio_id) {
                    this.new_horas_laboradas.planilla_id = this.planilla_id;
                    this.new_horas_laboradas.colaborador_id = this.colaborador_id;
                    this.new_horas_laboradas.ultimas_horas = this.new_detalles;
                    this.horas_laboradas.push(this.new_horas_laboradas);
                }
                this.$http.post('/api/horas_laboradas/' + this.planilla_id, {horas_laboradas: this.horas_laboradas}).then(response => {
                    // Cleaning the new element
                    this.new_horas_laboradas = initializeNewHorasLaboradas();
                    this.new_detalles = initializeNewDetalles();

                    $(document).trigger('horas_laboradas.update', this.planilla_id);
                }, (response) => {
                    console.log(error, response);
                })
            }
        },

        filters: {
            date_format: function (value, format) {
                if (!value) return ''
                return moment(new Date(value)).format(format)
            },
        }
    }
</script>
