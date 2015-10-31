<?php

namespace LaravelFlare\Cms\Slugs;

use LaravelFlare\Cms\Slugs\Slug;

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

    /**
     * Saves the Slug to the Model
     *  
     * @return 
     */
    public function saveSlug($slugValue = null)
    {
        if (!$slugValue) {
            $slugValue = str_slug($this->name);
        }

        if (!$slugValue) {
            return;
        }

        if ($this->slug) {
            $this->slug()->update(['path' => $slugValue]);
            return;
        }

        $this->slug()->create(['path' => $slugValue]);
    }
}
