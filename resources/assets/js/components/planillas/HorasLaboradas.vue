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
                    <input v-bind:id="'ultima_hora[' + ultima_hora.id + '].horas_laboradas_id'" v-model="hora.id" type="hidden">
                    <input v-bind:id="'ultima_hora[' + ultima_hora.id + '].horas_laboradas'"  v-model="ultima_hora.horas_laboradas" class="form-control text-center">
                </td>
                <button v-on:click="saveHorasLaboradas">Save</button>
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
            };
        },

        props: ['horas_laboradas', 'planilla_id', 'cuentas_costo', 'beneficios', 'cuentas_beneficios'],

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
                this.$http.post('/api/horas_laboradas/' + this.planilla_id, {horas_laboradas: this.horas_laboradas}).then(response => {
                    console.log('ok', response);
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
