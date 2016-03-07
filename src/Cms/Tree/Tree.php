<?php

namespace LaravelFlare\Cms\Tree;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tree extends Model
{
    use SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'flare_cms_tree';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
                            'slug',
                            'parent_id',
                        ];

    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $with = [
                            'parent'
                        ];

    /**
     * Parent of this Tree Item
     * 
     * @return 
     */
    public function parent()
    {
        return $this->belongsTo(self::class, 'parent_id', 'id');
    }

    /**
     * Tree items Morph to CMS Models / Pages
     * 
     * @return 
     */
    public function page()
    {
        return $this->morphTo();
    }

    /**
     * Returns the Full Slug of this Tree Item
     * 
     * @return string
     */
    public function getFullSlugAttribute()
    {
        return trim(($this->parent ? $this->parent->full_slug : '').'/'.$this->slug, '/');
    }

    /**
     * Returns the Url to this Tree Item
     * 
     * @return string
     */
    public function getUrlAttribute()
    {
        return url(trim(($this->parent ? $this->parent->full_slug : '').'/'.$this->slug, '/'));
    }
}
