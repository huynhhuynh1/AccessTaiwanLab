<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $response = Http::retry(3, 100)
            ->accept('application/vnd.github+json')
            ->withToken($token)
            ->get('https://api.github.com/users', [
            'per_page' => $per_page
        ]);
        //$response->throw()->json();
        if($response->getStatusCode() == 200) {
            $data = json_decode($response->getBody()->getContents());
            $this->storeUsers($data);
            return response()->json(
                ['users' => $data]
            );
        }

        return response([
            'message' => 'invalid token'
        ]);
    }

    public function getUserByUsername($username)
    {
        $token = env('TOKEN_GITHUB');
        $response = Http::retry(3, 100)
            ->accept('application/vnd.github+json')
            ->withToken($token)
            ->get('https://api.github.com/users/'.$username);
        //$response->throw()->json();
        if($response->getStatusCode() == 200) {
            $user = json_decode($response->getBody()->getContents());
            $this->updateUser($username, $user);
            return response()->json(
                ['user' => $user]
            );
        }

        return response([
            'message' => 'invalid token'
        ]);
    }

    public function storeUsers($data) 
    {
        $users = User::all();
        // if exit data from databse not save
        if(count($users) < count($data)) {
            DB::table('users')->truncate();
            foreach($data as $value) {
                $user = new User();
                $user->login = $value->login;
                $user->avatar_url = $value->avatar_url;
                $user->type = $value->type;
                $user->site_admin = $value->site_admin;
                $user->save();
            }
        }
    }

    public function updateUser($login, $data)
    {
        $user = User::where('login', $login)->first();
        $user->name = $data->name;
        $user->email = $data->email;
        $user->avatar_url = $data->avatar_url;
        $user->type = $data->type;
        $user->site_admin = $data->site_admin;
        $user->company = $data->company;
        $user->blog = $data->blog;
        $user->location = $data->location;
        $user->bio = $data->bio;
        $user->twitter_username = $data->twitter_username;
        $user->public_repos = $data->public_repos;
        $user->followers = $data->followers;
        $user->following = $data->following;
        $user->save();
    }
}
