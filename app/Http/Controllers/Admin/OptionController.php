<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\OptionFormRequest;
use App\Models\Option;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class OptionController extends Controller
{
    /**
     * Display a listing of option.
     */
    public function index(): View
    {
        return view('admin.options.index', [
            'options' => Option::paginate(25)
        ]);
    }

    /**
     * Show the form for creating a new option.
     */
    public function create(): View
    {
        $option = new Option();

        return view('admin.options.form', [
            'option' => $option
        ]);
    }

    /**
     * Store a newly created option in storage.
     */
    public function store(OptionFormRequest $request): RedirectResponse
    {
        Option::create($request->validated());
        return to_route('admin.options.index')->with('success', 'L\'option a bien été enregistré');
    }

    /**
     * Show the form for editing the specified option.
     */
    public function edit(Option $option): View
    {
        return view('admin.options.form', [
            'option' => $option
        ]);
    }

    /**
     * Update the specified option in storage.
     */
    public function update(OptionFormRequest $request, Option $option): RedirectResponse
    {
        $option->update($request->validated());
        return to_route('admin.options.index')->with('success', 'L\'option a bien été modifié');
    }

    /**
     * Remove the specified option from storage.
     */
    public function destroy(Option $option): RedirectResponse
    {
        $option->delete();
        return to_route('admin.options.index')->with('success', 'L\'option a bien été supprimé');
    }
}
