@extends('layout.main')

@section('content')
    <div class="row mt-3">
        <div class="card">
            <div class="card-header"><i class="fas fa-table mr-1"></i>Lista użytkowników</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Lp</th>
                                <th>ID</th>
                                <th>Tytuł</th>
                                <th>Ocena</th>
                                <th>Kategoria</th>
                                <th>Opcja</th>
                            </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Lp</th>
                                    <th>ID</th>
                                    <th>Tytuł</th>
                                    <th>Ocena</th>
                                    <th>Kategoria</th>
                                    <th>Opcja</th>
                                </tr>
                            </tfoot>
                            @foreach ($games ?? [] as $game)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $game->id }}</td>
                                    <td>{{ $game->title }}</td>
                                    <td>{{ $game->score }}</td>
                                    <td>{{ $game->genre->name }}</td>
                                    <td>
                                        <a href="{{ route('games.b.show', ['game' => $game ->id]) }}">Szczegóły</a>
                                    </td>
                                </tr>

                            @endforeach
                    </table>
                </div>
                {{ $games->links() }}
            </div>
        </div>
    </div>
@endsection





