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
                    <!-- TODO: Aqui deben estar los ultimos tres dias junto con sus valores -->
                    <th v-for="hora in horas_entrada">
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
                <td style="vertical-align: middle;" v-for="hora in horas_entrada">
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

            showDetails() {
                console.log('showingDetails');
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
