@extends('layouts.app')

@section('content')
    <div class="container" style="margin-top: 2%;">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" style="background: #085396; color:white;"><h5>Uredi blog</h5></div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('blogs.update', $blog->id) }}">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="tematika" style="font-size:17px; color:black;">Tematika</label>
                                <input type="text" class="form-control" id="tematika" name="tematika" value="{{ $blog->tematika}}" required>
                            </div>
                            
                            <br>

                            <div class="form-group">
                                <label for="naslov" style="font-size:17px; color:black;">Naslov</label>
                                <input type="text" class="form-control" id="naslov" name="naslov" value="{{ $blog->naslov }}" required>
                            </div>

                            <br>

                            <div class="form-group">
                                <label for="sadrzaj" style="font-size:17px; color:black;">Sadržaj</label>
                                <textarea class="form-control" id="sadrzaj" name="sadrzaj" required>{{ $blog->sadrzaj }}</textarea>
                            </div>

                            <br>

                            <button type="submit" class="btn btn-primary" style="background:#085396;">Spremi</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        .card-body{
            background: #668FB4;
        }
        .form-control {
            font-size: 15px;
        }

        textarea.form-control {
            font-size: 15px; 
        }

    </style>
@endsection
