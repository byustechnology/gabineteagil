<?php

namespace ByusTechnology\Gabinete\Http\Controllers;

use App\Http\Controllers\Controller;
use ByusTechnology\Gabinete\Models\Agenda;
use ByusTechnology\Gabinete\Filters\AgendaFilters;
use ByusTechnology\Gabinete\Http\Resources\FullCalendarResource;

class FullCalendarController extends Controller
{
    public function __invoke(AgendaFilters $filters)
    {
        return FullCalendarResource::collection(Agenda::filter($filters)->ordenado()->get());
    }
}
