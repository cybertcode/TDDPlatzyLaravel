<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Repository;
use Illuminate\Http\Request;

class RepositoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Para validar los campos
        $request->validate([
            'url' => 'required',
            'description' => 'required',
        ]);
        //Existe un Usuario logueado-utilice el método de las relaciones en el modelo-crearmos un nuevo elemento
        $request->user()->repositories()->create($request->all());
        //Redireccionamos
        return redirect()->route('repositories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\admin\Repository  $repository
     * @return \Illuminate\Http\Response
     */
    public function show(Repository $repository)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\admin\Repository  $repository
     * @return \Illuminate\Http\Response
     */
    public function edit(Repository $repository)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\admin\Repository  $repository
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Repository $repository)
    {
        // Para validar los campos
        $request->validate([
            'url' => 'required',
            'description' => 'required',
        ]);
        /***************
         * Para Policy *
         ***************/
        // Veficamos que si el Usuario logueado es dueño del registro que viene en el array caso contrario abortar
        if ($request->user()->id != $repository->user_id) {
            abort(403);
        }
        // fin policy
        //Pasamos la información-Actualimos todo
        $repository->update($request->all());
        return redirect()->route('repositories.edit', $repository);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\admin\Repository  $repository
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Repository $repository)
    {
        /***************
         * Para Policy *
         ***************/
        // Veficamos que si el Usuario logueado es dueño del registro que viene en el array caso contrario abortar
        if ($request->user()->id != $repository->user_id) {
            abort(403);
        }
        // fin policy

        $repository->delete();
        return redirect()->route('repositories.index');
    }
}