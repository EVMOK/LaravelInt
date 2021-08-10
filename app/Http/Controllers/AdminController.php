<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Factory|View|Application
    {
        $admins = Admin::all();

        return view('admins.index', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Factory|View|Application
    {
        return view('admins.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(): Redirector|Application|RedirectResponse
    {
        Admin::create(request(['name','username']));

        return redirect('/admins');
    }

    /**
     * Display the specified resource.
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $admin): Factory|View|Application
    {
        //
        return view('admins.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Admin $admin): Redirector|Application|RedirectResponse
    {
        $input = request(['name','username']);

        $admin->fill($input)->save();

        return redirect('/admins');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $admin): Redirector|Application|RedirectResponse
    {
        $admin->delete();

        return redirect('/admins');
    }
}
