<?php

namespace App\Http\Controllers;

use App\Repositories\ModelSaverRepository;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    protected $folder = "";

    function __construct()
    {
        $class = get_class($this);
        $class = str_replace('App\\Http\\Controllers\\', "", $class);
        $arr = explode('\\', $class);
        unset($arr[count($arr) - 1]);
        $folder = implode('.', $arr) . '.';

        $this->folder = 'core.' . strtolower($folder);
    }

    function saveModel($data)
    {
        $model_saver = New ModelSaverRepository();
        $model = $model_saver->saveModel($data);
        return $model;
    }

    function autoSaveModel($data)
    {
        $model_saver = New ModelSaverRepository();
        $model = $model_saver->saveModel($data);
        return $model;
    }

    function getValidationFields($fillables = null)
    {
        $data = request()->all();
        if ($fillables) {
            $fillables = $fillables;
        } else {
            $model = new $data['form_model']();
            $fillables = $model->getFillable();
        }
        $validation_array = [];
        foreach ($fillables as $field) {
            $validation_array[$field] = 'required';
        }
        if (in_array("file", $fillables)) {
            $validation_array['file'] = 'required|max:50000';
        }

        if (in_array("phone_number", $fillables)) {
            $validation_array['phone_number'] = 'required|min:10|max:13';
        }

        $validation_array['id'] = '';
        $validation_array['form_model'] = '';
        return $validation_array;
    }

    public function bytesToHuman($bytes)
    {
        $units = ['B', 'KiB', 'MiB', 'GiB', 'TiB', 'PiB'];

        for ($i = 0; $bytes > 1024; $i++) {
            $bytes /= 1024;
        }

        return round($bytes, 2) . ' ' . $units[$i];
    }
    function searchMultDimArray($array_data, $index, $value)
    {
        foreach ($array_data as $key => $data) {
            // return the matched array key if found
            if ($data[$index] === $value)
                return $key;
        }
        return -1;
    }
}
