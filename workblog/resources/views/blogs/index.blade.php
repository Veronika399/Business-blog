@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" style="background: #085396; color:white;"><h5>Popis blogova</h5></div>

                    <div class="card-body" style="background: #6FA8DC;">

                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if($blogs->isEmpty())
                            <p>Trenutno nema dostupnih blogova.</p>
                        @else
                            <ul class="list-group">
                                @foreach($blogs as $blog)
                                    <li class="list-group-item" style="border-radius: 5px; border-color: #0B345A; border-width:2.5px;">
                                        <a><h6>{{$blog->tematika}}</h6></a>
                                        <a href="{{ route('blogs.show', $blog->id) }}" class="ime"><h3>{{ $blog->naslov }}</h3></a>
                                        <div class="float-right">
                                            @if (Auth::check())
                                            <a href="{{ route('blogs.edit', $blog->id) }}" class="btn btn-sm btn-primary">Uredi</a>
                                            <form class="d-inline" method="POST" action="{{ route('blogs.destroy', $blog->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Jeste li sigurni da želite izbrisati ovaj blog?')">Izbriši</button>
                                            </form>
                                            @endif
                                        </div>
                                    </li>
                                    <br>
                                @endforeach
                               
                            </ul>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        .ime{text-decoration: none; color: #085396;} 
        .ime:visited {text-decoration: none;}
        .ime:hover {text-decoration: underline; color:#3D85C6;}
        .ime:active {text-decoration: underline; color:aquamarine;}
    </style>
@endsection
