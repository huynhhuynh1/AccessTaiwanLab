<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class UserGithubController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }


    public function index(Request $request)
    {
        $per_page = $request->per_page;
        $token = env('TOKEN_GITHUB');
        $response = Http::retry(3, 100)->accept('application/vnd.github+json')->withToken($token)->get('https://api.github.com/users', [
            'per_page' => $per_page
        ]);
        //$response->throw()->json();
        if($response->getStatusCode() == 200) {
            return response()->json(
                ['users' => json_decode($response->getBody()->getContents())]
            );
        }

        return response([
            'message' => 'invalid token'
        ]);
    }

    public function getUserByUsername($username)
    {
        $token = env('TOKEN_GITHUB');
        $response = Http::retry(3, 100)->accept('application/vnd.github+json')->withToken($token)->get('https://api.github.com/users/'.$username);
        //$response->throw()->json();
        if($response->getStatusCode() == 200) {
            return response()->json(
                ['user' => json_decode($response->getBody()->getContents())]
            );
        }

        return response([
            'message' => 'invalid token'
        ]);
    }

}
