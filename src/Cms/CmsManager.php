<?php

namespace LaravelFlare\Cms;

use LaravelFlare\Cms\Tree\TreeManager;

class CmsManager
{
    /**
     * Tree Manager Instance
     * 
     * @var \LaravelFlare\Cms\Tree\TreeManager
     */
    protected $tree;

    /**
     * __construct
     * 
     * @param \LaravelFlare\Cms\Tree\TreeManager $treeManager 
     */
    public function __construct(TreeManager $treeManager)
    {
        $this->tree = $treeManager;
    }

    /**
     * Handle an Incoming Route.
     * 
     * First lookup full slug (we will index this), since this is faster.
     * If this is not found loop through all matching slugs until the 
     * full_slug matches and use that.
     * 
     * @param  string $fullslug 
     * 
     * @return \Illuminate\Http\Response
     */
    public function handleRoute($fullslug)
    {
        if (!$structure = $this->tree->find($fullslug)) {
            $slugParts = explode('/', $fullslug);
            foreach ($this->tree->findBySlug(end($slugParts)) as $structure) {
                if ($fullslug == $structure->full_slug) {
                    break;
                }
            }
        }

        if ($structure) {
            return $this->renderPage($structure);
        }

        return '404';
    }

    /**
     * Render a Page
     * 
     * @param  \LaravelFlare\Cms\Tree\Tree $structure 
     * 
     * @return \Illuminate\Http\Response
     */
    private function renderPage($structure)
    {
        $page = $structure->page;
        $template = $structure->template ? $structure->template : 'pages.'.strtolower(substr(strrchr(get_class($page), "\\"), 1));

        return view($template, ['page' => $page]);
    }
}