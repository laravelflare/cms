<?php

namespace LaravelFlare\Cms\Http\Controllers;

use Illuminate\Contracts\Auth\Guard;
use LaravelFlare\Flare\Admin\AdminManager;
use LaravelFlare\Flare\Http\Controllers\FlareController;

class CmsController extends FlareController
{
    /**
     * Auth.
     * 
     * @var Guard
     */
    protected $auth;

    /**
     * __construct.
     * 
     * @param Guard        $auth
     * @param AdminManager $adminManager
     */
    public function __construct(Guard $auth, AdminManager $adminManager)
    {
        parent::__construct($adminManager);

        $this->middleware('checkslugexists', ['only' => ['homepage', 'route']]);

        $this->auth = $auth;
    }

    /**
     * Homepage View.
     * 
     * @return \Illuminate\View\View
     */
    public function homepage()
    {
        $model = \App::make('modelFromSlug');

        return view($model->view(), ['model' => $model]);
    }

    /**
     * Homepage View.
     * 
     * @return \Illuminate\View\View
     */
    public function route()
    {
        $model = \App::make('modelFromSlug');

        return view($model->view(), ['model' => $model]);
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
