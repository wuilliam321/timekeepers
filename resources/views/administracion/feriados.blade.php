@extends('layouts.app')
@section('title', 'Administracion - Feriados')
@section('content')
    <div class="row wrapper border-bottom white-bg page-heading planillas-heading">
        <div class="col-lg-10">
            <h2>D&iacute;as Feriados</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="/">Home</a>
                </li>
                <li>
                    <span>Administraci&oacute;n</span>
                </li>
                <li class="active">
                    <strong>Feriados</strong>
                </li>
            </ol>
        </div>
        <div class="col-lg-2">

        </div>
    </div>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <feriados-index></feriados-index>
            </div>
        </div>
    </div>
@endsection

