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
        <div class="row" style="margin-bottom: 20px">
            <div class="col-xs-12 text-right">
                <a href="#" class="btn btn-primary" v-on:click="newFeriado = {fecha: ''}"  data-toggle="modal" data-target="#add-feriado"><i class="fa fa-plus"></i> Nuevo Dia Feriado</a>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-body">
                <table class="table table-borderless m-b-none" v-if="feriados.length > 0">
                    <thead>
                    <tr>
                        <th
                                v-on:click="sortBy('fecha')"
                                v-bind:class="{active: sortKey == 'fecha', up: sortDirection == 'asc', down: sortDirection == 'desc'}">
                            Fecha Feriada
                            <span class="pull-right glyphicon glyphicon-sort" aria-hidden="true"></span>
                            <span class="pull-right glyphicon glyphicon-sort-by-alphabet" aria-hidden="true"></span>
                            <span class="pull-right glyphicon glyphicon-sort-by-alphabet-alt" aria-hidden="true"></span>
                        </th>
                        <th>
                            Acciones
                        </th>
                    </tr>
                    </thead>

                    <tbody>
                        <tr v-for="feriado in feriados">

                            <!-- Name -->
                            <td style="vertical-align: middle;"
                                v-bind:id="feriado.id">
                                {{ feriado.fecha | date_readable }}
                            </td>
                            <td>
                                <div class="btn-group">
                                    <div class="btn btn-default" v-on:click="currentFeriado = _.clone(feriado)" data-toggle="modal" data-target="#edit-feriado"><i class="fa fa-pencil"></i></div>
                                    <div class="btn btn-default" v-on:click="deleteFeriado(feriado.id)"><i class="fa fa-trash"></i></div>
                                </div>
                            </td>
                        </tr>
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

        <!-- Start edit modal -->
        <div class="modal inmodal fade" id="edit-feriado" tabindex="-1" role="dialog"  aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <form>
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span></button>
                            <h4 class="modal-title">Editar Feriado</h4>
                        </div>
                        <div class="modal-body">
                            <div class="form-group date">
                                <label for="fecha">Fecha</label>
                                <input type="text" class="form-control" id="fecha" name="fecha" placeholder="Selecciona la fecha feriada" v-model="currentFeriado.fecha" v-bind:value="currentFeriado.fecha" data-provide="datepicker" data-date-format="mm-dd">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-white" data-dismiss="modal">Cerrar</button>
                            <button type="button" class="btn btn-primary" v-on:click="currentFeriado.fecha && updateFeriado()" v-bind:class="{ disabled: !currentFeriado.fecha }"><i class="fa fa-floppy-o"></i> Guardar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!--End edit modal-->

        <!--Start add modal-->
        <div class="modal inmodal fade" id="add-feriado" tabindex="-1" role="dialog"  aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <form>
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <h4 class="modal-title">Nuevo Feriado</h4>
                        </div>
                        <div class="modal-body">
                            <div class="form-group date">
                                <label for="fecha">Fecha</label>
                                <input type="text" class="form-control" id="fecha" name="fecha" placeholder="Selecciona la fecha feriada" v-model="newFeriado.fecha" v-bind:value="newFeriado.fecha" data-provide="datepicker" data-date-format="mm-dd">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-white" data-dismiss="modal">Cerrar</button>
                            <button type="button" class="btn btn-primary" v-on:click="newFeriado.fecha && saveFeriado()" v-bind:class="{ disabled: !newFeriado.fecha }"><i class="fa fa-floppy-o"></i> Guardar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!--End create modal-->
    </div>
</template>

