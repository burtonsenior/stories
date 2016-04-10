<?php

namespace Stories\Transformers\V1;

use League\Fractal\TransformerAbstract;

use Stories\Project;

class ProjectTransformer extends TransformerAbstract {

	public function transform(Project $project)
	{
		return [
			'id'        => $project->id,
			'client_id' => $project->client_id,
			'name'      => $project->name,
		];
	}
}