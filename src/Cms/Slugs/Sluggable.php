<?php


namespace LaravelFlare\Cms\Slugs;

interface Sluggable
{
    /**
     * Morph Slug to Model.
     * 
     * @return 
     */
    public function slug();

    /**
     * Saves the Slug to the Model.
     *  
     * @return 
     */
    public function saveSlug($slug = null);
}
