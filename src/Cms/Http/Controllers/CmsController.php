<?php

namespace LaravelFlare\Cms\Http\Controllers;

use Illuminate\Contracts\Auth\Guard;
use LaravelFlare\Flare\Admin\AdminManager;
use Illuminate\Routing\Controller as BaseController;

class CmsController extends BaseController
{
    /**
     * __construct.
     */
    public function __construct()
    {
        $this->middleware('checkslugexists', ['only' => ['homepage', 'route']]);
    }

    /**
     * Homepage View.
     * 
     * @return \Illuminate\View\View
     */
    public function homepage()
    {
        $model = \App::make('modelFromSlug');

        return view($model->view(), ['model' => $model, lcfirst(class_basename($model)) => $model]);
    }

    /**
     * Route Slugs to Views.
     * 
     * @return \Illuminate\View\View
     */
    public function route()
    {
        $model = \App::make('modelFromSlug');
        
        return view($model->view(), ['model' => $model, lcfirst(class_basename($model)) => $model]);
    }

    /**
     * Method is called when the appropriate controller
     * method is unable to be found or called.
     * 
     * @param array $parameters
     * 
     * @return \Illuminate\Http\Response
     */
    public function missingMethod($parameters = array())
    {
        return view('flare::cms.404', []);
    }
}
