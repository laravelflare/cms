<?php

namespace LaravelFlare\Cms\Http\Middleware;

use Closure;
use LaravelFlare\Cms\Content\ContentManager;

class CheckSlugExists
{
    /**
     * Slugs Repostory
     *
     * @var \LaravelFlare\Cms\Content\ContentManager
     */
    protected $content;

    /**
     * Create a new filter instance.
     */
    public function __construct(ContentManager $contentManager)
    {
        $this->content = $contentManager;
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
        if (!$this->content->findBySlug($request->path)) {
            return view('flare::cms.404', []);
        }

        return $next($request);
    }
}
