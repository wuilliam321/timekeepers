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
        <button
                v-on:click="remove"
                class="btn btn-danger btn-sm"
                role="button">
            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
        </button>
    </div>
</template>

<script>
    export default {
        /*
         * The component's data.
         */
        data() {
            return {};
        },

        props: ['hora_id', 'planilla_id'],

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

            remove: function() {
                if (confirm('Esta seguro?')) {
                    this.$http.delete('/api/horas_laboradas/' + this.hora_id).then(response => {
                        $(document).trigger('horas_laboradas.update', this.planilla_id);
                        toastr.success('Horas laboradas eliminadas correctamente', 'Exito!');
                        console.log(response);
                    }, (response) => {
                        toastr.error('Ocurrio un error al eliminar horas laboradas', 'Error!');
                        console.log(response);
                    });
                }
            }
        },
    }
</script>
