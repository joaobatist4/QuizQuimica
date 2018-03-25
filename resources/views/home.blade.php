@extends('layouts.principal')

@section('content')
<div class="container">
    <div class="row justify-content-left">
        <div class="col-md-8">
            <h1 class="font-weight-light">Bem vindo(a), {{ Auth::user()->name }}!</h1>
        </div>
    </div>
</div>
@endsection
