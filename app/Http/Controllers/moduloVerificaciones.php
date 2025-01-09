<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class moduloVerificaciones extends Controller
{
    public function transito()
    {
        $cedula = session('cedula');

        // Verificar si la variable de sesión 'cedula' existe y tiene datos
        if (empty($cedula)) {
            // Redirigir a la ruta 'verificaciones.create' si no hay datos en 'cedula'
            return redirect()->route('busquedas.create');
        }
        return view('modulo-verificaciones.transito');
    }

    public function registraduria()
    {
        $cedula = session('cedula');

        // Verificar si la variable de sesión 'cedula' existe y tiene datos
        if (empty($cedula)) {
            // Redirigir a la ruta 'verificaciones.create' si no hay datos en 'cedula'
            return redirect()->route('busquedas.create');
        }
        return view('modulo-verificaciones.registraduria');
    }

    public function seguridadSocial()
    {
        $cedula = session('cedula');

        // Verificar si la variable de sesión 'cedula' existe y tiene datos
        if (empty($cedula)) {
            // Redirigir a la ruta 'verificaciones.create' si no hay datos en 'cedula'
            return redirect()->route('busquedas.create');
        }
        return view('modulo-verificaciones.seguridad_social');
    }

    public function antecedentes()
    {
        $cedula = session('cedula');

        // Verificar si la variable de sesión 'cedula' existe y tiene datos
        if (empty($cedula)) {
            // Redirigir a la ruta 'verificaciones.create' si no hay datos en 'cedula'
            return redirect()->route('busquedas.create');
        }
        return view('modulo-verificaciones.antecedentes');
    }

    public function colpensiones()
    {
        $cedula = session('cedula');

        // Verificar si la variable de sesión 'cedula' existe y tiene datos
        if (empty($cedula)) {
            // Redirigir a la ruta 'verificaciones.create' si no hay datos en 'cedula'
            return redirect()->route('busquedas.create');
        }
        return view('modulo-verificaciones.colpensiones');
    }

    public function seguridad()
    {
        $cedula = session('cedula');

        // Verificar si la variable de sesión 'cedula' existe y tiene datos
        if (empty($cedula)) {
            // Redirigir a la ruta 'verificaciones.create' si no hay datos en 'cedula'
            return redirect()->route('busquedas.create');
        }
        return view('modulo-verificaciones.seguridad');
    }

    public function ugpp()
    {
        $cedula = session('cedula');

        // Verificar si la variable de sesión 'cedula' existe y tiene datos
        if (empty($cedula)) {
            // Redirigir a la ruta 'verificaciones.create' si no hay datos en 'cedula'
            return redirect()->route('busquedas.create');
        }
        return view('modulo-verificaciones.ugpp');
    }

    public function negocios()
    {
        $cedula = session('cedula');

        // Verificar si la variable de sesión 'cedula' existe y tiene datos
        if (empty($cedula)) {
            // Redirigir a la ruta 'verificaciones.create' si no hay datos en 'cedula'
            return redirect()->route('busquedas.create');
        }
        return view('modulo-verificaciones.negocios');
    }

    public function credito()
    {
        $cedula = session('cedula');

        // Verificar si la variable de sesión 'cedula' existe y tiene datos
        if (empty($cedula)) {
            // Redirigir a la ruta 'verificaciones.create' si no hay datos en 'cedula'
            return redirect()->route('busquedas.create');
        }
        return view('modulo-verificaciones.credito');
    }

    public function otros()
    {
        $cedula = session('cedula');

        // Verificar si la variable de sesión 'cedula' existe y tiene datos
        if (empty($cedula)) {
            // Redirigir a la ruta 'verificaciones.create' si no hay datos en 'cedula'
            return redirect()->route('busquedas.create');
        }
        return view('modulo-verificaciones.otros');
    }
}
