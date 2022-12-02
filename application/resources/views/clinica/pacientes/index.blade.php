@extends('clinica.layouts.index')

@section('title', 'Pacientes')

@section('search-label', 'Pesquisar pacientes')
@section('data-search', 'pacientes')

@section('btn-add-title','Adicionar paciente')
@section('btn-add-icon', 'person_add_alt_1')
@section('btn-add-route', route('clinica.pacientes.add'))

@section('container')
@include('clinica.pacientes.results')
@endsection

@section('form-sidenav')
@include('clinica.agendamentos.form')
@endsection
