<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShowAddress extends Controller
{
    public function __invoke(int $id)
    {
        $address = [
            'postalCode' => 'halo',
            'street' => 'kowalskiego',
            'houseNumber' => '15',
            'flatNumber' =>'yes'
        ];

        return view('user.address',[
            'address' => $address
        ]);
    }
}
