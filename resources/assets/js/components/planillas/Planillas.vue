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
        <div class="panel panel-default planillas-container">
            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-3">
                        <div class="form-group">
                            <label for="planillas-filter">
                                Planillas
                            </label>
                            <select id="planillas-filter" class="form-control" v-on:change="filterPlanillasByCodigo">
                                <option value="">Todas</option>
                                <template v-for="planilla in planillas_for_filter">
                                    <option v-bind:value="planilla">{{planilla}}</option>
                                </template>
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-9">
                        <div class="form-group">
                            <label for="planillas-filter">
                                Buscar
                            </label>
                            <input
                                    id="text-filter" class="form-control"
                                    v-on:keyup="filterPlanillasByText"
                                    placeholder="Buscar por nombre del colaborador, cedula, nombre del proyecto o tipo de salario"
                            />
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-body">
                <table class="table table-borderless m-b-none" v-if="planillas.length > 0">
                    <thead>
                    <tr>
                        <th></th>
                        <th
                                v-on:click="sortBy('nombre_colaborador')"
                                v-bind:class="{active: sortKey == 'nombre_colaborador', up: sortDirection == 'asc', down: sortDirection == 'desc'}"
                                class="col-xs-3">
                            Colaborador
                            <span class="pull-right glyphicon glyphicon-sort" aria-hidden="true"></span>
                            <span class="pull-right glyphicon glyphicon-sort-by-alphabet" aria-hidden="true"></span>
                            <span class="pull-right glyphicon glyphicon-sort-by-alphabet-alt" aria-hidden="true"></span>

                        </th>
                        <th
                                v-on:click="sortBy('cedula')"
                                v-bind:class="{active: sortKey == 'cedula', up: sortDirection == 'asc', down: sortDirection == 'desc'}"
                                class="col-xs-1">
                            Cedula
                            <span class="pull-right glyphicon glyphicon-sort" aria-hidden="true"></span>
                            <span class="pull-right glyphicon glyphicon-sort-by-alphabet" aria-hidden="true"></span>
                            <span class="pull-right glyphicon glyphicon-sort-by-alphabet-alt" aria-hidden="true"></span>
                        </th>
                        <th
                                v-on:click="sortBy('nombre_proyecto')"
                                v-bind:class="{active: sortKey == 'nombre_proyecto', up: sortDirection == 'asc', down: sortDirection == 'desc'}"
                                class="col-xs-4">
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
                                :key="planilla.id"
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
                        <tr
                                class="horas-container hidden"
                                :key="planilla.id + 'b'">
                            <td colspan="6">
                                <div class="panel panel-default">

                                    <div v-if="isAdmin()" class="admin-view panel-body">
                                        <horas-entrada v-bind:user="user"
                                                       v-bind:days_ago="days_ago"
                                                       v-bind:eventHub="eventHub"
                                                       v-bind:planilla_id="planilla.id"
                                                       v-bind:colaborador_id="planilla.colaborador_id"
                                                       v-bind:horas_entrada="planilla.horas_entrada"></horas-entrada>
                                        <horas-laboradas v-bind:user="user"
                                                         v-bind:days_ago="days_ago"
                                                         v-bind:eventHub="eventHub"
                                                         v-bind:colaborador_id="planilla.colaborador_id"
                                                         v-bind:planilla_id="planilla.id"
                                                         v-bind:cuentas_beneficios="cuentas_beneficios"
                                                         v-bind:beneficios="beneficios"
                                                         v-bind:cuentas_costo="cuentas_costo"
                                                         v-bind:horas_laboradas="planilla.horas_laboradas"></horas-laboradas>
                                        <div>
                                            <button v-show="isSaving" class="btn btn-primary disabled col-xs-1 pull-right">
                                                <i class="fa fa-spinner fa-spin"></i>&nbsp;
                                            </button>
                                            <button v-show="!isSaving" v-on:click="saveHoras(planilla.id)" class="btn btn-primary pull-right">
                                                <span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span>
                                                Guardar
                                            </button>
                                        </div>
                                    </div>
                                    <div v-else class="panel-body">
                                        <horas-entrada v-bind:user="user"
                                                       v-bind:days_ago="days_ago"
                                                       v-bind:eventHub="eventHub"
                                                       v-bind:planilla_id="planilla.id"
                                                       v-bind:colaborador_id="planilla.colaborador_id"
                                                       v-bind:horas_entrada="planilla.horas_entrada"></horas-entrada>
                                        <horas-laboradas v-bind:user="user"
                                                         v-bind:days_ago="days_ago"
                                                         v-bind:eventHub="eventHub"
                                                         v-bind:colaborador_id="planilla.colaborador_id"
                                                         v-bind:planilla_id="planilla.id"
                                                         v-bind:cuentas_beneficios="cuentas_beneficios"
                                                         v-bind:beneficios="beneficios"
                                                         v-bind:cuentas_costo="cuentas_costo"
                                                         v-bind:horas_laboradas="planilla.horas_laboradas"></horas-laboradas>
                                        <div>
                                            <button v-show="isSaving" class="btn btn-primary disabled col-xs-1 pull-right">
                                                <i class="fa fa-spinner fa-spin"></i>&nbsp;
                                            </button>
                                            <button v-show="!isSaving" v-on:click="saveHoras(planilla.id)" class="btn btn-primary pull-right">
                                                <span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span>
                                                Guardar
                                            </button>
                                        </div>
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
    import {BASE_URL} from '../../config.js'
    import HorasEntrada from './HorasEntrada.vue'
    import HorasLaboradas from './HorasLaboradas.vue'

    export default {
        /*
         * The component's data.
         */
        data() {
            return {
                REMOVE_HOST_REGEXP: /^(https?\:)\/\/(([^:\/?#]*)(?:\:([0-9]+))?)([\/]{0,1}[^?#]*)(\?[^#]*|)(#.*|)$/,
                planillas: [],
                planillas_for_filter: [],
                current_planilla_filter: '',
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
                eventHub: new Vue(),
                isSaving: false,
            };
        },
        props: ['user', 'days_ago'],

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
                // Selectores
                this.getCuentasCosto();
                this.getBeneficios();
                this.getCuentasBeneficios();

                // Planillas
                this.getPlanillas();
                this.getPlanillasFilter();

                var vm = this;
                vm.eventHub.$on('horas.saveCompleted', function() {
                    setTimeout(function() {
                        vm.isSaving = false;
                    }, 300);
                });
            },

            /**
             * Get all of the planillas for the user.
             */
            getPlanillas() {
                var params = $.param(this.default_paginate_options);
                var url = BASE_URL + 'api/planillas?' + params;
                this.runGetPlanillasRequest(url);
            },

            prepareUrl(url) {
                if (url) {
                    var match = url.match(this.REMOVE_HOST_REGEXP);
                    return match[5] + match[6];
                }
                return undefined;
            },

            runGetPlanillasRequest(url) {
                this.$http.get(url).then(response => {
                    this.last_page = response.body.last_page;
                    this.total = this.last_page;
                    this.planillas = response.body.data;
                    this.next_url = this.prepareUrl(response.body.next_page_url);
                    this.prev_url = this.prepareUrl(response.body.prev_page_url);

                    var vm = this;
                    vm.eventHub.$on('horas_laboradas.delete', function(planilla_id, id) {
                        var planilla = _.find(vm.planillas, function(planilla) {
                            return planilla.id === planilla_id;
                        });
                        planilla.horas_laboradas = _.filter(planilla.horas_laboradas, function(hora) {
                            return hora.id !== id;
                        });
                    });
                });
            },

            togglePlanillaView(event) {
                var $element = $(event.currentTarget);
                $element.next().toggleClass('hidden');
                $element.find('i').toggleClass('hidden');

                $('.admin-view').css('width', $('.planillas-container').width() - 45);
            },

            getCuentasCosto() {
                if (!this.cuentas_costo.length) {
                    var vm = this;
                    this.$http.get(BASE_URL + 'api/cuentas_costo').then(response => {
                        Vue.set(vm, 'cuentas_costo', response.data);
                    });
                }
            },

            getBeneficios() {
                if (!this.beneficios.length) {
                    var vm = this;
                    this.$http.get(BASE_URL + 'api/beneficios').then(response => {
                        Vue.set(vm, 'beneficios', response.data);
                    });
                }
            },

            getCuentasBeneficios() {
                if (!this.cuentas_beneficios.length) {
                    var vm = this;
                    this.$http.get(BASE_URL + 'api/cuentas_beneficios').then(response => {
                        Vue.set(vm, 'cuentas_beneficios', response.data);
                    });
                }
            },

            sortBy(key) {
                $('.horas-container').addClass('hidden');
                this.checkSortDirection(key);
                this.sortKey = key;
                this.default_paginate_options.sort_key = this.sortKey;
                var params = $.param(this.default_paginate_options);
                var url = BASE_URL + 'api/planillas?' + params +  '&page=' + this.currentPage;
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
                var url = BASE_URL + 'api/planillas?' + params;
                this.runGetPlanillasRequest(url);
            },

            viewPage(page) {
                this.currentPage = page;
                var params = $.param(this.default_paginate_options) + '&page=' + page;
                var url = BASE_URL + 'api/planillas?' + params;
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
            },

            filterPlanillasByCodigo(event) {
                var codigo = $(event.currentTarget).val();
                this.default_paginate_options.codigo = codigo;
                var params = $.param(this.default_paginate_options);
                var url = BASE_URL + 'api/planillas?' + params;
                this.runGetPlanillasRequest(url);
            },

            filterPlanillasByText: _.debounce(function(event) {
                var text = $(event.target).val();
                this.default_paginate_options.text = text;
                var params = $.param(this.default_paginate_options);
                var url = BASE_URL + 'api/planillas?' + params;
                this.runGetPlanillasRequest(url);
            }, 300),

            getPlanillasFilter() {

                if (!this.planillas_for_filter.length) {
                    var vm = this;
                    this.$http.get(BASE_URL + 'api/planillas/filters').then(response => {
                        vm.planillas_for_filter = _.uniq(_.map(response.body.data, function(planilla) {
                            return planilla.codigo;
                        }));
                    });
                }
            },

            saveHoras(planilla_id) {
                this.isSaving = true;
                this.eventHub.$emit('horasEntrada.save' + planilla_id);
                this.eventHub.$emit('horasLaboradas.save' + planilla_id);
            },

            isAdmin() {
                return this.user.rol === 'admin';
            }
        },

        components: {
            horasEntrada: HorasEntrada,
            horasLaboradas: HorasLaboradas
        },
    }
</script>
