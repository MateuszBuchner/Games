<?php

namespace App\Http\Controllers\Game;

use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class BuilderController extends Controller
{

    public function index(): View
    {
        $games = DB::table('games')
            ->join('genres', 'games.genre_id', '=', 'genres.id')
            ->select('games.id','games.title','games.score','genres.id as genre_id','genres.name as genres_name')
            ->orderBy('score','desc')
            ->paginate(10);

        return view('game.builder.list', [
            'games' => $games

        ]);
    }

    public function dashboard(): View
    {
        $bestGames = DB::table('games')
            ->join('genres', 'games.genre_id', '=', 'genres.id')
            ->select('games.id','games.title','games.score','genres.id as genre_id','genres.name as genres_name')
            ->where('score','>',9)
            ->get();

        $stats = [
            'count' => DB::table('games')->count(),
            'countScoreFift' => DB::table('games')->where('score', '>', 9)->count(),
            'max' => DB::table('games')->max('score'),
            'min' => DB::table('games')->min('score'),
            'avg' => DB::table('games')->avg('score'),
        ];

        $scoreStats = DB::table('games')
            ->select(DB::raw('count(*) as count'), 'score')
            ->having('score', '>','6')
            ->groupBy('score')
            ->orderBy('score', 'desc')
            ->get();


        return view('game.builder.dashboard', [
            'stats' => $stats,
            'bestGames' => $bestGames,
            'scoreStats' => $scoreStats
        ]);
    }

    public function show(int $gameID): View
    {
        $game = DB::table('games')->find($gameID);
        return view('game.builder.show', [
            'game' => $game
        ]);
    }

}
