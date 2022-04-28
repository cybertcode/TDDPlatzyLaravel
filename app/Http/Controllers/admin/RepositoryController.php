<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\RepositoryRequest;
use App\Models\admin\Repository;
use Illuminate\Http\Request;

class RepositoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('admin.pages.repositories.index', ['repositories' => $request->user()->repositories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.repositories.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RepositoryRequest $request)
    {
        // Para validar los campos
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
    public function show(Request $request, Repository $repository)
    {
        /***************
         * Para Policy *
         ***************/
        // Veficamos que si el Usuario logueado es dueño del registro que viene en el array caso contrario abortar
        if ($request->user()->id != $repository->user_id) {
            abort(403);
        }
        // fin policy
        return view('admin.pages.repositories.show', compact('repository'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\admin\Repository  $repository
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Repository $repository)
    {
        /***************
         * Para Policy *
         ***************/
        // Veficamos que si el Usuario logueado es dueño del registro que viene en el array caso contrario abortar
        if ($request->user()->id != $repository->user_id) {
            abort(403);
        }
        // fin policy
        return view('admin.pages.repositories.edit', compact('repository'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\admin\Repository  $repository
     * @return \Illuminate\Http\Response
     */
    public function update(RepositoryRequest $request, Repository $repository)
    {
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