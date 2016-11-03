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
                    <th></th>
                    <th v-for="fecha in getUltimasFechas()">
                        {{ fecha | date_format('MMM-DD') }}
                    </th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
            <tr>
                <!-- Action -->
                <td style="vertical-align: middle;" class="col-xs-3">
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
                                type="number"
                                min="0"
                                max="23"
                                maxlength="2"
                                v-on:keyup="fixLeadingZero"
                                v-on:mouseup="fixLeadingZero"
                                v-bind:id="'horas[' + hora.id + '].horas'"
                                v-model="hora.horas"
                                class="form-control text-center"
                        />
                        <div class="input-group-addon">:</div>
                        <input
                                type="number"
                                min="0"
                                max="59"
                                maxlength="2"
                                v-on:keyup="fixLeadingZero"
                                v-on:mouseup="fixLeadingZero"
                                v-bind:id="'horas[' + hora.id + '].minutos'"
                                v-model="hora.minutos"
                                class="form-control text-center"
                        />
                    </div>

                </td>
                <td>
                    <button v-on:click="saveHorasEntrada" class="btn btn-primary">
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
                    console.log(response);
                    toastr.success('Horas de entrada actualizadas con correctamente','Exito!');
                }, (response) => {
                    toastr.error('Ocurrio un error al guardar horas de entrada','Error!');
                    console.log(error, response);
                })
            },

            fixLeadingZero: function(event) {
                var $element = $(event.currentTarget);
                var value = parseInt($element.val());
                if (value < 10) {
                    $element.val('0' + value);
                }
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
