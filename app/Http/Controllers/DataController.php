<?php

namespace App\Http\Controllers;

use App\Models\Data;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class DataController extends Controller
{
    public function create(Request $request) {

        $validated = $request ->validate([
            'slackUsername' => 'required|min:4',
            'backend' => 'required',
            'age' => 'required',
            'bio' => 'required'
        ]);
        $slackUsername = $request->input('slackUsername');
        $backend = $request->input('backend');
        $age = $request->input('age');
        $bio = $request->input('bio');

        Data::insert([
            'slackUsername' => $slackUsername,
            'backend' => $backend,
            'age' => $age,
            'bio' => $bio, 
            'created_at' => Carbon::now()         
        ]);

        $data = [
            'status'=>'success',
            'create'=>[
                'method' => 'POST',
                'param' => 'slackUsername,backend,age,bio'

            ]
            ];

            $response = [
                'message' => 'Data created successfully','data' => $data];

                return response()->json($response, 200);

        
    }
    
    public function show(Request $request) {
       $fields = Data::all();

                return response()->json($fields, 200);
   
        }

        /*
        public function show(Request $request) {
       $fields = Data::all();

        $data = [
            'status'=>'success',
            'data' => $fields,
            'show'=>[
                'method' => 'GET',
                'param' => 'slackUsername,backend,age,bio'

            ]
            ];
            $response = [
                'message' => 'Data shown successfully','data' => $data];

                return response()->json($response, 200);
   
        }
        
        
        
        */
}
