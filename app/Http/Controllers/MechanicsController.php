<?php

namespace App\Http\Controllers;

use App\Models\Mechanics;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function Sodium\increment;

class MechanicsController extends Controller
{
    //save services offered by mechanic
    public function saveMechanicsServices(Request $request)
    {
        try {
            DB::transaction(function () use ($request) {
                for ($i = 0; $i < count($request->services); $i++) {
                    //checks if entry exists ... updates if does and saves otherwise
                    Mechanics::updateOrCreate(
                        [
                            //Add unique fields to match here
                            'id' => $request->mechanic_id,
                            'service' => $request->services[$i]
                        ],
                        [
                            'id' => increment(),
                            'name' => $request->name,
                            'email' => $request->email,
                            'service' => $request->service[$i],
                        ]
                    );
                }
                return ['response' => 'Save Successful'];
            });
        } catch (\Exception $e){
            return redirect('#')->with('error', 'Fail');
        }
    }

    //fetch all services offered by mechanic
    public function fetchMechanicServices($mechanic_id)
    {
        $data = Mechanics::select('mechanics.*', 'services.service')
            ->leftJoin('services', 'services.code', '=', 'mechanic.service')
            ->where('mechanics.id', $mechanic_id)
            ->get();

        return ['mechanis_data' => $data];
    }
}
