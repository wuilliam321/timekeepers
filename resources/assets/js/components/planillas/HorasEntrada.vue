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
                    {{ hora.hora_entrada | date_format('HH:mm') }}
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

        props: ['horas_entrada'],

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
