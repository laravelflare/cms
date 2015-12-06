<?php

namespace LaravelFlare\Cms\Slugs;

trait SluggableModel
{
    /**
     * Morph Slug to Model.
     * 
     * @return 
     */
    public function slug()
    {
        return $this->morphOne(\LaravelFlare\Cms\Slugs\Slug::class, 'model');
    }

    /**
     * Saves the Slug to the Model.
     *  
     * @return 
     */
    public function saveSlug($slugValue = null, $homepage = false)
    {
        if (!$homepage) {
            if (!$slugValue) {
                $slugValue = str_slug($this->name);
            }

            if (!$slugValue) {
                return;
            }
        }

        if ($this->slug) {
            $this->slug()->update(['path' => $homepage ? '' : $slugValue]);
            return;
        }

        $this->slug()->create(['path' => $homepage ? '' : $slugValue]);
    }
    
    /**
     * Provides the Link Accessor.
     * 
     * @return string
     */
    public function getLinkAttribute()
    {
        if ($this->slug) {
            return url($this->slug);
        }
    }
}
