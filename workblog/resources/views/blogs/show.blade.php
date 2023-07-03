@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="background: #085396; color:white;">
                        <h5>Odabrani blog</h5>
                    </div>
                    <div class="card-body">
                        <h6>{{ $blog->tematika }}</h6>
                        <hr style="color: #030326;">
                        <p style="font-size: 30px">{{ $blog->naslov }}</p>
                        <hr style="color: #030326;">
                        <p style="font-size: 18px">{{ $blog->sadrzaj }}</p>
                        @if (Auth::check())
                        <a href="{{ route('blogs.edit', $blog->id) }}" class="btn btn-primary" style="background:#085396;">Uredi</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
