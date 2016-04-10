<?php

namespace Stories\Providers;

use Illuminate\Routing\Router;
use Dingo\Api\Routing\Router as ApiRouter;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

use Stories\Project;
use Stories\Story;
use Stories\Role;
use Stories\Status;
use Stories\Category;
use Stories\Stakeholder;
use Stories\Organisation;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'Stories\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function boot(Router $router)
    {
        //

        parent::boot($router);

        $router->model('projects', Project::class);
        $router->model('stories', Story::class);
        $router->model('roles', Role::class);
        $router->model('statuses', Status::class);
        $router->model('categories', Category::class);
        $router->model('stakeholders', Stakeholder::class);
        $router->model('organisations', Organisation::class);
    }

    /**
     * Define the routes for the application.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function map(Router $router, ApiRouter $apiRouter)
    {
        $this->mapWebRoutes($router);
        $this->mapApiRoutes($apiRouter);
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    protected function mapWebRoutes(Router $router)
    {
        $router->group([
            'namespace' => $this->namespace, 'middleware' => 'web',
        ], function ($router) {
            require app_path('Http/routes.php');
        });
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes all receive API middleware.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    protected function mapApiRoutes(ApiRouter $router)
    {
        $router->version('v1', function() use ($router) {
            $router->group([
                'namespace' => $this->namespace.'\Api\V1', 'middleware' => 'api',
                ], function ($router) {
                    require app_path('Http/api_routes.php');
                }
            );
        });
    }
}
