<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\School;

class AdminController extends Controller
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
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    // Admin dashboard
    public function dashboard()
    {
        $user = auth()->user();

        // Fetch all schools
        $schools = School::all();

        // Pass both user and schools to the view
        return view('admin.dashboard', compact('user', 'schools'));
    }

    // Show edit form for school
    public function editSchool($id)
    {
        $school = School::findOrFail($id);  // Fetch the school
        return view('admin.edit', compact('school'));  // Single edit blade
    }

    // Update school details
    public function updateSchool(Request $request, $id)
    {
        $request->validate([
            'school_name' => 'required|string|max:255',
            'address' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:255',
            'is_active' => 'nullable|boolean',
        ]);

        $school = School::findOrFail($id);

        // If checkbox not checked, set is_active = false
        $data = $request->all();
        $data['is_active'] = $request->has('is_active') ? 1 : 0;

        $school->update($data);

        return redirect('/admin/dashboard')->with('message', 'School updated successfully!');
    }

    // Deactivate school
    public function toggleSchool($id)
    {
        $school = School::findOrFail($id);

        // Toggle status
        $school->is_active = !$school->is_active;
        $school->save();

        return redirect('/admin/dashboard')->with('message', 'School status updated!');
    }

    // Store new school
    public function storeSchool(Request $request)
    {
        $request->validate([
            'school_name' => 'required|string|max:255',
            'address' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:255',
        ]);

        $schoolUser = \App\Models\User::where('role', 'school')->first();

        School::create([
            'school_name' => $request->school_name,
            'address' => $request->address,
            'phone' => $request->phone,
            'is_active' => 1,
            'user_id' => $schoolUser->id,
        ]);

        return redirect('/admin/dashboard')->with('message', 'School created!');
    }
}
