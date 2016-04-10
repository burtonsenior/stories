<?php

namespace Stories\Transformers\V1;

use League\Fractal\TransformerAbstract;

use Stories\Client;

class ClientTransformer extends TransformerAbstract {

	public function transform(Client $client)
	{
		return [
			'id'   => $client->id,
			'name' => $client->name,
		];
	}
}