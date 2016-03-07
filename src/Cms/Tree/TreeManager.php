<?php

namespace LaravelFlare\Cms\Tree;

use LaravelFlare\Cms\Tree\Tree;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class TreeManager
{
    /**
     * Tree Model
     * 
     * @var \LaravelFlare\Cms\Tree\Tree
     */
    private $tree;

    /**
     * __construct
     *
     * @param \LaravelFlare\Cms\Tree\Tree $tree
     */
    public function __construct(Tree $tree)
    {
        $this->tree = $tree;
    }

    /**
     * Find a Tree Item by Fullslug
     * 
     * @param  string $fullslug
     * 
     * @return 
     */
    public function find($fullslug)
    {
        return $this->tree->whereSlug($fullslug)->with('parent')->first();
    }

    /**
     * Find a Tree Item by Slug or throw an exception.
     *
     * @param  string $fullslug
     * 
     * @return \LaravelFlare\Cms\Tree\Tree
     *
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function findOrFail($fullslug)
    {
        if (!$tree = $this->find($fullslug)) {
            throw (new ModelNotFoundException)->setModel(Tree::class);
        }

        return $tree;
    }

    /**
     * Find models which match a slug.
     *
     * @param  string  $slug
     * 
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function findBySlug($slug)
    {
        return $this->tree->whereSlug($slug);
    }

    /**
     * Handle dynamic method calls into the Manager Class.
     *
     * Allows us to create a newQuery when attempting to access
     * data which the Manager Class does not have methods for.
     *
     * @param string $method
     * @param array  $parameters
     * 
     * @return mixed
     */
    public function __call($method, $parameters)
    {
        if (method_exists($this, $method)) {
            return call_user_func_array([$this, $method], $parameters);
        }

        return call_user_func_array([$this->tree->newQuery(), $method], $parameters);
    }
}
