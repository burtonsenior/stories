<?php

namespace Stories\Http\Controllers\Api\V1;

use Illuminate\Http\Request;

use Stories\Http\Requests;
use Stories\Http\Controllers\Controller;
use Dingo\Api\Routing\Helpers;

use Illuminate\Database\Eloquent\Model;
use League\Fractal\TransformerAbstract as Transformer;

use Dingo\Api\Exception\StoreResourceFailedException;
use Dingo\Api\Exception\UpdateResourceFailedException;
use Dingo\Api\Exception\DeleteResourceFailedException;

abstract class AbstractApiController extends Controller
{

    use Helpers;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected function doIndexNested(Model $parent, $relation, Model $model, Transformer $transformer)
    {
        $collection = $parent->$relation;

        return $this->response->collection($collection, $transformer);
    }

    protected function doIndex(Model $model, Transformer $transformer)
    {
        $collection = $model->get();

        return $this->response->collection($collection, $transformer);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    protected function doStoreNested(Request $request, Model $parent, $relation, Model $model, $rules)
    {

        $validator = app('validator')->make($request->all(), $rules);

        if ($validator->fails()) {
            throw new StoreResourceFailedException(trans('api/'.$this->routeKey.'.errors.store'), $validator->errors());
        }

        $parentKey = $parent->$relation()->getForeignKey();

        $data = array_merge($request->all(), [$parentKey => $parent->id]);

        $item = $parent->$relation()->create($data);

        $location = app('api.url')->version('v1')->route('api.'.$this->routeKey.'.show', $item);

        return $this->response->created($location);
    }

    protected function doStore(Request $request, Model $model, $rules)
    {

        $validator = app('validator')->make($request->all(), $rules);

        if ($validator->fails()) {
            throw new StoreResourceFailedException(trans('api/'.$this->routeKey.'.errors.store'), $validator->errors());
        }

        $item = $model->create($request->all());

        $location = app('api.url')->version('v1')->route('api.'.$this->routeKey.'.show', $item);

        return $this->response->created($location);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  Model $model
     * @return \Illuminate\Http\Response
     */
    protected function doShowNested(Model $parent, $relation, Model $model, Transformer $transformer)
    {
        $parentKey = $parent->$relation()->getForeignKey();

        if ($model->$parentKey != $parent->id) {
            return $this->response->errorNotFound();
        }

        return $this->response->item($model, $transformer);
    }

    protected function doShow(Model $model, Transformer $transformer)
    {
        return $this->response->item($model, $transformer);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  Model $model
     * @return \Illuminate\Http\Response
     */
    protected function doUpdateNested(Request $request, Model $parent, $relation, Model $model, $rules, Transformer $transformer)
    {

    }

    protected function doUpdate(Request $request, Model $model, $rules, Transformer $transformer)
    {
        $validator = app('validator')->make($request->all(), $rules);

        if ($validator->fails()) {
            throw new UpdateResourceFailedException(trans('api/'.$this->routeKey.'.errors.update'), $validator->errors());
        }

        $model->fill($request->all())->save();

        $location = app('api.url')->version('v1')->route('api.'.$this->routeKey.'.show', $model);

        return $this->response->item($model, $transformer);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  Model $model
     * @return \Illuminate\Http\Response
     */
    protected function doDestroyNested(Model $parent, $relation, Model $model)
    {

    }

    protected function doDestroy(Model $model)
    {
        try {
            $model->delete();
            return $this->response->noContent();
        }
        catch (\Exception $e) {
            throw new DeleteResourceFailedException(trans('api/'.$this->routeKey.'.errors.delete'));
        }

    }
}
