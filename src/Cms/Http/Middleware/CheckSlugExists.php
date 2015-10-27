<?php

namespace LaravelFlare\Cms\Http\Middleware;

use Closure;
use LaravelFlare\Cms\Slugs\SlugRepository;

class CheckSlugExists
{
    /**
     * Slugs Repostory
     *
     * @var \LaravelFlare\Cms\Slugs\SlugRepository
     */
    protected $slugs;

    /**
     * Create a new filter instance.
     */
    public function __construct(SlugRepository $slugRepository)
    {
        $this->slugs = $slugRepository;
    }

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!$this->slugs->findBySlug($request->path)) {
            return view('flare::cms.404', []);
        }

        return $next($request);
    }
}
