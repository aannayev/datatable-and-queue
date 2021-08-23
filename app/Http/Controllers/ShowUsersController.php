<?php

namespace App\Http\Controllers;

use App\DataTables\UsersDataTable;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShowUsers extends Controller
{


    public function index()
    {


        $names = User::all();
        // $users = DB::table('users')->get();

        return view('data', compact('names'));
    }


    public function getUsers(UsersDataTable $dataTable)
    {
        return $dataTable->render('get.users');
    }

    //
}
