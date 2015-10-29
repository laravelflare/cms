<?php

namespace LaravelFlare\Cms\Http\Controllers;

use Illuminate\Contracts\Auth\Guard;
use LaravelFlare\Flare\Admin\AdminManager;
use Illuminate\Foundation\Bus\DispatchesJobs;
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

        $this->middleware('checkslugexists', ['only' => ['route']]);

        $this->auth = $auth;
    }

    /**
     * Homepage View
     * 
     * @return \Illuminate\View\View
     */
    public function homepage()
    {
        return view('flare::cms.index', []);
    }

    /**
     * Homepage View
     *
     * @param string $slug
     * 
     * @return \Illuminate\View\View
     */
    public function route($slug)
    {
        return view('flare::cms.default', ['model' => \App::make('modelFromSlug')]);
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
