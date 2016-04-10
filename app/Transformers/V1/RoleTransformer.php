<?php

namespace Stories\Transformers\V1;

use League\Fractal\TransformerAbstract;

use Stories\Role;

class RoleTransformer extends TransformerAbstract {

	public function transform(Role $role)
	{
		return [
			'id'   => $role->id,
			'name' => $role->name,
		];
	}
}