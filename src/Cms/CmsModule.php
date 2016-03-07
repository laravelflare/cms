<?php

namespace LaravelFlare\Cms;

use LaravelFlare\Flare\Admin\Modules\ModuleAdmin;

class CmsModule extends ModuleAdmin
{
    /**
     * Admin Section Icon.
     *
     * Font Awesome Defined Icon, eg 'user' = 'fa-user'
     *
     * @var string
     */
    protected $icon = 'file-o';

    /**
     * Title of Admin Section.
     *
     * @var string
     */
    protected $title = 'Page';

    /**
     * The Controller to be used by the Pages Module.
     * 
     * @var string
     */
    protected $controller = '\LaravelFlare\Cms\Http\Controllers\CmsAdminController';
}
