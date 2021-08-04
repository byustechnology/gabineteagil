<div class="container-fluid">

    @component('ui::card')

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
    @endcomponent

    @component('ui::card')
        @slot('title')
            Informações adicionais
        @endslot

        <div class="row">
            <div class="col-lg form-group">
                {!! Form::label('orgao_responsavel_id', 'Orgão responsável *') !!}
                {!! Form::select('orgao_responsavel_id', [
                '' => 'Por favor, selecione...',
                ] + \ByusTechnology\Gabinete\Models\OrgaoResponsavel::ordenado()->pluck('titulo', 'id')->toArray(), null, ['class' => 'form-control']) !!}
                <span class="form-text">Informe qual o orgão responsável associado a esta ocorrência.</span>
            </div>
            <div class="col-lg-4 form-group">
                {!! Form::label('user_id', 'Usuário associado') !!}
                {!! Form::select('user_id', [
                    '' => 'Por favor, selecione...', 
                ] + \App\Models\User::orderBy('name')->pluck('name', 'id')->toArray(), null, ['class' => 'form-control']) !!}
                <span class="form-text">Informe o usuário atrelado a esta agenda.</span>
            </div>
            <div class="col-lg-4 form-group">
                {!! Form::label('cor', 'Associar uma cor') !!}
                {!! Form::select('cor', ['' => 'Por favor, selecione...'] + \ByusTechnology\Gabinete\Models\Agenda::CORES, null, ['class' => 'form-control']) !!}
                <span class="form-text">Informe caso deseje associar uma cor para este agendamento.</span>
            </div>
        </div>
    @endcomponent

    @component('ui::card')
        @slot('title')
            Endereço do agendamento
        @endslot

        <div class="row">
            <div class="col-lg-3 form-group">
                {!! Form::label('cep', 'CEP') !!}
                {!! Form::text('cep', null, ['class' => 'form-control']) !!}
                <span class="form-text">Informe o CEP referente ao endereço.</span>
            </div>
            <div class="col-lg form-group">
                {!! Form::label('logradouro', 'Logradouro') !!}
                {!! Form::text('logradouro', null, ['class' => 'form-control']) !!}
                <span class="form-text">Informe o logradouro referente ao endereço.</span>
            </div>
            <div class="col-lg-3 form-group">
                {!! Form::label('numero', 'Número') !!}
                {!! Form::text('numero', null, ['class' => 'form-control']) !!}
                <span class="form-text">Informe o número referente ao endereço.</span>
            </div>
        </div>
        
        <div class="form-group">
            {!! Form::label('complemento', 'Complemento') !!}
            {!! Form::text('complemento', null, ['class' => 'form-control']) !!}
            <span class="form-text">Utilize este campo para informa um complemento do endereço. Por exemplo: apto 300, bloco 08...</span>
        </div>

        <div class="row">
            <div class="col-lg form-group">
                {!! Form::label('bairro', 'Bairro') !!}
                {!! Form::text('bairro', null, ['class' => 'form-control']) !!}
                <span class="form-text">Informe o bairro referente ao endereço.</span>
            </div>
            <div class="col-lg form-group">
                {!! Form::label('cidade', 'Cidade') !!}
                {!! Form::text('cidade', null, ['class' => 'form-control']) !!}
                <span class="form-text">Informe a cidade referente ao endereço.</span>
            </div>
            <div class="col-lg-3 form-group">
                {!! Form::label('estado', 'Estado') !!}
                {!! Form::select('estado', [
                    '' => 'Por favor, selecione...', 
                ] + \ByusTechnology\Gabinete\Models\Estado::LISTA, null, ['class' => 'form-control']) !!}
                <span class="form-text">Informe o estado referente a cidade escolhida.</span>
            </div>
        </div>
    @endcomponent
    
    @component('ui::form-footer')
        <button type="submit" class="btn btn-success btn-lg"><i class="far fa-save fa-fw mr-1"></i> Salvar</button>
    @endcomponent

</div>
