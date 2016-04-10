<?php

namespace Stories\Http\Controllers\Api\V1;

use Illuminate\Http\Request;

use Stories\Http\Requests;
use Stories\Http\Controllers\Controller;

use Stories\Project;
use Stories\Story;
use Stories\Transformers\V1\StoryTransformer;

class ProjectStoriesController extends AbstractApiController
{

    protected $routeKey = 'stories';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Project $project)
    {
        return $this->doIndexNested($project, 'stories', new Story, new StoryTransformer);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Project $project)
    {
        $rules = [
            'name' => 'required|unique:projects,name',
        ];

        return $this->doStoreNested($request, $project, 'stories', new Story, $rules);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  Project $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project, Story $story)
    {
        return $this->doShowNested($project, 'stories', $story, new StoryTransformer);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  Project $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project, Story $story)
    {
        $rules = [
            'name' => 'required|unique:projects,name,'.$story->id,
        ];

        return $this->doUpdateNested($request, $project, 'stories', new Story, $rules, new StoryTransformer);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  Project $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project, Story $story)
    {
        return $this->doDestroyNested($project, 'stories', $story);
    }
}
