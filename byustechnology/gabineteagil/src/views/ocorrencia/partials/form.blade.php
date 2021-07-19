<div class="container-fluid">

    @component('gabinete::components.card')

        @slot('title')
            Informações da ocorrência
        @endslot

        <div class="row">
            <div class="col-lg-4 form-group">
                {!! Form::label('assunto_id', 'Assunto *') !!}
                {!! Form::select('assunto_id', [
                '' => 'Por favor, selecione...',
                ] + \ByusTechnology\Gabinete\Models\Assunto::ordenado()->pluck('titulo', 'id')->toArray(), null, ['class' => 'form-control']) !!}
                <span class="form-text">Informe qual o assunto associado a esta ocorrência.</span>
            </div>
            <div class="col-lg-4 form-group">
                {!! Form::label('tipo', 'Tipo da ocorrência') !!}
                {!! Form::select('tipo', [
                    '' => 'Por favor, selecione...', 
                ] + \ByusTechnology\Gabinete\Models\Ocorrencia::TIPOS, null, ['class' => 'form-control']) !!}
                <span class="form-text">Informe o tipo relacionado a esta ocorrência.</span>
            </div>
        </div>
        <div class="row">
            <div class="col-lg form-group">
                {!! Form::label('pessoa_id', 'Pessoa associada *') !!}
                {!! Form::select('pessoa_id', [
                    '' => 'Por favor, selecione...',
                ] + \ByusTechnology\Gabinete\Models\Pessoa::ordenado()->pluck('titulo', 'id')->toArray(), null, ['class' => 'form-control']) !!}
                <span class="form-text">Informe a pessoa que está associada a esta pessoa.</span>
            </div>
            <div class="col-lg form-group">
                {!! Form::label('etapa_id', 'Etapa *') !!}
                {!! Form::select('etapa_id', [
                '' => 'Por favor, selecione...',
                ] + \ByusTechnology\Gabinete\Models\Etapa::ordenado()->pluck('titulo', 'id')->toArray(), null, ['class' => 'form-control']) !!}
                <span class="form-text">Informe qual o assunto associado a esta ocorrência.</span>
            </div>
            <div class="col-lg form-group">
                {!! Form::label('orgao_responsavel_id', 'Orgão responsável *') !!}
                {!! Form::select('orgao_responsavel_id', [
                '' => 'Por favor, selecione...',
                ] + \ByusTechnology\Gabinete\Models\OrgaoResponsavel::ordenado()->pluck('titulo', 'id')->toArray(), null, ['class' => 'form-control']) !!}
                <span class="form-text">Informe qual o orgão responsável associado a esta ocorrência.</span>
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('descricao', 'Descrição da ocorrência *') !!}
            {!! Form::textarea('descricao', null, ['class' => 'form-control']) !!}
            <span class="form-text">Informe uma descrição para esta ocorrência. De preferência a descrição deverá ser detalhada, afim de abranger e facilitar a aquisição das informações.</span>
        </div>
        <div class="row">
            <div class="col-lg-4 form-group">
                {!! Form::label('prevista_para', 'Data prevista') !!}
                {!! Form::date('prevista_para', null, ['class' => 'form-control']) !!}
                <span class="form-text">Informe uma data prevista para a conclusão da ocorrência, ou deixe em branco caso não haja previsão.</span>
            </div>
        </div>
        <hr class="mb-4 mt-5">
        <div class="row">
            <div class="col-lg-4 form-group">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" name="mudar_endereco" id="mudarEndereco">
                    <label class="custom-control-label" for="mudarEndereco">O endereço da pessoa é diferente do endereço da ocorrência?</label>
                    <span class="form-text">Marque este campo caso precise informar um endereço de ocorrência diferente do endereço da pessoa solicitante</span>
                </div>
            </div>
        </div>
    @endcomponent

    <div class="switch-endereco">
        @component('gabinete::components.card')
            @slot('title')
                Endereço da ocorrência
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
    </div>

    @component('gabinete::components.form-footer')
        <button type="submit" class="btn btn-success btn-lg"><i class="far fa-save fa-fw mr-1"></i> Salvar</button>
    @endcomponent
</div>

<script>
    $(function() {
        switchEndereco()
        $('#mudarEndereco').change(switchEndereco)
    });

    function switchEndereco()
    {
        $('.switch-endereco').hide();

        var selecionado = $('#mudarEndereco:checked').length

        if (selecionado == 1) {
            $('.switch-endereco').show()
        }
    }
</script>