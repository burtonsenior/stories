<?php

namespace Stories\Http\Controllers\Api\V1;

use Illuminate\Http\Request;

use Stories\Http\Requests;
use Stories\Http\Controllers\Controller;

use Stories\Client;
use Stories\Transformers\V1\ClientTransformer;

class ClientsController extends AbstractApiController
{

    protected $routeKey = 'clients';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->doIndex(new Client, new ClientTransformer);
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
            'name' => 'required|unique:clients,name',
        ];

        return $this->doStore($request, new Client, $rules);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  Client $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        return $this->doShow($client, new ClientTransformer);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  Client $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        $rules = [
            'name' => 'required|unique:clients,name,'.$client->id,
        ];

        return $this->doUpdate($request, new Client, $rules, new ClientTransformer);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  Client $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        return $this->doDestroy($client);
    }
}
