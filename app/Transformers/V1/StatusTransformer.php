<?php

namespace Stories\Transformers\V1;

use League\Fractal\TransformerAbstract;

use Stories\Status;

class StatusTransformer extends TransformerAbstract {

	public function transform(Status $status)
	{
		return [
			'id'   => $status->id,
			'name' => $status->name,
		];
	}
}