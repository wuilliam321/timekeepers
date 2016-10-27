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
                <th>Proyecto</th>
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
                <!-- Proyecto -->
                <td style="vertical-align: middle;">
                    {{ hora.nombre_proyecto}}
                </td>

                <!-- Cuenta de Costo -->
                <td style="vertical-align: middle;">
                    {{ hora.nombre_cuenta_costo}}
                </td>

                <!-- Beneficio -->
                <td style="vertical-align: middle;">
                    {{ hora.nombre_beneficio}}
                </td>

                <!-- Cuenta de Costo -->
                <td style="vertical-align: middle;">
                    {{ hora.nombre_cuenta_beneficio}}
                </td>

                <!-- Dias -->
                <td style="vertical-align: middle;" v-for="ultima_hora in hora.ultimas_horas">
                    {{ ultima_hora.horas_laboradas }}
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
            };
        },

        props: ['horas_laboradas'],

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
