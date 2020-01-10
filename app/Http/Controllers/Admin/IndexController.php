<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Core\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class IndexController extends Controller
{
    public function index(){
        $services = Storage::disk('local')->get('system/kmfl_services.json');
        $services = json_decode($services);
        foreach ($services->service as $service){

            $serv = new Service();
            $serv->name = $service->name;
            $serv->slug = Str::slug($service->name);
            $serv->user_id = 1;
            $serv->status = 1;
            $serv->organization_type_id = 1;
            $serv->save();
        }
        dd();
        return view($this->folder.'index');
    }
}
