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
                <th>Dia 1</th>
                <th>Dia 2</th>
                <th>Dia 3</th>
            </tr>
            </thead>

            <tbody>
            <tr v-for="hora in horas_laboradas">
                <!-- Proyecto -->
                <td style="vertical-align: middle;">
                    {{ hora.proyecto_id}}
                </td>

                <!-- Cuenta de Costo -->
                <td style="vertical-align: middle;">
                    {{ hora.cuenta_costo_id}}
                </td>

                <!-- Beneficio -->
                <td style="vertical-align: middle;">
                    {{ hora.beneficio_id}}
                </td>

                <!-- Cuenta de Costo -->
                <td style="vertical-align: middle;">
                    {{ hora.cuenta_costo_id}}
                </td>

                <!-- Dia 1 -->
                <td style="vertical-align: middle;">

                </td>

                <!-- Dia 2 -->
                <td style="vertical-align: middle;">

                </td>

                <!-- Dia 3 -->
                <td style="vertical-align: middle;">

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
        },

        filters: {
            date_format: function (value, format) {
                if (!value) return ''
                return moment(new Date(value)).format(format)
            },
        }
    }
</script>
