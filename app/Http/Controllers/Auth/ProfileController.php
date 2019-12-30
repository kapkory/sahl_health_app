<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Core\Profile;
use App\Repositories\SearchRepo;
use Illuminate\Support\Facades\Schema;

class ProfileController extends Controller
{
            /**
         * return profile's index view
         */
    public function index(){
        return view($this->folder.'index',[

        ]);
    }

    /**
     * store profile
     */
    public function storeProfile(){
        request()->validate($this->getValidationFields());
        $data = \request()->all();
        if(!isset($data['user_id'])) {
            if (Schema::hasColumn('profiles', 'user_id'))
                $data['user_id'] = request()->user()->id;
        }
        $this->autoSaveModel($data);
        return redirect()->back();
    }

    /**
     * return profile values
     */
    public function listProfiles(){
        $profiles = Profile::where([
            ['id','>',0]
        ]);
        if(\request('all'))
            return $profiles->get();
        return SearchRepo::of($profiles)
            ->addColumn('action',function($profile){
                $str = '';
                $json = json_encode($profile);
                $str.='<a href="#" data-model="'.htmlentities($json, ENT_QUOTES, 'UTF-8').'" onclick="prepareEdit(this,\'profile_modal\');" class="btn badge btn-info btn-sm"><i class="fa fa-edit"></i> Edit</a>';
                $str.='&nbsp;&nbsp;<a href="#" onclick="deleteItem(\''.url(request()->user()->role.'/profiles/delete').'\',\''.$profile->id.'\');" class="btn badge btn-outline-danger btn-sm"><i class="fa fa-trash"></i> Delete</a>';
                return $str;
            })->make();
    }

    /**
     * delete profile
     */
    public function destroyProfile($profile_id)
    {
        $profile = Profile::findOrFail($profile_id);
        $profile->delete();
        return redirect()->back()->with('notice',['type'=>'success','message'=>'Profile deleted successfully']);
    }
}
