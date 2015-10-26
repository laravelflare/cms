<?php

namespace LaravelFlare\Cms\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Guard;
use LaravelFlare\Flare\Admin\AdminManager;
use Illuminate\Foundation\Bus\DispatchesJobs;

abstract class CmsController extends FlareController
{
    use AuthenticatesAndResetsPasswords, DispatchesJobs;

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

        $this->auth = $auth;
    }
}
