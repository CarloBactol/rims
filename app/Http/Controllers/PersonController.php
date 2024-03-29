<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Resident;
use App\Models\BarangayLGU;
use Illuminate\Http\Request;

class PersonController extends Controller
{

    public function index()
    {
        $residents = Resident::all();

        return view('admin.resident.index');
    }

    public function create()
    {
        return view('admin.resident.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'firstName' => 'required|min:2',
            'middleName' => 'required|min:2',
            'lastName' => 'required|min:2',
            'address' => 'required',
            'dateOfBirth' => ['required', 'date'],
            'contactNumber' => [
                // Use required_if rule to make it required only if age is 18 or older
                'required_if:dateOfBirth,' . \Carbon\Carbon::now()->subYears(18)->format('Y-m-d'),
                'nullable',
                'digits:11',
                'unique:residents,contactNumber',
            ],
            'nationality' => 'required',
            'civilStatus' => 'required',
            'gender' => 'required',
            'purpose' => 'required',
        ]);

        $dateBirth = Carbon::parse($request->birthdate);
        Resident::create([
            'firstName' => $request->firstName,
            'middleName' => $request->middleName,
            'lastName' => $request->lastName,
            'civilStatus' => $request->civilStatus,
            'nationality' => $request->nationality,
            'age' => $dateBirth->age,
            'dateOfBirth' => $request->dateOfBirth,
            'address' => $request->address,
            'contactNumber' => $request->contactNumber,
            'gender' => $request->gender,
            'purpose' => $request->purpose,
        ]);

        return redirect()->route('persons.index')->with('success', 'Successfully saved.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $resident = Resident::with('business')->find($id);

        // $mayor =  BarangayLGU::where('role', 'Mayor')->first();
        $captain =  BarangayLGU::where('role', 'Captain')->first();
        $secretary =  BarangayLGU::where('role', 'Secretary')->where('isSecretary', false)->first();
        $treasurer =  BarangayLGU::where('role', 'Treasurer')->where('isTreasurer', false)->first();

        // [$captain, $secretary, $treasurer] = BarangayLGU::whereIn('role', ['Captain', 'Secretary', 'Treasurer'])->get()->pluck(null, 'role');

        return view('admin.resident.show', compact('resident', 'captain', 'secretary',  'treasurer'));
    }

    public function edit($id)
    {
        $resident = Resident::find($id);
        return view('admin.resident.edit', compact('resident'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'firstName' => 'required|min:2',
            'middleName' => 'required|min:2',
            'lastName' => 'required|min:2',
            'address' => 'required',
            'dateOfBirth' => 'required',
            'gender' => 'required',
            'contactNumber' => 'required|digits:11|unique:residents,contactNumber,' . $id,
            'nationality' => 'required',
            'civilStatus' => 'required',
            'purpose' => 'required',
        ]);
        $dateBirth = Carbon::parse($request->birthdate);
        $update = Resident::find($id);
        $update->firstName = $request->firstName;
        $update->middleName = $request->middleName;
        $update->lastName = $request->lastName;
        $update->address = $request->address;
        $update->dateOfBirth = $request->dateOfBirth;
        $update->nationality = $request->nationality;
        $update->civilStatus = $request->civilStatus;
        $update->age = $dateBirth->age;
        $update->contactNumber = $request->contactNumber;
        $update->gender = $request->gender;
        $update->purpose = $request->purpose;
        $update->save();

        return redirect()->route('persons.index')->with('info', 'Successfully updated.');
    }


    public function destroy($id)
    {
        $delete = Resident::findorFail($id);
        $delete->delete();
        return redirect()->back()->with('danger', 'Successfully deleted.');
    }
}
