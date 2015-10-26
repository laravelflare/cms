<?php

namespace LaravelFlare\Cms\Slugs;

use Illuminate\Database\Eloquent\Model;

class Slug extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'slugs';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'slug';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['slug'];

    /**
     * Get all of the owning sluggable models.
     *
     * @return
     */
    public function sluggable()
    {
        return $this->morphTo();
    }

    /**
     * Convert the model to its string representation.
     *
     * @return string
     */
    public function __toString()
    {
        return $this->slug;
    }
}
