@extends('layouts.layout')

@section('form')
    <div class="container my-3 bg-light rounded-5 w-50">
        <h1 class="text-center">@yield('form-title')</h1>
        <hr class="border-3 border-top border-dark">
        <div class="form-inline justify-content-center">
            <form method="POST" action="{{htmlspecialchars($_SERVER['PHP_SELF'])}}">
                @yield('form-content')
            </form>
        </div>
    </div>
@endsection