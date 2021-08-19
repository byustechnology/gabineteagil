<div class="container-fluid">

    @component('ui::card')

        @slot('title')
            Informações do tipo de ocorrência
        @endslot

        <div class="form-group">
            {!! Form::label('titulo', 'Título do tipo de ocorrência *') !!}
            {!! Form::text('titulo', null, ['class' => 'form-control']) !!}
            <span class="form-text">Preencha um título para identificar o seu tipo de ocorrência.</span>
        </div>

        <div class="form-group">
            {!! Form::label('descricao', 'Descrição') !!}
            {!! Form::textarea('descricao', null, ['class' => 'form-control', 'rows' => 5]) !!}
            <span class="form-text">Informe uma descrição para o tipo da ocorrência. <span class="text-success">Este campo é opcional</span>.</span>
        </div>
    @endcomponent

    @component('ui::card')
        @slot('title')
            Template
        @endslot
        
        <div class="form-group">
            <div id="editor">
                @if (isset($tipo))
                    {!! $tipo->template !!}
                @endif
            </div>
            {!! Form::hidden('template', null, ['id' => 'template', 'class' => 'd-none']) !!}
            <span class="form-text">Informe um documento de referência para o tipo da ocorrência. <span class="text-success">Este campo é opcional</span>. As informações preenchidas aqui serão pré-carregadas dependendo do tipo de ocorrência selecionada. Você pode utilizar este campo para preencher automaticamente alguns campos essenciais para a sua ocorrência.</span>
        </div>
    @endcomponent
    
    @component('ui::form-footer')
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
            $('#template').val(quill.root.innerHTML)

            return true
        });
    </script>
@endsection
