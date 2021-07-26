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
                <span class="form-text">Informe a pessoa que está associada a esta ocorrência. Caso não haja, primeiramente <a href="{{ route('pessoa.create') }}">cadastre uma pessoa</a>.</span>
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

    @component('gabinete::components.card')
        @slot('title')
            Descrição da ocorrência
        @endslot

        <div class="form-group">
            <div id="editor">
                @if (isset($ocorrencia))
                    {!! $ocorrencia->descricao !!}
                @endif
            </div>
            {!! Form::hidden('descricao', null, ['id' => 'descricao', 'class' => 'd-none']) !!}
            <span class="form-text">Digite informações relevantes que descrevam a ocorrência.<br> Essas informações serão salvas na ocorrência para consultas e pesquisas posteriores.</span>
        </div>
    @endcomponent

    @component('gabinete::components.form-footer')
        <button type="submit" class="btn btn-success btn-lg"><i class="far fa-save fa-fw mr-1"></i> Salvar</button>
    @endcomponent
</div>

@section('meta')
    <link href="{{ asset('quilljs/snow.css') }}" rel="stylesheet">
@endsection

@section('scripts')
    <script src="{{ asset('quilljs/quilljs.js') }}"></script>
    <script>

        var toolbarOptions = [
            ['bold', 'italic', 'underline', 'strike'], ['blockquote'],
            [{ 'header': 1 }, { 'header': 2 }], [{ 'list': 'ordered'}, { 'list': 'bullet' }],
            [{ 'indent': '-1'}, { 'indent': '+1' }], [{ 'color': [] }, { 'background': [] }],
            [{ 'align': [] }], ['clean']
        ];

        var quill = new Quill('#editor', {
            modules: {
                toolbar: toolbarOptions
            },
            theme: 'snow'
        });

        $('form').on('submit', function(event) {
            // Associamos o valor do editor Quill ao campo
            $('#descricao').val(quill.root.innerHTML)

            return true
        });
    </script>


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
@endsection

