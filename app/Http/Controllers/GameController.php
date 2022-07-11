<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class GameController extends Controller
{

    public function index(): View
    {
        $games = DB::table('games')
            ->join('genres', 'games.genre_id', '=', 'genres.id')
            ->select('games.id','games.title','games.score','genres.id as genre_id','genres.name as genres_name')
            ->orderBy('score','desc')
            ->paginate(10);

        return view('game.list', [
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


        return view('game.dashboard', [
            'stats' => $stats,
            'bestGames' => $bestGames,
            'scoreStats' => $scoreStats
        ]);
    }

    public function show(int $gameID): View
    {
        $game = DB::table('games')->find($gameID);
        return view('game.show', [
            'game' => $game
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }




    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
