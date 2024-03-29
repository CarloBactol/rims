<?php

namespace App\Http\Controllers;

use App\Models\BarangayLGU;
use Illuminate\Http\Request;

class BarangayLGUController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $members = BarangayLGU::orderBy("role", "ASC")->get();;
        return view('admin.barangay.index', compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.barangay.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'firstName' =>'required',
          'middleName' =>'required',
          'lastName' =>'required',
          'address' =>'required',
           'contactNo' =>'required|digits:11|unique:barangay_l_g_u_s',
           'schedule' =>'required',
           'role' =>'required',
           'image' => 'nullable|image|mimes:jpeg,jpg,png,gif',
        ]);


        $lgu = new BarangayLGU();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('images/con_image/',  $filename);
            $lgu->image = $filename;
        }
        $lgu->firstName = $request->firstName;
        $lgu->middleName = $request->middleName;
        $lgu->lastName = $request->lastName;
        $lgu->address = $request->address;
        $lgu->contactNo = $request->contactNo;
        $lgu->schedule = $request->schedule;
        $lgu->isSecretary = 0;
        $lgu->isTreasurer = 0;
        $lgu->role = $request->role;
        $lgu->save();
        return redirect()->route("baranagay_l_g_u_s.index")->with("success", "LGU Created Successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lgus = BarangayLGU::find($id);
        return view('admin.barangay.edit', compact("lgus"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'firstName' =>'required',
          'middleName' =>'required',
          'lastName' =>'required',
          'address' =>'required',
           'contactNo' =>'required|digits:11|unique:barangay_l_g_u_s,contactNo,' .$id,
           'schedule' =>'required',
           'role' =>'required',
           'image' => 'nullable|image|mimes:jpeg,jpg,png,gif',
        ]);


        $lgu =  BarangayLGU::find($id);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('images/con_image/',  $filename);
            $lgu->image = $filename;
        }
        $lgu->firstName = $request->firstName;
        $lgu->middleName = $request->middleName;
        $lgu->lastName = $request->lastName;
        $lgu->address = $request->address;
        $lgu->contactNo = $request->contactNo;
        $lgu->schedule = $request->schedule;
        $lgu->isSecretary = 0;
        $lgu->isTreasurer = 0;
        $lgu->role = $request->role;
        $lgu->save();
        return redirect()->route("baranagay_l_g_u_s.index")->with("success", "LGU Created Successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = BarangayLGU::findorFail($id);
        $delete->delete();
        return redirect()->back()->with('danger', 'Blotter Deleted Successfully!');
    }
}
