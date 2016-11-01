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
                </tr>
            </thead>

            <tbody>
            <tr>
                <!-- Action -->
                <td style="vertical-align: middle;">
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
                    <div class='input-group time-picker'>
                        <input
                                type="text"
                                v-bind:id="'horas[' + hora.id + '].hora_entrada'"
                                v-model="hora.hora_entrada"
                                class="form-control text-center"
                        />
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-time"></span>
                        </span>
                    </div>

                </td>
            </tr>
            </tbody>
        </table>
        <button v-on:click="saveHorasEntrada">Save</button>
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
                    console.log('ok', response);
                }, (response) => {
                    console.log(error, response);
                })
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
