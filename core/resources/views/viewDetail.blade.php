@extends('pages.layout.guest')
@section('title', $recipe->name )
@section('title-info', '')
@section('content')
@parent

@stop
@section('include_js')
<script type="text/javascript" src="{{ URL::asset('plugins/custom/viewDetail.js') }}"></script>
@stop