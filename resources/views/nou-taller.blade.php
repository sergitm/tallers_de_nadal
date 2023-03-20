@extends('layouts.form')

@section('title', 'Nou Taller')
@section('form-title', 'Proposa un nou taller')

@section('navbar')
@parent
@endsection

@section('form-content')
<div class="container">
    <div class="form-group my-3">
        <label class="fw-bold" for="codi">Codi:</label>
        <input type="text" class="form-control" name="codi" readonly>
    </div>
    <div class="form-group my-3">
        <label class="fw-bold" for="nom">Nom:</label>
        <input type="text" class="form-control" name="nom" readonly>
    </div>
    <div class="form-group my-3">
        <label class="fw-bold" for="proposat">Proposat per:</label>
        <input type="text" class="form-control" name="proposat" readonly>
    </div>
    <div class="form-group my-3">
        <label class="fw-bold" for="descripcio">Descripció:</label>
        <textarea class="form-control" name="descripcio" rows=4></textarea>
    </div>
    <div class="form-group my-3">
        <label class="fw-bold" for="material">Material:</label>
        <textarea class="form-control" name="material"></textarea>
    </div>
    <div class="form-group my-3">
        <label class="fw-bold" for="observacions">Observacions:</label>
        <textarea class="form-control" name="observacions" rows="3"></textarea>
    </div>
    <div class="form-group my-3">
        <label class="fw-bold">Adreçat a:</label>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="adresat" value="1-ESO" id="1-ESO">
            <label class="form-check-label" for="1-ESO">
                1er ESO
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="adresat" value="2-ESO" id="2-ESO">
            <label class="form-check-label" for="2-ESO">
                2n ESO
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="adresat" value="3-ESO" id="3-ESO">
            <label class="form-check-label" for="3-ESO">
                3er ESO
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="adresat" value="4-ESO" id="4-ESO">
            <label class="form-check-label" for="4-ESO">
                4rt ESO
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="adresat" value="1-SMX" id="1-SMX">
            <label class="form-check-label" for="1-SMX">
                1er SMX
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="adresat" value="1-FPB" id="1-FPB">
            <label class="form-check-label" for="1-FPB">
                1er FPB
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="adresat" value="2-FPB" id="2-FPB">
            <label class="form-check-label" for="2-FPB">
                2n FPB
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="adresat" value="1-BAT" id="1-BAT">
            <label class="form-check-label" for="1-BAT">
                1er BAT
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="adresat" value="2-BAT" id="2-BAT">
            <label class="form-check-label" for="2-BAT">
                2n BAT
            </label>
        </div>
    </div>
    <div class="container d-flex justify-content-between">
        <input type="button" class="btn btn-danger mb-3" value="Esborrar">
        <input type="submit" class="btn btn-success mb-3" value="Enviar">
    </div>
    <div class="container d-flex justify-content-between">
        <a class="btn btn-dark align-self-center mb-3" href="{{route('home')}}">Tornar</a>
    </div>
</div>
@endsection