<script>
    import {BASE_URL} from '../../config.js'

    export default {
        /*
         * The component's data.
         */
        data() {
            return {
                REMOVE_HOST_REGEXP: /^(https?\:)\/\/(([^:\/?#]*)(?:\:([0-9]+))?)([\/]{0,1}[^?#]*)(\?[^#]*|)(#.*|)$/,
                feriados: [],
                default_paginate_options: {
                    sort_key: 'fecha',
                },
                currentPage: 1,
                total: 0,
                sortKey: 'id',
                sortDirection: 'asc',
                next_url: '',
                prev_url: '',
                eventHub: new Vue(),
                isSaving: false,
                currentFeriado: {},
                newFeriado: {
                    fecha: ''
                },
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

        filters: {
            date_readable: function (value) {
                if (!value) return '';
                value = moment(new Date(value)).utc().format('D [de] MMMM');
                return value;
            }
        },

        methods: {
            /**
             * Prepare the component.
             */
            prepareComponent() {
                // Feriados
                this.getFeriados();

                var vm = this;
                vm.eventHub.$on('feriados.saveCompleted', function() {
                    setTimeout(function() {
                        vm.isSaving = false;
                    }, 300);
                });

                $('#edit-feriado').on('hidden.bs.modal', function (e) {
                    vm.currentFeriado = {};
                });

                $('#add-feriado .date input').on("changeDate", function() {
                    vm.newFeriado.fecha = $(this).val();
                })

                $('#edit-feriado .date input').on("changeDate", function() {
                    vm.currentFeriado.fecha = $(this).val();
                })
            },

            /**
             * Get all feriados days
             */
            getFeriados() {
                var params = $.param(this.default_paginate_options);
                var url = BASE_URL + 'api/feriados?' + params;
                this.runGetFeriadosRequest(url);
            },

            prepareUrl(url) {
                if (url) {
                    var match = url.match(this.REMOVE_HOST_REGEXP);
                    return match[5] + match[6];
                }
                return undefined;
            },

            runGetFeriadosRequest(url) {
                this.$http.get(url).then(response => {
                    this.last_page = response.body.last_page;
                    this.total = this.last_page;
                    this.feriados = response.body.data;
                    this.next_url = this.prepareUrl(response.body.next_page_url);
                    this.prev_url = this.prepareUrl(response.body.prev_page_url);
                });
            },

            sortBy(key) {
                $('.horas-container').addClass('hidden');
                this.checkSortDirection(key);
                this.sortKey = key;
                this.default_paginate_options.sort_key = this.sortKey;
                var params = $.param(this.default_paginate_options);
                var url = BASE_URL + 'api/feriados?' + params +  '&page=' + this.currentPage;
                this.runGetFeriadosRequest(url);
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
                this.getFeriados();
            },

            lastPage() {
                this.currentPage = this.last_page;
                var params = $.param(this.default_paginate_options) + '&page=' + this.last_page;
                var url = BASE_URL + 'api/feriados?' + params;
                this.runGetFeriadosRequest(url);
            },

            viewPage(page) {
                this.currentPage = page;
                var params = $.param(this.default_paginate_options) + '&page=' + page;
                var url = BASE_URL + 'api/feriados?' + params;
                this.runGetFeriadosRequest(url);
            },

            nextPage() {
                var params = $.param(this.default_paginate_options);
                if (this.next_url) {
                    this.currentPage++;
                    var url = this.next_url + '&' + params;
                    this.runGetFeriadosRequest(url);
                }
            },

            prevPage() {
                var params = $.param(this.default_paginate_options);
                if (this.prev_url) {
                    this.currentPage--;
                    var url = this.prev_url + '&' + params;
                    this.runGetFeriadosRequest(url);
                }
            },

            saveFeriado() {
                var vm = this;
                var feriado = vm.newFeriado;
                if (!vm.newFeriado.fecha) {
                    return;
                }
                var url = BASE_URL + 'api/feriados/';
                this.$http.post(url, feriado).then(response => {
                    console.log(response);
                    if (response.status === 200 && response.ok) {
                        vm.getFeriados();
                        $('#add-feriado').modal('hide')
                    }
                    vm.newFeriado = {};
                    toastr.success('Fecha creada exitosamente','Excelente!');
                }).catch(response => {
                    if (response.status === 409 && !response.ok) {
                        toastr.error('La fecha ya se encuentra registrada','Error!');
                    }
                });
            },

            updateFeriado() {
                var vm = this;
                var feriado = vm.currentFeriado;
                if (!vm.currentFeriado.fecha) {
                    return;
                }
                var url = BASE_URL + 'api/feriados/' + feriado.id;
                this.$http.put(url, feriado).then(response => {
                    console.log(response);
                    if (response.status === 200 && response.ok) {
                        vm.getFeriados();
                        $('#edit-feriado').modal('hide')
                    }
                    vm.curretFeriado = {};
                    toastr.success('Fecha actualizada exitosamente','Excelente!');
                }).catch(response => {
                    if (response.status === 409 && !response.ok) {
                        toastr.error('La fecha ya se encuentra registrada','Error!');
                    }
                });
            },

            deleteFeriado(id) {
                var vm = this;
                var feriado = vm.currentFeriado;
                if (!id) {
                    return;
                }
                var url = BASE_URL + 'api/feriados/' + id;
                if (confirm('Esta seguro?')) {
                    this.$http.delete(url, feriado).then(response => {
                        console.log(response);
                        if (response.status === 200 && response.ok) {
                            vm.getFeriados();
                        }
                        toastr.success('Fecha eliminada exitosamente','Excelente!');
                    }).catch(response => {
                        if (response.status === 409 && !response.ok) {
                            toastr.error('La fecha no pudo ser eliminada', 'Error!');
                        }
                    });
                }
            }
        },
    }
</script>
