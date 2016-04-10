<?php

namespace Stories\Transformers\V1;

use League\Fractal\TransformerAbstract;

use Stories\Story;

class StoryTransformer extends TransformerAbstract {

	protected $defaultIncludes = [
		// 'actor', 'status'
	];
	protected $availableIncludes = [
		// 'project'
	];

	public function transform(Story $story)
	{
		return [
		'id'         => $story->id,
		'project_id' => $story->project_id,
		'role_id'    => $story->role_id,
		'status_id'  => $story->status_id,
		'actor'      => @$story->actor->name,
		'goal'       => $story->goal,
		'value'      => $story->value,
		'comments'   => $story->comments,
		'status'     => @$story->status->name,
		'sentence'   => $story->sentence,
		];
	}

	// public function includeStatus(Story $story)
	// {
	// 	if ($status = $story->status) {
	// 		return $this->item($status, new StatusTransformer);
	// 	}

	// 	return null;
	// }

	// public function includeActor(Story $story)
	// {
	// 	if ($actor = $story->actor) {
	// 		return $this->item($actor, new RoleTransformer);
	// 	}

	// 	return null;

	// }
}