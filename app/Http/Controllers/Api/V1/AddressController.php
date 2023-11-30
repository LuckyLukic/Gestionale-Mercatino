<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Address;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\AddressResource;

class AddressController extends Controller
{
    public function index()
    {

        return AddressResource::collection(Address::paginate());

    }

    public function show(Address $address)
    {
        return new AddressResource($address);

    }
    //
}

