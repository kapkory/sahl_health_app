<?php

namespace App\Providers;

use App\Repositories\FormRepository;
use Illuminate\Support\ServiceProvider;
use Form;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Form::macro('autoForm', function($elements,$action,$classes = [],$model=null)
        {
            $model_form = null;
            if(!is_array($elements)){
                $model_form = $elements;
                $elements = new $elements();
                $elements = $elements->getfillable();
                $elements['form_model'] = $model_form;
            }
            $formRepository = new FormRepository();
            return $formRepository->autoGenerate($elements,$action,$classes,$model);
        });
    }
}
