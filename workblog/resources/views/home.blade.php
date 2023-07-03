@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="background: #085396; color:white;">{{ __('Obavijest o prijavi') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Ulogirani ste, kliknite na Poslovni blog i krenite u kreiranje bloga!
                    Sretno! ') }}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
