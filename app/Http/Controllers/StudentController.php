<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Factory|View|Application
    {
        $students = Student::with('group')->latest()->paginate(10);

        return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Factory|View|Application
    {
        return view('backend.students.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'parent_id' => 'required|numeric',
            'class_id' => 'required|numeric',
            'roll_number' => 'required|numeric|unique:students',
            'gender' => 'required|string',
            'phone' => 'required|string|max:255',
            'dateofbirth' => 'required|date',
            'current_address' => 'required|string|max:255',
            'permanent_address' => 'required|string|max:255'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $user->student()->create([
            'parent_id' => $request->parent_id,
            'class_id' => $request->class_id,
            'roll_number' => $request->roll_number,
            'gender' => $request->gender,
            'phone' => $request->phone,
            'dateofbirth' => $request->dateofbirth,
            'current_address' => $request->current_address,
            'permanent_address' => $request->permanent_address
        ]);

        $user->assignRole('Student');

        return redirect()->route('student.index');
    }

    /**
     * Display the specified resource.
     * @param Student $student
     * @return Application|Factory|View
     */
    public function show(Student $student): View|Factory|Application
    {
        $class = Grade::with('subjects')->where('id', $student->class_id)->first();

        return view('backend.students.show', compact('class', 'student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Student $student
     * @return Factory|View|Application
     */
    public function edit(Student $student): Factory|View|Application
    {
        return view('backend.students.edit', compact('classes', 'parents', 'student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Student $student
     * @return RedirectResponse
     */
    public function update(Request $request, Student $student): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $student->user_id,
            'parent_id' => 'required|numeric',
            'class_id' => 'required|numeric',
            'roll_number' => 'required|numeric|unique:students,roll_number,' . $student->id,
            'gender' => 'required|string',
            'phone' => 'required|string|max:255',
            'dateofbirth' => 'required|date',
            'current_address' => 'required|string|max:255',
            'permanent_address' => 'required|string|max:255'
        ]);

        $student->user()->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        $student->update([
            'parent_id' => $request->parent_id,
            'class_id' => $request->class_id,
            'roll_number' => $request->roll_number,
            'gender' => $request->gender,
            'phone' => $request->phone,
            'dateofbirth' => $request->dateofbirth,
            'current_address' => $request->current_address,
            'permanent_address' => $request->permanent_address
        ]);

        return redirect()->route('student.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student): RedirectResponse
    {
        $user = User::findOrFail($student->user_id);
        $user->student()->delete();
        $user->removeRole('Student');

        return back();
    }
}
