<?php

namespace App\Http\Controllers;

use App\Models\User;
use FFI\Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    //

    public function index() {
        // return user table view
        return view('admin.manage_user');
    }

    public function store(Request $request) {

        $validated_data = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|unique:users',
        ]);

        DB::beginTransaction();
        try {
            $user = User::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);

            DB::commit();
            $msg = ['success', 'User has been Added!'];

        } catch (\Exception $e) {
            //throw $th;
            DB::rollBack();
            $msg = ['danger', 'Failed to add User! ' . $e->getMessage() ?? ''];
        }

        return redirect()->route('admin.manage_user')->with(['msg' => $msg]);

    }

    public function show($id) {
        $user = DB::table('users')->find($id);

        return Redirect::route('admin.manage_user', compact($user));
    }

    public function edit($id) {
        $user = User::find($id);
        return view('admin.edit_user', compact('user'));
    }


    public function update(Request $request, string $id) {
        
        $validated_data = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|unique:users',
        ]);

        DB::beginTransaction();

        try {
            //code...

            $user = User::find($id)->update([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email
            ]);

            DB::commit();
            $msg = ['success', 'User Record has been Updated!'];
        } catch (\Exception $e) {
            //throw $th;
            DB::rollBack();
            $msg = ['danger', 'Failed to Update User Record! ' . $e->getMessage() ?? ''];
        }
        
        return redirect()->route('admin.manage_user')->with(['msg' => $msg]);
    }

    public function destroy(string $id) {

        DB::beginTransaction();
        try {
            User::findorFail($id)->delete;
            DB::commit();
            $msg = ['danger', 'Record Deleted!'];
            return redirect()->route('admin.manage_user')->with(['msg'=>$msg]);
        }catch(\Exception $e) {
            DB::rollback();
            dd($e);
            $msg = ['danger', 'Failed to Delete Record! ' . $e->getMessage() ?? ''];
            return redirect()->route('admin.manage_user')->with(['msg' => $msg]);
        }

    }

}
