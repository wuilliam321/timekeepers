@extends('layouts.app')
@section('title', 'Listado de Planillas')
@section('content')
    <div class="row wrapper border-bottom white-bg page-heading planillas-heading">
        <div class="col-lg-10">
            <h2>Listado de Planillas</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="/">Home</a>
                </li>
                <li class="active">
                    <strong>Planillas</strong>
                </li>
            </ol>
        </div>
        <div class="col-lg-2">

        </div>
    </div>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <planillas-index v-bind:days_ago="{{$days_ago}}" v-bind:user="{{Auth::user()}}"></planillas-index>
            </div>
        </div>
    </div>
@endsection

