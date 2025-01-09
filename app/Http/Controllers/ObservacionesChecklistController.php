<?php

namespace App\Http\Controllers;

use App\Models\ObservacionesChecklist;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\ObservacionesChecklistRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ObservacionesChecklistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $observacionesChecklists = ObservacionesChecklist::paginate();

        return view('observaciones-checklist.index', compact('observacionesChecklists'))
            ->with('i', ($request->input('page', 1) - 1) * $observacionesChecklists->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $observacionesChecklist = new ObservacionesChecklist();

        return view('observaciones-checklist.create', compact('observacionesChecklist'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ObservacionesChecklistRequest $request): RedirectResponse
    {
        ObservacionesChecklist::create($request->validated());

        return Redirect::route('observaciones-checklists.index')
            ->with('success', 'ObservacionesChecklist created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $observacionesChecklist = ObservacionesChecklist::find($id);

        return view('observaciones-checklist.show', compact('observacionesChecklist'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $observacionesChecklist = ObservacionesChecklist::find($id);

        return view('observaciones-checklist.edit', compact('observacionesChecklist'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ObservacionesChecklistRequest $request, ObservacionesChecklist $observacionesChecklist): RedirectResponse
    {
        $observacionesChecklist->update($request->validated());

        return Redirect::route('observaciones-checklists.index')
            ->with('success', 'ObservacionesChecklist updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        ObservacionesChecklist::find($id)->delete();

        return Redirect::route('observaciones-checklists.index')
            ->with('success', 'ObservacionesChecklist deleted successfully');
    }
}
