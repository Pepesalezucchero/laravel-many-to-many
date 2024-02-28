<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Technology;

class ApiController extends Controller
{
    public function getTest() {
        return response()->json([
            'status'=>'sasses',
            'message'=>'funziona'
        ]);
    }

    public function getTechnologies() {

        $technologies = Technology::all();

        return response()->json([
            'status'=>'success',
            'technologies'=>$technologies
        ]);
    }

    public function createTechnologies(Request $request) {

        $data = $request->all();

        $technology = new Technology;

        $technology->name_technology = $data['name_technology'];
        $technology->description = $data['description'];
        $technology->language = $data['language'];

        $technology->save();

        return response()->json([
            'status'=>'success',
            'technology'=>$technology
        ]);
    }
}
