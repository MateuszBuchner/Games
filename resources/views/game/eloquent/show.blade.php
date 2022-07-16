@extends('layout.main')

@section('content')
    <div class="card">
        @if(!@empty($game))
        <h5 class="card-header">{{ $game->title }}</h5>
        <div class="card-body">
            <ul>
                <li>Id: {{ $game ->id }}</li>
                <li>Nazwa: {{ $game->title }}</li>
                <li>Wydawca: {{ $game->publisher }}</li>
                <li>Kategoria: {{ $game->genre->name }}</li>
                <li>
                    Opis:
                    <div>{{ $game->describe }}</div>
                </li>
            </ul>
            <a href="{{ route('games.b.list') }}" class="btn btn-light">lista</a>
        </div>
        @else
            <h5 class="card-header">Brak danych</h5>
        @endif
    </div>
@endsection
