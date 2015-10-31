<?php 

namespace LaravelFlare\Cms\Views;

trait ViewableModel
{
    /**
     * Model View
     * 
     * @return string
     */
    public function view()
    {
        return isset($this->view) ? $this->view : 'flare::cms.index';
    }
}
