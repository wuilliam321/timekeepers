<style scoped>
    .glyphicon-sort-by-alphabet,
    .glyphicon-sort-by-alphabet-alt {
        display: none;
    }
    .active .glyphicon-sort {
        display: none;
    }
    .active.up .glyphicon-sort-by-alphabet {
        display: block;
    }
    .active.down .glyphicon-sort-by-alphabet-alt {
        display: block;
    }
    .action-link {
        cursor: pointer;
    }

    .m-b-none {
        margin-bottom: 0;
    }
</style>

<template>
    <div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <span>
                        Planillas
                    </span>
                </div>
            </div>

            <div class="panel-body">
                <table class="table table-borderless m-b-none" v-if="planillas.length > 0">
                    <thead>
                    <tr>
                        <th></th>
                        <th
                                v-on:click="sortBy('nombre_colaborador')"
                                v-bind:class="{active: sortKey == 'nombre_colaborador', up: sortDirection == 'asc', down: sortDirection == 'desc'}">
                            Colaborador
                            <span class="pull-right glyphicon glyphicon-sort" aria-hidden="true"></span>
                            <span class="pull-right glyphicon glyphicon-sort-by-alphabet" aria-hidden="true"></span>
                            <span class="pull-right glyphicon glyphicon-sort-by-alphabet-alt" aria-hidden="true"></span>

                        </th>
                        <th
                                v-on:click="sortBy('cedula')"
                                v-bind:class="{active: sortKey == 'cedula', up: sortDirection == 'asc', down: sortDirection == 'desc'}">
                            Cedula
                            <span class="pull-right glyphicon glyphicon-sort" aria-hidden="true"></span>
                            <span class="pull-right glyphicon glyphicon-sort-by-alphabet" aria-hidden="true"></span>
                            <span class="pull-right glyphicon glyphicon-sort-by-alphabet-alt" aria-hidden="true"></span>
                        </th>
                        <th
                                v-on:click="sortBy('nombre_proyecto')"
                                v-bind:class="{active: sortKey == 'nombre_proyecto', up: sortDirection == 'asc', down: sortDirection == 'desc'}">
                            Proyecto
                            <span class="pull-right glyphicon glyphicon-sort" aria-hidden="true"></span>
                            <span class="pull-right glyphicon glyphicon-sort-by-alphabet" aria-hidden="true"></span>
                            <span class="pull-right glyphicon glyphicon-sort-by-alphabet-alt" aria-hidden="true"></span>
                        </th>
                        <th
                                v-on:click="sortBy('codigo_planilla')"
                                v-bind:class="{active: sortKey == 'codigo_planilla', up: sortDirection == 'asc', down: sortDirection == 'desc'}">
                            Planilla
                            <span class="pull-right glyphicon glyphicon-sort" aria-hidden="true"></span>
                            <span class="pull-right glyphicon glyphicon-sort-by-alphabet" aria-hidden="true"></span>
                            <span class="pull-right glyphicon glyphicon-sort-by-alphabet-alt" aria-hidden="true"></span>
                        </th>
                        <th
                                v-on:click="sortBy('tipo_salario')"
                                v-bind:class="{active: sortKey == 'tipo_salario', up: sortDirection == 'asc', down: sortDirection == 'desc'}">
                            Tipo Salario
                            <span class="pull-right glyphicon glyphicon-sort" aria-hidden="true"></span>
                            <span class="pull-right glyphicon glyphicon-sort-by-alphabet" aria-hidden="true"></span>
                            <span class="pull-right glyphicon glyphicon-sort-by-alphabet-alt" aria-hidden="true"></span>
                        </th>
                    </tr>
                    </thead>

                    <tbody>
                    <template v-for="planilla in planillas">
                        <tr
                                @click="togglePlanillaView"
                                v-bind:data-colaborador-id="planilla.colaborador_id"
                                v-bind:data-planilla-id="planilla.id">
                            <!-- Action -->
                            <td class="display-button" style="vertical-align: middle;">
                                <i class="fa fa-angle-right" aria-hidden="true"></i>
                                <i class="fa fa-angle-down hidden" aria-hidden="true"></i>
                            </td>

                            <!-- Name -->
                            <td style="vertical-align: middle;">
                                {{ planilla.nombre_colaborador }}
                            </td>

                            <!-- Cedula -->
                            <td style="vertical-align: middle;">
                                {{ planilla.cedula }}
                            </td>

                            <!-- Proyecto -->
                            <td style="vertical-align: middle;">
                                {{ planilla.nombre_proyecto }}
                            </td>

                            <!-- Codigo -->
                            <td style="vertical-align: middle;">
                                {{ planilla.codigo }}
                            </td>

                            <!-- Tipo Salario -->
                            <td style="vertical-align: middle;">
                                {{ planilla.tipo_salario}}
                            </td>
                        </tr>
                        <tr class="horas-container hidden">
                            <td colspan="6">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <horas-entrada v-bind:colaborador_id="planilla.colaborador_id"
                                                       v-bind:horas_entrada="horas_entrada[planilla.colaborador_id]"></horas-entrada>
                                        <horas-laboradas v-bind:colaborador_id="planilla.colaborador_id"
                                                         v-bind:planilla_id="planilla.id"
                                                         v-bind:cuentas_beneficios="cuentas_beneficios"
                                                         v-bind:beneficios="beneficios"
                                                         v-bind:cuentas_costo="cuentas_costo"
                                                         v-bind:horas_laboradas="horas_laboradas[planilla.id]"></horas-laboradas>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </template>
                    </tbody>
                </table>
                <nav aria-label="Page navigation" class="text-center">
                    <ul class="pagination">
                        <li>
                            <a href="#" v-on:click.prevent="startPage">&laquo;&laquo;</a>
                        </li>
                        <li>
                            <a href="#" v-on:click.prevent="prevPage" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <li v-bind:class="{ active: page === currentPage }" v-on:click="viewPage(page)" v-for="page in total"><a v-on:click.prevent href="#">{{page}}</a></li>
                        <li>
                            <a href="#" v-on:click.prevent="nextPage" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" v-on:click.prevent="lastPage">&raquo;&raquo;</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</template>

