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
    <div style="padding-right: 0px !important;" class="col-xs-7 pull-right">
        <!-- Current Planillas -->
        <table class="table table-borderless m-b-none">
            <thead>
                <tr>
                    <th class="col-xs-5"></th>
                    <th v-for="fecha in getUltimasFechas()">
                        {{ fecha | date_format('MMM-DD') }}
                    </th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
            <tr>
                <!-- Action -->
                <td style="vertical-align: middle;" class="text-center">
                    Hora de entrada
                </td>

                <!-- Name -->
                <!-- TODO: Aqui deben estar los ultimos tres dias junto con sus valores -->
                <td style="vertical-align: middle;" v-for="hora in horas_entrada">
                    <input
                            v-bind:id="'horas[' + hora.id + '].id'"
                            v-model="hora.id"
                            type="hidden"
                            v-if="hora.id"
                    />
                    <div class='input-group'>
                        <input
                                type="text"
                                min="0"
                                max="23"
                                maxlength="2"
                                v-on:focusout="validateHorasInteger(hora)"
                                v-bind:id="'horas[' + hora.id + '].horas'"
                                v-model="hora.horas"
                                class="form-control text-center"
                        />
                        <div class="input-group-addon">:</div>
                        <input
                                type="text"
                                min="0"
                                max="59"
                                maxlength="2"
                                v-on:focusout="validateMinutosInteger(hora)"
                                v-bind:id="'horas[' + hora.id + '].minutos'"
                                v-model="hora.minutos"
                                class="form-control text-center"
                        />
                    </div>

                </td>
                <td>
                    <button v-on:click="saveHorasEntrada" class="btn btn-primary btn-sm">
                        <span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span>
                    </button>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        /*
         * The component's data.
         */
        data() {
            return {
                dataForSave: []
            };
        },

        props: ['horas_entrada', 'colaborador_id'],

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

            saveHorasEntrada: function (event) {
                event.preventDefault();
                this.$http.post('/api/horas_entrada/' + this.colaborador_id, {horas_entrada: this.horas_entrada}).then(response => {
                    toastr.success('Horas de entrada actualizadas con correctamente','Exito!');
                }, (response) => {
                    toastr.error('Ocurrio un error al guardar horas de entrada','Error!');
                    console.log(error, response);
                });
            },

            // TODO: Repeated code
            fixHorasLeadingZero: function(horas_laboradas) {
                var value = parseInt(horas_laboradas.horas);
                if (value < 10) {
                    horas_laboradas.horas = '0' + value;
                }
            },

            // TODO: Repeated code
            fixMinutosLeadingZero: function(horas_laboradas) {
                var value = parseInt(horas_laboradas.minutos);
                if (value < 10) {
                    horas_laboradas.minutos = '0' + value;
                }
            },

            // TODO: Repeated code
            validateHorasInteger: function(hora) {
                var min = 0;
                var max = 24;
                var value = parseInt(hora.horas);
                if (value >= 0) {
                    if (value < min) {
                        value = 0;
                    }
                    if (value > max) {
                        value = max;
                    }
                } else {
                    value = '';
                }
                hora.horas = value;
                this.fixHorasLeadingZero(hora);
            },

            // TODO: Repeated code
            validateMinutosInteger: function(hora) {
                var min = 0;
                var max = 59;
                var value = parseInt(hora.minutos);
                if (value >= 0) {
                    if (value < min) {
                        value = 0;
                    }
                    if (value > max) {
                        value = max;
                    }
                } else {
                    value = '';
                }
                hora.minutos = value;
                this.fixMinutosLeadingZero(hora);
            },
        },

        filters: {
            date_format: function (value, format) {
                if (!value) return ''
                return moment(new Date(value)).format(format)
            },
        }
    }
</script>
