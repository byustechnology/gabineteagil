<?php

namespace ByusTechnology\Gabinete\Http\Controllers;

use App\Http\Controllers\Controller;
use ByusTechnology\Gabinete\Models\OrgaoResponsavel;
use ByusTechnology\Gabinete\Filters\OrgaoResponsavelFilters;
use ByusTechnology\Gabinete\Http\Requests\OrgaoResponsavelRequest;

class OrgaoResponsavelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \ByusTechnology\Gabinete\Filters\OrgaoResponsavelFilters  $filters
     * @return \Illuminate\Http\Response
     */
    public function index(OrgaoResponsavelFilters $filters)
    {
        $orgaos = OrgaoResponsavel::filter($filters)->ordenado()->paginate();
        return view('gabinete::orgao.index', compact('orgaos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('gabinete::orgao.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \ByusTechnology\Gabinete\Http\Requests\OrgaoResponsavelRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrgaoResponsavelRequest $request)
    {
        $orgao = (new OrgaoResponsavel)->fill($request->all());
        $orgao->prefeitura_id = 1; // TODO: Modificar para a prefeitura logada.        
        $orgao->save();

        session()->flash('flash_success', 'Orgão ' . $orgao->titulo . ' adicionado com sucesso!');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \ByusTechnology\Gabinete\Models\OrgaoResponsavel  $orgao
     * @return \Illuminate\Http\Response
     */
    public function show(OrgaoResponsavel $orgao)
    {
        return view('gabinete::orgao.show', compact('orgao'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \ByusTechnology\Gabinete\Models\OrgaoResponsavel  $orgao
     * @return \Illuminate\Http\Response
     */
    public function edit(OrgaoResponsavel $orgao)
    {
        return view('gabinete::orgao.edit', compact('orgao'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \ByusTechnology\Gabinete\Http\Requests\OrgaoResponsavelRequest  $request
     * @param  \ByusTechnology\Gabinete\Models\OrgaoResponsavel  $orgao
     * @return \Illuminate\Http\Response
     */
    public function update(OrgaoResponsavelRequest $request, OrgaoResponsavel $orgao)
    {
        $orgao->fill($request->all());
        $orgao->update();

        session()->flash('flash_success', 'Orgão ' . $orgao->titulo . ' atualizado com sucesso!');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \ByusTechnology\Gabinete\Models\OrgaoResponsavel  $orgao
     * @return \Illuminate\Http\Response
     */
    public function destroy(OrgaoResponsavel $orgao)
    {
        if ($orgao->ocorrencias->count()) {
            return back()->withErrors(['Desculpe, mas o orgão ' . $orgao->titulo . ' já está sendo utilizado em uma ocorrência. Altere o orgão responsável de todas as ocorrências associadas a este orgão, e então faça a remoção.']);
        }

        $orgao->delete();
        session()->flash('flash_danger', 'Orgão ' . $orgao->titulo . ' removida com sucesso!');
        return back();
    }
}
