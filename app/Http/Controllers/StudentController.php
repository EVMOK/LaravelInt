<?php

namespace App\Http\Controllers;

use App\Models\Discipline;
use App\Models\Group;
use App\Models\Score;
use App\Models\Student;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Factory|View|Application
    {
        $students = Student::with('group')->latest()->paginate(5);

        return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Factory|View|Application
    {
        return view('students.create');
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
            'group_id' => 'required|numeric',
            'date_born' => 'required|date',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $user->student()->create([
            'group_id' => $request->group_id,
            'date_born' => $request->date_born,
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
        return view('students.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Student $student
     * @return Factory|View|Application
     */
    public function edit(Student $student): Factory|View|Application
    {
        $groups = Group::groupList();
        $disciplines = Discipline::disciplinesList();

        return view('students.edit', compact('student', 'groups', 'disciplines'));
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
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $student->user_id,
            'group' => 'required|numeric',
            'date_born' => 'required|date',
        ]);

        $student->user()->update([
            'name' => $request->username,
            'email' => $request->email,
        ]);

        $student->update([
            'group_id' => $request->group,
            'name' => $request->name,
            'date_born' => Carbon::parse($request->date_born)->format('Y-m-d'),
        ]);

        foreach ($request->scores as $score) {
            Score::updateOrCreate(['id' => $score['id']], $score);
        }

        return redirect()->route('students.show', $student->id);
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

    public function journal()
    {
        $scores = Score::with(['discipline', 'student']);
        $disciplines = Discipline::all();
        $students = Student::all();

        return view('students.journal', compact('scores', 'disciplines', 'students'));
    }
}
