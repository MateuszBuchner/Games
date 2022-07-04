<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function list(Request $request){

        $users = [];
        for ($i = 0; $i < 10; $i++){
            $users[] = [
                'id' => '2',
                'name' => 'grzesiu'
            ];
        }

        $session = $request -> session();
        $session -> put('prevAction', __METHOD__ . ':' . time());

        return view('user.list',[
            'users' => $users
        ]);
    }

    public function show(Request $request, int $userId){

        $prevAction = $request -> session()-> get('prevAction');
        dump($prevAction);

        $user = [
            'id' => $userId,
            'name' => $name = "Snax",
            'firstName' => $firstName = "Janusz",
            'lastName' => $lastName = "Pogo",
            'city' => $city = "Krakow",
            'age' => $age = "11",
            'html' => '<b>Bold Html</b>'
        ];

        return view('user.show', [
            'user' => $user
        ]);
    }
}
