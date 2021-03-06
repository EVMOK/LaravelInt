<?php

namespace App\Http\Controllers;

use App\Http\Filters\Filterable;
use App\Http\Filters\GroupFilter;
use App\Http\Requests\GroupRequest;
use App\Models\Group;
use App\Models\Student;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Request;

class GroupController extends Controller
{
    use Filterable;

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(GroupFilter $filter): Factory|View|Application
    {
        $groups = Group::filter($filter)->withCount('students')->paginate(10);

        return view('groups.index', compact('groups'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Factory|View|Application
    {
        return view('groups.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GroupRequest $request): Redirector|Application|RedirectResponse
    {
        Group::create(request(['name']));

        return redirect('/groups');
    }

    /**
     * Display the specified resource.
     *
     * @param Group $group
     * @return Application|Factory|View
     */
    public function show(Group $group): View|Factory|Application
    {
        $students = Student::where('group_id', $group->id)->latest()->paginate(8);

        return view('groups.show', compact('students'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Group $group
     */
    public function edit(Group $group): Factory|View|Application
    {
        return view('groups.edit', compact('group'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Group $group
     * @return Redirector|Application|RedirectResponse
     */
    public function update(Group $group): Redirector|Application|RedirectResponse
    {
        $input = request(['name']);

        $group->fill($input)->save();

        return redirect('/groups');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Group $group
     */
    public function destroy(Group $group): Redirector|Application|RedirectResponse
    {
        $group->delete();

        return redirect('/groups');
    }
}
