<?php

namespace App\Http\Controllers;

use App\Http\Resources\ZipCodeResource;
use App\Models\ZipCode;
use Illuminate\Http\Request;

class ZipCodeController extends Controller
{
    public function getZipCode($id)
    {
        $zipCode = ZipCode::where('code', $id)->first();

        return response()->json(new ZipCodeResource($zipCode));
    }
}
