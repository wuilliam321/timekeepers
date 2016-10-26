<style scoped>
    .action-link {
        cursor: pointer;
    }

    .m-b-none {
        margin-bottom: 0;
    }
</style>

<template>
    <div v-if="horas.length > 0">
        <!-- Current Planillas -->
        <table class="table table-borderless m-b-none">
            <thead>
                <tr>
                    <th></th>
                    <th v-for="hora in horas">
                        {{ hora.fecha_entrada | date_format('MMM-DD') }}
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
                horas: [],
            };
        },

        props: ['colaborador_id'],

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
                this.getHorasEntrada();
            },

            getHorasEntrada() {
                this.$http.get('/api/horas_entrada/' + this.colaborador_id + '/limit/3').then(response => {
                    this.horas = response.data;
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
