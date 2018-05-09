@extends('layout.main')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                @include('license::settings.partials.email')
                @include('license::settings.partials.add_email')
            </div>
        </div>
    </div>

@stop
