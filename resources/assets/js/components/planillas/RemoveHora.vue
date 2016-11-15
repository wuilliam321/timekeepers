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

        props: ['hora_id', 'planilla_id', 'eventHub'],

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
                    this.$http.delete('/timekeepers/api/horas_laboradas/' + this.hora_id).then(response => {
                        toastr.success('Horas laboradas eliminadas correctamente', 'Exito!');
                        this.eventHub.$emit('horas_laboradas.delete', this.planilla_id, this.hora_id);
                    }, (response) => {
                        toastr.error('Ocurrio un error al eliminar horas laboradas', 'Error!');
                        console.log(response);
                    });
                }
            }
        },
    }
</script>
