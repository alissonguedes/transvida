@extends('clinica.layouts.index')

@section('title', 'Médicos')

@section('search-label', 'Pesquisar medicos')
@section('data-search', 'medicos')

@section('btn-add-title','Adicionar medico')
@section('btn-add-route', route('clinica.medicos.add'))

@section('container')
{{-- @include('clinica.medicos.results') --}}
@endsection
