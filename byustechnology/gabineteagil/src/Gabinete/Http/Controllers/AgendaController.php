<?php

namespace ByusTechnology\Gabinete\Http\Controllers;

use App\Http\Controllers\Controller;
use ByusTechnology\Gabinete\Models\Agenda;
use ByusTechnology\Gabinete\Filters\AgendaFilters;
use ByusTechnology\Gabinete\Http\Requests\AssuntoRequest;

class AgendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \ByusTechnology\Gabinete\Filters\AgendaFilters  $filters
     * @return \Illuminate\Http\Response
     */
    public function index(AgendaFilters $filters)
    {
        $agendas = Agenda::filter($filters)->ordenado()->paginate();
        return view('gabinete::agenda.index', compact('agendas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('gabinete::agenda.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \ByusTechnology\Gabinete\Http\Requests\AssuntoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AssuntoRequest $request)
    {
        $agenda = (new Agenda)->fill($request->all());
        $agenda->prefeitura_id = 1;
        $agenda->save();

        session()->flash('flash_success', 'Agenda ' . $agenda->titulo . ' adicionado com sucesso!');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \ByusTechnology\Gabinete\Models\Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function show(Agenda $agenda)
    {
        return view('gabinete::agenda.show', compact('agenda'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \ByusTechnology\Gabinete\Models\Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function edit(Agenda $agenda)
    {
        return view('gabinete::agenda.edit', compact('agenda'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \ByusTechnology\Gabinete\Http\Requests\AssuntoRequest  $request
     * @param  \ByusTechnology\Gabinete\Models\Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function update(AssuntoRequest $request, Agenda $agenda)
    {
        $agenda->fill($request->all());
        $agenda->update();

        session()->flash('flash_success', 'Agenda ' . $agenda->titulo . ' atualizada com sucesso!');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \ByusTechnology\Gabinete\Models\Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function destroy(Agenda $agenda)
    {
        $agenda->delete();
        session()->flash('flash_danger', 'Agenda ' . $agenda->titulo . ' removida com sucesso!');
        return back();
    }
}
