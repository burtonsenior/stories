<?php

namespace Stories\Transformers\V1;

use League\Fractal\TransformerAbstract;

use Stories\Project;

class ProjectTransformer extends TransformerAbstract {

	public function transform(Project $project)
	{
		return [
			'id'   => $project->id,
			'name' => $project->name,
		];
	}
}