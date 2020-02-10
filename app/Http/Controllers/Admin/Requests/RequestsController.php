<?php

namespace App\Http\Controllers\Admin\Requests;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Core\Request as Requests;
use App\Repositories\SearchRepo;
use Illuminate\Support\Facades\Schema;

class RequestsController extends Controller
{
            /**
         * return request's index view
         */
    public function index(){
        return view($this->folder.'index',[

        ]);
    }

    /**
     * store request
     */
    public function storeRequest(){
        request()->validate($this->getValidationFields());
        $data = \request()->all();
        if(!isset($data['user_id'])) {
            if (Schema::hasColumn('requests', 'user_id'))
                $data['user_id'] = request()->user()->id;
        }
        $this->autoSaveModel($data);
        return redirect()->back();
    }

    /**
     * return request values
     */
    public function listRequests(){
        $requests = Requests::where([
            ['id','>',0]
        ]);

        if(\request('all'))
            return $requests->get();
        return SearchRepo::of($requests)
            ->addColumn('action',function($request){
                $str = '';
                $json = json_encode($request);
                $str.='<a href="#" data-model="'.htmlentities($json, ENT_QUOTES, 'UTF-8').'" onclick="prepareEdit(this,\'request_modal\');" class="btn badge btn-info btn-sm"><i class="fa fa-edit"></i> Edit</a>';
                $str.='&nbsp;&nbsp;<a href="#" onclick="deleteItem(\''.url(request()->user()->role.'/requests/delete').'\',\''.$request->id.'\');" class="btn badge btn-outline-danger btn-sm"><i class="fa fa-trash"></i> Delete</a>';
                return $str;
            })->make();
    }

    /**
     * delete request
     */
    public function destroyRequest($request_id)
    {
        $request = Request::findOrFail($request_id);
        $request->delete();
        return redirect()->back()->with('notice',['type'=>'success','message'=>'Request deleted successfully']);
    }
}
