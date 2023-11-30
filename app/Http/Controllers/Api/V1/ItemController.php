<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Item;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\ItemResource;
use App\Http\Resources\V1\ItemCollection;
use App\Http\Requests\V1\StoreItemRequests;
use App\Http\Requests\V1\UpdateItemRequests;

class ItemController extends Controller
{

    public function index()
    {
        //return ItemResource::collection(Item::all()); //no pagination
        return ItemResource::collection(Item::paginate());  //pagination
        //return new ItemCollection(Item::all());  // both ways are valid (can use pagination as well)

    }

    public function show(Item $item)
    {
        return new ItemResource($item);

    }

    public function store(StoreItemRequests $request)
    {

        $item = Item::create($request->validated());

        return new ItemResource($item);

    }

    public function update(UpdateItemRequests $request, Item $item)
    {

        $item->update($request->validated());

        return new ItemResource($item);

    }

    public function destroy(Item $item)
    {

        $item->delete();

        return response()->noContent();

    }
}
