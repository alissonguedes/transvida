@extends('app')

@section('styles')
@include('clinica.styles')
@endsection

@section('body')

	@yield('main')

@endsection

@section('scripts')
@include('authentication.scripts')
@endsection
