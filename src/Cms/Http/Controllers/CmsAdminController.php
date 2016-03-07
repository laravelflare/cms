<?php

namespace LaravelFlare\Cms\Http\Controllers;

use LaravelFlare\Flare\Admin\AdminManager;
use LaravelFlare\Pages\Http\Requests\PageEditRequest;
use LaravelFlare\Pages\Http\Requests\PageCreateRequest;
use LaravelFlare\Flare\Admin\Modules\ModuleAdminController;

class CmsAdminController extends ModuleAdminController
{
    /**
     * Admin Instance.
     * 
     * @var 
     */
    protected $admin;

    /**
     * __construct.
     * 
     * @param AdminManager $adminManager
     */
    public function __construct(AdminManager $adminManager)
    {
        // Must call parent __construct otherwise 
        // we need to redeclare checkpermissions
        // middleware for authentication check
        parent::__construct($adminManager);

        $this->admin = $this->adminManager->getAdminInstance();
    }

    /**
     * Index Page for Module.
     *
     * Lists the current pages in the system.
     * 
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
        return view('flare::admin.cms.index', [
                                                    // 'pages' => Page::paginate(),
                                                    // 'totals' => [
                                                    //     'all' => Page::get()->count(),
                                                    //     'with_trashed' => Page::withTrashed()->get()->count(),
                                                    //     'only_trashed' => Page::onlyTrashed()->get()->count(),
                                                    // ],
                                            ]
                                        );
    }

    /**
     * Method is called when the appropriate controller
     * method is unable to be found or called.
     * 
     * @param array $parameters
     * 
     * @return
     */
    public function missingMethod($parameters = array())
    {
        parent::missingMethod();
    }
}
