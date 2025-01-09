<?php

namespace App\Http\Controllers;

use App\Models\NotificacionesChecklist;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\NotificacionesChecklistRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class NotificacionesChecklistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        /*     $notificacionesChecklists = NotificacionesChecklist::paginate();

        return view('notificaciones-checklist.index', compact('notificacionesChecklists'))
            ->with('i', ($request->input('page', 1) - 1) * $notificacionesChecklists->perPage());
     */
        // Obtener el recuento de notificaciones y las notificaciones reales basadas en el campo 'nueva'
        $notificationCount = NotificacionesChecklist::where('user_id', auth()->id())
                                                    ->where('nueva', true)
                                                     ->count();

        $notifications = NotificacionesChecklist::where('user_id', auth()->id())
                                                ->where('nueva', true)
                                                ->get();
dd('hola');
        // Pasar los datos a la vista
        return view('adminlte::partials.navbar.menu-item-link', compact('notificationCount', 'notifications'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $notificacionesChecklist = new NotificacionesChecklist();

        return view('notificaciones-checklist.create', compact('notificacionesChecklist'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(NotificacionesChecklistRequest $request): RedirectResponse
    {
        NotificacionesChecklist::create($request->validated());

        return Redirect::route('notificaciones-checklists.index')
            ->with('success', 'NotificacionesChecklist created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $notificacionesChecklist = NotificacionesChecklist::find($id);

        return view('notificaciones-checklist.show', compact('notificacionesChecklist'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $notificacionesChecklist = NotificacionesChecklist::find($id);

        return view('notificaciones-checklist.edit', compact('notificacionesChecklist'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(NotificacionesChecklistRequest $request, NotificacionesChecklist $notificacionesChecklist): RedirectResponse
    {
        $notificacionesChecklist->update($request->validated());

        return Redirect::route('notificaciones-checklists.index')
            ->with('success', 'NotificacionesChecklist updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        NotificacionesChecklist::find($id)->delete();

        return Redirect::route('notificaciones-checklists.index')
            ->with('success', 'NotificacionesChecklist deleted successfully');
    }

    public function getUnreadNotificationsCount()
    {
        return NotificacionesChecklist::where('nuevo', 1)->count();
    }
}
