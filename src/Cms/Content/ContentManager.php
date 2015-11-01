<?php

namespace LaravelFlare\Cms\Content;

use LaravelFlare\Cms\Slugs\Slug;

class ContentManager
{
    public function __construct()
    {
    }

    public function find($model, $primaryKey)
    {
    }

    public function findBySlug($slug)
    {
        if ($slug = Slug::wherePath($slug)->first()) {
            return $slug->model;
        }

        return;
    }
}
