<div class="container-fluid">

    @component('gabinete::components.card')

        @slot('title')
            Informações do agendamento
        @endslot

        <div class="form-group">
            {!! Form::label('titulo', 'Título do agendamento') !!}
            {!! Form::text('titulo', null, ['class' => 'form-control']) !!}
            <span class="form-text">Defina um título para o seu agendamento. O título irá te ajudar a lembrar o assunto da sua agenda.</span>
        </div>
        <div class="form-group">
            {!! Form::label('descricao', 'Descrição') !!}
            {!! Form::textarea('descricao', null, ['class' => 'form-control', 'rows' => 5]) !!}
            <span class="form-text">Informe uma descrição para o seu agendamento. <span class="text-success">Este campo é opcional</span>.</span>
        </div>

        <div class="row">
            <div class="col-lg-3 form-group">
                {!! Form::label('inicio_em', 'Inicio em') !!}
                {!! Form::date('inicio_em', null, ['class' => 'form-control']) !!}
                <span class="form-text">Informe uma data de início.</span>
            </div>
            <div class="col-lg-3 form-group">
                {!! Form::label('inicio_em_horario', 'Hora de início') !!}
                {!! Form::text('inicio_em_horario', null, ['class' => 'form-control']) !!}
                <span class="form-text">Informe uma hora de início.</span>
            </div>
            <div class="col-lg-3 form-group">
                {!! Form::label('termino_em', 'Término em') !!}
                {!! Form::date('termino_em', null, ['class' => 'form-control']) !!}
                <span class="form-text">Informe uma data de término.</span>
            </div>
            <div class="col-lg-3 form-group">
                {!! Form::label('termino_em_horario', 'Hora de término') !!}
                {!! Form::text('termino_em_horario', null, ['class' => 'form-control']) !!}
                <span class="form-text">Informe uma hora de término.</span>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4 form-group">
                {!! Form::label('user_id', 'Usuário associado') !!}
                {!! Form::select('user_id', [
                    '' => 'Por favor, selecione...', 
                ] + \App\Models\User::orderBy('name')->pluck('name', 'id')->toArray(), null, ['class' => 'form-control']) !!}
                <span class="form-text">Informe o usuário atrelado a esta agenda.</span>
            </div>
        </div>
    @endcomponent
    
    @component('gabinete::components.form-footer')
        <button type="submit" class="btn btn-success btn-lg"><i class="far fa-save fa-fw mr-1"></i> Salvar</button>
    @endcomponent

</div>
