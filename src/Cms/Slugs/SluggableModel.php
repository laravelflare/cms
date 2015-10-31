<?php

namespace LaravelFlare\Cms\Slugs;

trait SluggableModel
{
    /**
     * Morph Slug to Model
     * 
     * @return 
     */
    public function slug()
    {
        return $this->morphOne(\LaravelFlare\Cms\Slugs\Slug::class, 'model');
    }
}
