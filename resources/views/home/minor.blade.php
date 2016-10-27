@extends('layouts.app')

@section('title', 'Minor page')

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="text-center m-t-lg">
                    <h1>
                        Simple example of second view
                    </h1>
                    <small>Writen in minor.blade.php file.</small>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <passport-clients></passport-clients>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <passport-authorized-clients></passport-authorized-clients>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <passport-personal-access-tokens></passport-personal-access-tokens>
            </div>
        </div>
    </div>
@endsection
