<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGroupRequest;
use App\Models\Group;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;

class GroupController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): Factory|View|Application
    {
        $groups = Group::all();

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
    public function store(StoreGroupRequest $request): Redirector|Application|RedirectResponse
    {
        Group::create(request(['name']));

        return redirect('/groups');
    }

    /**
     * Display the specified resource.
     *
     * @param Group $group
     */
    public function show(Group $group)
    {
        //
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
