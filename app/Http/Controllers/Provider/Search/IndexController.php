<?php

namespace App\Http\Controllers\Provider\Search;

use App\Http\Controllers\Controller;
use App\Models\Core\Dependant;
use App\User;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        return view($this->folder.'index');
    }

    public function searchMembers(){
        $search = \request('search');
        $users = User::leftJoin('profiles','profiles.user_id','=','users.id')
            ->where([
                ['users.role','=','member'],
                ['profiles.identification_number','=',$search],
            ])
            ->select("users.*")->get();
        if ($users->isEmpty())
            $users = User::leftJoin('profiles','profiles.user_id','=','users.id')
                ->where([
                    ['users.role','=','member'],
                    ['users.name','LIKE','%'.$search.'%'],
                ])
                ->select("users.*")->get();

        return $users;
    }
}
