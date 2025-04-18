<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VehicleController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validated_data = $request->validate([
            'user_id' => 'required|integer',
            'license_plate' => 'required|string|max:255',
            'color' => 'required|string|max:255',
            'vehicle_make' => 'required|string|max:255',
            'vehicle_model' => 'required|string|max:255'
        ]);

        DB::beginTransaction();
        try {

            $vehicle = Vehicle::create([
                'user_id' => $request->user_id,
                'license_plate' => $request->license_plate,
                'color' => $request->color,
                'vehicle_make' => $request->vehicle_make,
                'vehicle_model' => $request->vehicle_model
            ]);

            DB::commit();
            $msg = ['success', 'Vehicle has been Added!'];

        } catch (\Exception $e) {
            //throw $th;
            DB::rollBack();
            $msg = ['danger', 'Failed to add Vehicle! ' . $e->getMessage() ?? ''];
        }

        return redirect()->route('admin.manage_vehicle')->with(['msg' => $msg]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $vehicle = Vehicle::find($id);
        return view('admin.manage_vehicle', compact('record'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $record = Vehicle::find($id);
        return view('admin.manage_vehicle', compact('record'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $validated_data = $request->validate([
            'user_id' => 'required|integer',
            'license_plate' => 'required|string|max:255',
            'color' => 'required|string|max:255',
            'vehicle_make' => 'required|string|max:255',
            'vehicle_model' => 'required|string|max:255'
        ]);

        DB::beginTransaction();
        try {

            $record = Vehicle::create([
                'user_id' => $request->user_id,
                'license_plate' => $request->license_plate,
                'color' => $request->color,
                'vehicle_make' => $request->vehicle_make,
                'vehicle_model' => $request->vehicle_model
            ]);

            DB::commit();
            $msg = ['success', 'Vehicle has been Updated!'];

        } catch (\Exception $e) {
            //throw $th;
            DB::rollBack();
            $msg = ['danger', 'Failed to update Vehicle! ' . $e->getMessage() ?? ''];
        }

        return redirect()->route('admin.manage_vehicle')->with(['msg' => $msg]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        DB::beginTransaction();
        try {
            Vehicle::findorFail($id)->delete;
            DB::commit();
            $msg = ['danger', 'Record Deleted!'];
            return redirect()->route('admin.manage_vehicle')->with(['msg'=>$msg]);
        }catch(\Exception $e) {
            DB::rollback();
            dd($e);
            $msg = ['danger', 'Failed to Delete Record! ' . $e->getMessage() ?? ''];
            return redirect()->route('admin.manage_vehicle')->with(['msg' => $msg]);
        }
    }
}
