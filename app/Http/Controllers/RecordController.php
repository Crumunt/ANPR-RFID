<?php

namespace App\Http\Controllers;

use App\Models\Record;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RecordController extends Controller
{
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
            'license_plate' => 'required|string|max:255',
            'status' => 'required|integer',
            'color' => 'required|string|max:255',
            'has_gate_pass' => 'boolean',
            'no_gate_pass_count' => 'integer'
        ]);

        DB::beginTransaction();
        try {
           
            $record = Record::create([
                'license_plate' => $request->license_plate,
                'status' => $request->status,
                'color' => $request->color,
                'has_gate_pass' => $request->has_gate_pass,
                'no_gate_pass_count' => $request->no_gate_pass_count
            ]);

            DB::commit();
            $msg = ['success', 'Record has been Added!'];

        } catch (\Exception $e) {
            //throw $th;
            DB::rollBack();
            $msg = ['danger', 'Failed to add User! ' . $e->getMessage() ?? ''];
        }

        return redirect()->route('admin.manage_user')->with(['msg' => $msg]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $record = Record::find($id);
        return view('admin.record', compact('record'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $record = Record::find($id);
        return view('admin.record', compact('record'));
    }

    /**
     * Update the specified resource in storage.
     */
    //no upadte function in records log
    public function update(Request $request, string $id)
    {
        //
        $validated_data = $request->validate([
            'license_plate' => 'required|string|max:255',
            'status' => 'required|integer',
            'color' => 'required|string|max:255',
            'has_gate_pass' => 'boolean',
            'no_gate_pass_count' => 'integer'
        ]);

        DB::beginTransaction();
        try {
           
            $record = Record::create([
                'license_plate' => $request->license_plate,
                'status' => $request->status,
                'color' => $request->color,
                'has_gate_pass' => $request->has_gate_pass,
                'no_gate_pass_count' => $request->no_gate_pass_count
            ]);

            DB::commit();
            $msg = ['success', 'Record has been Added!'];

        } catch (\Exception $e) {
            //throw $th;
            DB::rollBack();
            $msg = ['danger', 'Failed to add User! ' . $e->getMessage() ?? ''];
        }

        return redirect()->route('admin.manage_user')->with(['msg' => $msg]);
    }

    /**
     * Remove the specified resource from storage.
     */
    // no delete in records log
    public function destroy(string $id)
    {
        //
    }
}
