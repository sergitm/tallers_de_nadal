@extends('layouts.form')
 
@section('title', 'Login Page')
@section('form-title', 'Login Form')
 
@section('navbar')
    @parent
@endsection

@section('form-content')
    <div class="container">
        <div class="form-group row my-3">
            <label class="col-5 text-left form-label" for="email">Introdueix l'email del centre:</label>
            <input class="col form-control" type="text" name="email" id="email">
        </div>
        <div class="form-group row mb-3">
            <label class="col-5 text-left form-label" for="pwd">Contrasenya:</label>
            <input class="col form-control" type="password" name="pwd" id="pwd">
        </div>
        <div class="container d-flex justify-content-between">
            <a class="btn btn-dark align-self-center mb-3" href="{{route('welcome')}}">Tornar</a>
            <input type="submit" class="btn btn-dark align-self-center mb-3" name="entrar" value="Entra!">
        </div>
    </div>
@endsection