<script>
    import HorasEntrada from './HorasEntrada.vue'
    import HorasLaboradas from './HorasLaboradas.vue'

    export default {
        /*
         * The component's data.
         */
        data() {
            return {
                REMOVE_HOST_REGEXP: /^[a-z]{4}\:\/{2}[a-z]{1,}\:[0-9]{1,4}.(.*)/,
                planillas: [],
                horas_entrada: {},
                horas_laboradas: {},
                cuentas_costo: [],
                beneficios: [],
                cuentas_beneficios: [],
                default_paginate_options: {
                    sort_key: 'id',
                },
                currentPage: 1,
                total: 0,
                sortKey: 'id',
                sortDirection: 'asc',
                next_url: '',
                prev_url: '',
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
                this.getPlanillas();
                var vm = this;

                $(document).on('horas_laboradas.update', function (e, planilla_id) {
                    vm.getHorasLaboradas(planilla_id);
                });
            },

            /**
             * Get all of the planillas for the user.
             */
            getPlanillas() {
                var params = $.param(this.default_paginate_options);
                var url = '/api/planillas?' + params;
                this.runGetPlanillasRequest(url);
            },


            runGetPlanillasRequest(url) {
                this.$http.get(url).then(response => {
                    this.last_page = response.body.last_page;
                    this.total = this.last_page;
                    this.planillas = response.body.data;
                    this.next_url = (response.body.next_page_url) ? '/' + response.body.next_page_url.replace(this.REMOVE_HOST_REGEXP, '$1') : null;
                    this.prev_url = (response.body.prev_page_url) ? '/' + response.body.prev_page_url.replace(this.REMOVE_HOST_REGEXP, '$1'): null;
                });
            },

            togglePlanillaView(event) {
                var $element = $(event.currentTarget);
                $element.next().toggleClass('hidden');
                $element.find('i').toggleClass('hidden');

                if (!$element.next().hasClass('hidden')) {
                    this.getHorasEntrada($element.data('colaborador-id'));
                    this.getHorasLaboradas($element.data('planilla-id'));
                    this.getCuentasCosto();
                    this.getBeneficios();
                    this.getCuentasBeneficios();
                }
            },

            getHorasEntrada(colaborador_id) {
                var vm = this;
                if (colaborador_id) {
                    this.$http.get('/api/horas_entrada/' + colaborador_id).then(response => {
                        var horas = _.clone(vm.horas_entrada);
                        horas[colaborador_id] = response.data;
                        _.each(horas[colaborador_id], function (hora) {
                            var splitted = hora.hora_entrada.split(':');
                            hora.horas = splitted[0];
                            hora.minutos = splitted[1];
                        });
                        Vue.set(vm, 'horas_entrada', horas);
                    });
                }
            },

            getHorasLaboradas(planilla_id) {
                var vm = this;
                if (planilla_id) {
                    this.$http.get('/api/horas_laboradas/' + planilla_id).then(response => {
                        var horas = _.clone(vm.horas_laboradas);
                        horas[planilla_id] = response.data;
                        Vue.set(vm, 'horas_laboradas', horas);
                    });
                }
            },

            getCuentasCosto() {
                if (!this.cuentas_costo.length) {
                    var vm = this;
                    this.$http.get('/api/cuentas_costo').then(response => {
                        Vue.set(vm, 'cuentas_costo', response.data);
                    });
                }
            },

            getBeneficios() {
                if (!this.beneficios.length) {
                    var vm = this;
                    this.$http.get('/api/beneficios').then(response => {
                        Vue.set(vm, 'beneficios', response.data);
                    });
                }
            },

            getCuentasBeneficios() {
                if (!this.cuentas_beneficios.length) {
                    var vm = this;
                    this.$http.get('/api/cuentas_beneficios').then(response => {
                        Vue.set(vm, 'cuentas_beneficios', response.data);
                    });
                }
            },

            sortBy(key) {
//                this.closeAllToggled();
                $('.horas-container').addClass('hidden');
                this.checkSortDirection(key);
                this.sortKey = key;
                this.default_paginate_options.sort_key = this.sortKey;
                var params = $.param(this.default_paginate_options);
                var url = '/api/planillas?' + params +  '&page=' + this.currentPage;
                this.runGetPlanillasRequest(url);
            },

            checkSortDirection(key) {
                if (this.sortKey == key) {
                    this.sortDirection = (this.sortDirection === 'asc') ? 'desc' : 'asc';
                } else {
                    this.sortDirection = 'asc'
                }
                this.default_paginate_options.sort_direction = this.sortDirection;
            },

            startPage() {
                this.currentPage = 1;
                this.getPlanillas();
            },

            lastPage() {
                this.currentPage = this.last_page;
                var params = $.param(this.default_paginate_options) + '&page=' + this.last_page;
                var url = '/api/planillas?' + params;
                this.runGetPlanillasRequest(url);
            },

            viewPage(page) {
                this.currentPage = page;
                var params = $.param(this.default_paginate_options) + '&page=' + page;
                var url = '/api/planillas?' + params;
                this.runGetPlanillasRequest(url);
            },

            nextPage() {
                var params = $.param(this.default_paginate_options);
                if (this.next_url) {
                    this.currentPage++;
                    var url = this.next_url + '&' + params;
                    this.runGetPlanillasRequest(url);
                }
            },

            prevPage() {
                var params = $.param(this.default_paginate_options);
                if (this.prev_url) {
                    this.currentPage--;
                    var url = this.prev_url + '&' + params;
                    this.runGetPlanillasRequest(url);
                }
            }
        },

        components: {
            horasEntrada: HorasEntrada,
            horasLaboradas: HorasLaboradas
        },
    }
</script>
