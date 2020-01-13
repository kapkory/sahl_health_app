<?php

namespace App\Http\Controllers\Member\Institutions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Core\FavoriteInstitution;
use App\Repositories\SearchRepo;
use Illuminate\Support\Facades\Schema;

class FavoriteController extends Controller
{
            /**
         * return favoriteinstitution's index view
         */
    public function index(){
        return view($this->folder.'index',[

        ]);
    }

    /**
     * store favoriteinstitution
     */
    public function storeFavoriteInstitution($institution_id){
        $count = FavoriteInstitution::where('user_id',auth()->id())->count();

        if ($count> 3){
            return redirect('member')->with('notice',['type'=>'error','message'=>'You can have a maximum of 3 favorite hospitals']);
        }
        $favorite_inst = new FavoriteInstitution();
        $favorite_inst->institution_id = $institution_id;
        $favorite_inst->user_id = request()->user()->id;
        $favorite_inst->status = 1;
        $favorite_inst->save();

        return redirect()->back();
    }

    /**
     * return favoriteinstitution values
     */
    public function listFavoriteInstitutions(){
        $favoriteinstitutions = FavoriteInstitution::where([
            ['id','>',0]
        ]);
        if(\request('all'))
            return $favoriteinstitutions->get();
        return SearchRepo::of($favoriteinstitutions)
            ->addColumn('action',function($favoriteinstitution){
                $str = '';
                $json = json_encode($favoriteinstitution);
                $str.='<a href="#" data-model="'.htmlentities($json, ENT_QUOTES, 'UTF-8').'" onclick="prepareEdit(this,\'favoriteinstitution_modal\');" class="btn badge btn-info btn-sm"><i class="fa fa-edit"></i> Edit</a>';
                $str.='&nbsp;&nbsp;<a href="#" onclick="deleteItem(\''.url(request()->user()->role.'/favoriteinstitutions/delete').'\',\''.$favoriteinstitution->id.'\');" class="btn badge btn-outline-danger btn-sm"><i class="fa fa-trash"></i> Delete</a>';
                return $str;
            })->make();
    }

    /**
     * delete favoriteinstitution
     */
    public function destroyFavoriteInstitution($favoriteinstitution_id)
    {
        $favoriteinstitution = FavoriteInstitution::findOrFail($favoriteinstitution_id);
        $favoriteinstitution->delete();
        return redirect()->back()->with('notice',['type'=>'success','message'=>'FavoriteInstitution deleted successfully']);
    }
}
