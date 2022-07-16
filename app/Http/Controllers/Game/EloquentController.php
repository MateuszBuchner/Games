<?php

namespace App\Http\Controllers\Game;

use App\Models\Game;
use Illuminate\View\View;
use App\Http\Controllers\Controller;
use App\Models\Genre;

class EloquentController extends Controller
{

    public function index(): View
    {

        $gameIds = [100, 99, 98, 97, 96];

        // foreach($gameIds as $gameId){
        //     $game = Game::find($gameId);
        //     $game->genre_id = '2';
        //     $game->save();
        // }

        Game::whereIn('id', $gameIds)
            ->update([
                'genre_id' => '1'
            ]);

        $games = Game::with('genre')
            ->orderBy('created_at')
            ->paginate(10);

        return view('game.eloquent.list', [
            'games' => $games

        ]);


    }

    public function dashboard(): View
    {
        $bestGames = Game::best()->get();

        $stats = [
            'count' => Game::count(),
            'countScoreFift' => Game::where('score', '>', 9)->count(),
            'max' => Game::max('score'),
            'min' => Game::min('score'),
            'avg' => Game::avg('score'),
        ];

        $scoreStats = Game::select(
                Game::raw('count(*) as count'), 'score'
            )
            ->having('score', '>','6')
            ->groupBy('score')
            ->orderBy('score', 'desc')
            ->get();


        return view('game.eloquent.dashboard', [
            'stats' => $stats,
            'bestGames' => $bestGames,
            'scoreStats' => $scoreStats
        ]);
    }

    public function show(int $gameID): View
    {
        $game = Game::find($gameID);

        return view('game.eloquent.show', [
            'game' => $game
        ]);
    }

}
