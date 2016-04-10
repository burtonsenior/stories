<?php

namespace Stories\Http\Controllers\Api\V1;

use Illuminate\Http\Request;

use Stories\Http\Requests;
use Stories\Http\Controllers\Controller;

use Stories\Project;
use Stories\Transformers\V1\ProjectTransformer;

class ProjectsController extends AbstractApiController
{

    protected $routeKey = 'projects';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->doIndex(new Project, new ProjectTransformer);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|unique:projects,name',
        ];

        return $this->doStore($request, new Project, $rules);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  Project $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return $this->doShow($project, new ProjectTransformer);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  Project $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $rules = [
            'name' => 'required|unique:projects,name,'.$project->id,
        ];

        return $this->doUpdate($request, new Project, $rules, new ProjectTransformer);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  Project $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        return $this->doDestroy($project);
    }
}
