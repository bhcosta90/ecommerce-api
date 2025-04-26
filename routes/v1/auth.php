<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('login', function(Request $request){
    if(\Illuminate\Support\Facades\Auth::attempt($request->only('email', 'password'))){
        return [
            'data' => [
                'token' => auth()->user()->createToken($request->email)->plainTextToken,
            ]
        ];
    }
});
