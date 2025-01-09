<?php

namespace App\Http\Controllers;

use App\Models\Informe;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\InformeRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class InformeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $informes = Informe::paginate();

        return view('informe.index', compact('informes'))
            ->with('i', ($request->input('page', 1) - 1) * $informes->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $informe = new Informe();

        return view('informe.create', compact('informe'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(InformeRequest $request): RedirectResponse
    {
        Informe::create($request->validated());

        return Redirect::route('informes.index')
            ->with('success', 'Informe created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $informe = Informe::find($id);

        return view('informe.show', compact('informe'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $informe = Informe::find($id);

        return view('informe.edit', compact('informe'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(InformeRequest $request, Informe $informe): RedirectResponse
    {
        $informe->update($request->validated());

        return Redirect::route('informes.index')
            ->with('success', 'Informe updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Informe::find($id)->delete();

        return Redirect::route('informes.index')
            ->with('success', 'Informe deleted successfully');
    }
}
