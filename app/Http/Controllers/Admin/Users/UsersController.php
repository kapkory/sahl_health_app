<?php

namespace App\Http\Controllers\Admin\Users;

use App\Models\Core\Order;
use App\Repositories\SearchRepo;
use App\Repositories\StatusRepository;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    /**
     *  view all the members
     */
    public function index(){
        return view($this->folder.'index',[

        ]);
    }

    public function listUsers($role)
    {
        $users = User::where('role',$role);
        if (\request('all'))
            return $users->get();
        return SearchRepo::of($users)
            ->addColumn('action', function ($user) {
                $str = '';
                $json = json_encode($user);
                $str.='<a href="#" data-model="'.htmlentities($json, ENT_QUOTES, 'UTF-8').'" onclick="prepareEdit(this,\'add_user\');" class="btn badge btn-info btn-sm"><i class="fa fa-edit"></i> Edit</a>';
                $str .= '&nbsp;&nbsp;<a href="' . url('admin/users') . '/user/' . $user->id . '"  class="btn badge btn-outline-dark btn-sm load-page"><i class="fa fa-eye"></i> view</a>';
                $str.='&nbsp;&nbsp;<a href="#" onclick="deleteItem(\''.url(request()->user()->role.'/users/user/delete').'\',\''.$user->id.'\');" class="btn badge btn-outline-danger btn-sm"><i class="fa fa-trash"></i> Delete</a>';
                return $str;
            })->make();
    }
}
