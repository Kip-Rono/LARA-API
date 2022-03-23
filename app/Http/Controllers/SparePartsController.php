<?php

namespace App\Http\Controllers;

use App\Models\SparePart;
use Dotenv\Validator;
use Illuminate\Http\Request;

class SparePartsController extends Controller
{
    //fetch spare parts
    public function fetchSpareParts(){
        $data = SparePart::select('spare_parts.name', 'spare_parts.price', 'spare_parts.make', 'spare_parts.model');

        return ['spare_parts' => $data];
    }

    //save / add spare parts
    public function saveSpareParts(Request $request){
        //check if the spare exists in database
        $spare_count = SparePart::where('spare_parts.name',$request->name)
            ->where('spare_parts.price',$request->price)
            ->where('spare_parts.make',$request->make)
            ->where('spare_parts.model',$request->model)
            ->count();

        if ($spare_count < 0){
            //pass the arguments/inputs through validation
            $rules = [
                'name' => 'required|string|min:3|max:255',
                'price' => 'required|string|min:3|max:255',
                'make' => 'required|string|email|max:255'
            ];
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                //validation failed
                return redirect('#')
                    ->withInput()
                    ->withErrors($validator);
            }else{
                //save added spare parts
                try {
                    SparePart::create([
                        'name' => $request->name,
                        'price' => $request->price,
                        'make' => $request->make,
                        'model' => $request->model,
                        'created_at' => date(),
                        'updated_at' =>  date(),
                    ]);
                    return ['response' => 'Spare Part Added Successfully'];
                }catch (\Exception $e){
                    return redirect('#')->with('error', 'Fail ! Try Again');
                }
            }
        }else{
            return ['response' => 'Spare Part with the same details exist'];
        }
    }
}
