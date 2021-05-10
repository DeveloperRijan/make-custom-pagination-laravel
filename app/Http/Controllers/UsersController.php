<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Collection;


class UsersController extends Controller
{
    public function index(){
        $data = User::orderBy('created_at', 'DESC')->get();
		//$data = $data->groupBy('user_type'); even you can groupBy data then pass the data to function to make pagination.....
        $data = (new Collection($data))->paginate_build_by_developer_rijan(5);
        return view('users.index', compact('data'));
    }
}
