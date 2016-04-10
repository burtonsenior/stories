<?php

namespace Stories\Transformers\V1;

use League\Fractal\TransformerAbstract;

use Stories\Stakeholder;

class StakeholderTransformer extends TransformerAbstract {

	public function transform(Stakeholder $stakeholder)
	{
		return [
			'id'   => $stakeholder->id,
			'name' => $stakeholder->name,
		];
	}
}