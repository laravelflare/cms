<?php

namespace LaravelFlare\Cms\Slugs;

use \Request;
use Illuminate\Database\Eloquent\Model;

class Slug extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'flare_cms_slugs';

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
    protected $fillable = ['path'];

    /**
     * Get the owning model.
     *
     * @return
     */
    public function model()
    {
        return $this->morphTo();
    }

    /**
     * Determines if the current Request Path
     * matches this Sluggable Models path (slug).
     *
     * @return boolean
     */
    public function isActiveUrl()
    {
        if ($this->path == Request::path()) {
            return true;
        }

        return false;
    }

    /**
     * Convert the model to its string representation.
     *
     * @return string
     */
    public function __toString()
    {
        return $this->path;
    }
}
