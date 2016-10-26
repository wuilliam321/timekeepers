<style scoped>
    .action-link {
        cursor: pointer;
    }

    .m-b-none {
        margin-bottom: 0;
    }
</style>

<template>
    <div v-if="tiempos.length > 0">
        <!-- Current Tiempos  -->
        <table class="table table-borderless m-b-none">
            <thead>
            <tr>
                <th>Proyecto</th>
                <th>Cuenta de costo</th>
                <th>Beneficio</th>
                <th>Cuenta de beneficio</th>
                <th v-for="tiempo in tiempos">
                    {{ tiempo.fecha_laborada | date_format('MMM-DD') }}
                </th>
            </tr>
            </thead>

            <tbody>
            <tr v-for="tiempo in tiempos">
                <!-- Proyecto -->
                <td style="vertical-align: middle;">
                    {{ tiempo.nombre_proyecto}}
                </td>

                <!-- Cuenta de Costo -->
                <td style="vertical-align: middle;">
                    {{ tiempo.nombre_cuenta_costo}}
                </td>

                <!-- Beneficio -->
                <td style="vertical-align: middle;">
                    {{ tiempo.nombre_beneficio}}
                </td>

                <!-- Cuenta de Costo -->
                <td style="vertical-align: middle;">
                    {{ tiempo.nombre_cuenta_costo}}
                </td>

                <!-- Name -->
                <td style="vertical-align: middle;" v-for="hora in horas">
                    {{ hora.fecha_entrada | date_format('HH:mm') }}
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
                tiempos: [],
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
                // this.getTiempos();
            },

            /**
             * Get all of the tiempos for the user.
             */
            getTiempos() {
                this.$http.get('/api/tiempos').then(response => {
                    this.tiempos = response.data;
                });
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
