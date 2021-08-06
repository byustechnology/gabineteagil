<!-- Mensagem -->
{!! Form::open(['url' => route('pessoa.store'), 'method' => 'post', 'files' => 'true']) !!}
<div class="modal fade" id="m-pessoa" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content shadow-lg">
            <div class="modal-header">
                <h5 class="modal-title">Adicionar pessoa</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    {!! Form::label('titulo', 'Título da pessoa *') !!}
                    {!! Form::text('titulo', null, ['class' => 'form-control']) !!}
                    <span class="form-text">Preencha uma identificação para a pessoa.</span>
                </div>
                <div class=" form-group">
                    {!! Form::label('tipo', 'Tipo da pessoa') !!}
                    {!! Form::select('tipo', [
                        '' => 'Por favor, selecione...'
                    ] + \ByusTechnology\Gabinete\Models\Pessoa::TIPO, null, ['class' => 'form-control']) !!}
                    <span class="form-text">Por favor, informe o tipo da pessoa. Ao informar o tipo da pessoa, os novos campos irão aparecer.</span>
                </div>

                <div class="switch-pessoa switch-pessoa-fisica">
                    <hr>
                    <div class="form-group">
                        {!! Form::label('documento', 'CPF') !!}
                        {!! Form::text('documento', null, ['class' => 'form-control']) !!}
                        <span class="form-text">Informe o CPF relacionado a esta pessoa. <span class="text-danger">Este campo deve ser único</span>.</span>
                    </div>

                    <div class="row">
                        <div class="col-lg form-group">
                            {!! Form::label('genero', 'Gênero') !!}
                            {!! Form::select('genero', [
                                '' => 'Por favor, selecione...', 
                            ] + \ByusTechnology\Gabinete\Models\Pessoa::GENERO, null, ['class' => 'form-control']) !!}
                            <span class="form-text">Informe o gênero referente a pessoa.</span>
                        </div>
                        <div class="col-lg form-group">
                            {!! Form::label('nascido_em', 'Data de nascimento') !!}
                            {!! Form::date('nascido_em', null, ['class' => 'form-control']) !!}
                            <span class="form-text">Informe uma data de nascimento.</span>
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('escolaridade', 'Escolaridade') !!}
                        {!! Form::select('escolaridade', [
                            '' => 'Por favor, selecione...', 
                        ] + \ByusTechnology\Gabinete\Models\Pessoa::ESCOLARIDADE, null, ['class' => 'form-control']) !!}
                        <span class="form-text">Informe o estado civil referente a pessoa.</span>
                    </div>
                    <div class="form-group">
                        {!! Form::label('profissao', 'Profissão') !!}
                        {!! Form::text('profissao', null, ['class' => 'form-control']) !!}
                        <span class="form-text">Informe a profissão referente a pessoa.</span>
                    </div>
                    <div class="form-group">
                        {!! Form::label('estado_civil', 'Estado civil') !!}
                        {!! Form::select('estado_civil', [
                            '' => 'Por favor, selecione...', 
                        ] + \ByusTechnology\Gabinete\Models\Pessoa::ESTADO_CIVIL, null, ['class' => 'form-control']) !!}
                        <span class="form-text">Informe o estado civil referente a pessoa.</span>
                    </div>
                    <div class="form-group">
                        {!! Form::label('conjugue_nome', 'Nome do cônjugue') !!}
                        {!! Form::text('conjugue_nome', null, ['class' => 'form-control']) !!}
                        <span class="form-text">Informe o nome completo do cônjugue.</span>
                    </div>
                    <div class="form-group">
                        {!! Form::label('conjugue_nascido_em', 'Data de nascimento do cônjugue') !!}
                        {!! Form::date('conjugue_nascido_em', null, ['class' => 'form-control']) !!}
                        <span class="form-text">Informe a data de nascimento do cônjugue.</span>
                    </div>

                    <div class="row">
                        <div class="col-lg form-group">
                            {!! Form::label('filhos', 'Qtde. de filhos') !!}
                            {!! Form::number('filhos', null, ['class' => 'form-control']) !!}
                            <span class="form-text">Informe a quantidade de filhos, ou deixe em branco caso não haja nenhum.</span>
                        </div>
                        <div class="col-lg form-group">
                            {!! Form::label('renda', 'Renda familiar aprox.') !!}
                            {!! Form::number('renda', null, ['class' => 'form-control', 'step' => 'any']) !!}
                            <span class="form-text">Informe a renda familiar ou deixe em branco caso não deseje informar.</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg form-group">
                            {!! Form::label('residencia_tipo', 'Tipo de residência') !!}
                            {!! Form::select('residencia_tipo', [
                                '' => 'Por favor, selecione...', 
                            ] + \ByusTechnology\Gabinete\Models\Pessoa::RESIDENCIA_TIPO, null, ['class' => 'form-control']) !!}
                            <span class="form-text">Informe o tipo de residência na qual a pessoa reside.</span>
                        </div>
                        <div class="col-lg form-group">
                            {!! Form::label('moradia_tipo', 'Tipo de moradia') !!}
                            {!! Form::select('moradia_tipo', [
                                '' => 'Por favor, selecione...', 
                            ] + \ByusTechnology\Gabinete\Models\Pessoa::MORADIA_TIPO, null, ['class' => 'form-control']) !!}
                            <span class="form-text">Informe o tipo de moradia na qual a pessoa reside.</span>
                        </div>
                    </div>
                    <hr>
                </div>

                <div class="switch-pessoa switch-pessoa-juridica">
                    <hr>
                    <div class="form-group">
                        {!! Form::label('ramo_atuacao', 'Ramo de atuação') !!}
                        {!! Form::text('ramo_atuacao', null, ['class' => 'form-control']) !!}
                        <span class="form-text">Informe o ramo de atuação da pessoa jurídica.</span>
                    </div>
                    <div class="row">
                        <div class="col-lg form-group">
                            {!! Form::label('fundada_em', 'Fundada em') !!}
                            {!! Form::date('fundada_em', null, ['class' => 'form-control']) !!}
                            <span class="form-text">Informe quando a pessoa jurídica iniciou suas atividades.</span>
                        </div>
                        <div class="col-lg form-group">
                            {!! Form::label('colaboradores_quantidade', 'Número de colaboradores') !!}
                            {!! Form::select('colaboradores_quantidade', [
                                '' => 'Por favor, selecione...', 
                            ] + \ByusTechnology\Gabinete\Models\Pessoa::COLABORADORES_QUANTIDADE, null, ['class' => 'form-control']) !!}
                            <span class="form-text">Informe o número de colaboradores que prestam serviços para esta pessoa.</span>
                        </div>
                    </div>
                    <hr>
                </div>
                
                <!-- Endereço -->
                <div class="form-group">
                    {!! Form::label('cep', 'CEP') !!}
                    {!! Form::text('cep', null, ['class' => 'form-control']) !!}
                    <span class="form-text">Informe o CEP referente ao endereço.</span>
                </div>
                <div class="form-group">
                    {!! Form::label('logradouro', 'Logradouro') !!}
                    {!! Form::text('logradouro', null, ['class' => 'form-control']) !!}
                    <span class="form-text">Informe o logradouro referente ao endereço.</span>
                </div>

                <div class="row">
                    <div class="col-lg form-group">
                        {!! Form::label('numero', 'Número') !!}
                        {!! Form::text('numero', null, ['class' => 'form-control']) !!}
                        <span class="form-text">Informe o número referente ao endereço.</span>
                    </div>
                    <div class="col-lg form-group">
                        {!! Form::label('complemento', 'Complemento') !!}
                        {!! Form::text('complemento', null, ['class' => 'form-control']) !!}
                        <span class="form-text">Utilize este campo para informa um complemento do endereço. Por exemplo: apto 300, bloco 08...</span>
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('bairro', 'Bairro') !!}
                    {!! Form::text('bairro', null, ['class' => 'form-control']) !!}
                    <span class="form-text">Informe o bairro referente ao endereço.</span>
                </div>
                <div class="form-group">
                    {!! Form::label('cidade', 'Cidade') !!}
                    {!! Form::text('cidade', null, ['class' => 'form-control']) !!}
                    <span class="form-text">Informe a cidade referente ao endereço.</span>
                </div>
                <div class="form-group">
                    {!! Form::label('estado', 'Estado') !!}
                    {!! Form::select('estado', [
                        '' => 'Por favor, selecione...', 
                    ] + \ByusTechnology\Gabinete\Models\Estado::LISTA, null, ['class' => 'form-control']) !!}
                    <span class="form-text">Informe o estado referente a cidade escolhida.</span>
                </div>
                
                <!-- Formas de contato -->
                @if ( ! isset($pessoa))
                    <div class="form-group">
                        {!! Form::label('email', 'E-mail de contato') !!}
                        {!! Form::email('email', null, ['class' => 'form-control']) !!}
                        <span class="form-text">Informe este campo caso você tenha um e-mail de contato para esta pessoa.</span>
                    </div>
                    <div class="row">
                        <div class="col-lg form-group">
                            {!! Form::label('telefone', 'Telefone fixo') !!}
                            {!! Form::text('telefone', null, ['class' => 'form-control']) !!}
                            <span class="form-text">Informe este campo caso você tenha o número do telefone fixo da pessoa.</span>
                        </div>
                        <div class="col-lg form-group">
                            {!! Form::label('celular', 'Celular') !!}
                            {!! Form::text('celular', null, ['class' => 'form-control']) !!}
                            <span class="form-text">Informe este campo caso você tenha o número do celular fixo da pessoa.</span>
                        </div>
                    </div>
                @endif

                <div class="form-group">
                    {!! Form::label('influencia', 'Influencia') !!}
                    {!! Form::select('influencia', [
                        '' => 'Por favor, selecione...', 
                    ] + \ByusTechnology\Gabinete\Models\Pessoa::INFLUENCIA, null, ['class' => 'form-control']) !!}
                    <span class="form-text">Informe o grau de influência desta pessoa. O grau de influência será utilizado posteriormente nos relatórios</span>
                </div>
                <div class="form-group">
                    {!! Form::label('observacao', 'Observações') !!}
                    {!! Form::textarea('observacao', null, ['class' => 'form-control', 'rows' => 3]) !!}
                    <span class="form-text">Utilize este campo para adicionar observações referentes a pessoa. <span class="text-success">Este campo é opcional</span></span>
                </div>
            </div>
            <div class="modal-footer">
                {!! Form::submit('Cadastrar pessoa', ['class' => 'btn btn-success']) !!}
            </div>
        </div>
    </div>
</div>
{!! Form::close() !!}

<script>
    $(function() {
        switchPessoa()
        $('#m-pessoa select[name="tipo"]').change(switchPessoa)

        $('#m-pessoa').parents('form').submit(function(event) {
            event.preventDefault()

            const params = $(this).serializeArray().reduce((arr, item) => {
                arr[item.name] = item.value
                return arr
            }, {})

            $.ajax('{{ route('pessoa.store') }}', {
                type: 'POST', 
                data: params, 
                dataType: 'json'
            })
            .done(function(data) {
                $('#pessoa_id').append(new Option(data.pessoa.titulo, data.pessoa.id))
                $('#pessoa_id').val(data.pessoa.id)
                $('#m-pessoa').modal('hide')
                $('#m-pessoa').parents('form').trigger('reset')
                switchPessoa()
            })
            .fail(function(data) {
                var errors = '';

                $.each(JSON.parse(data.responseText).errors, function(key, value) {
                    errors = errors + value[0] + "\n"
                })

                alert(errors)
            });
        })
    });

    function switchPessoa()
    {
        var pessoa = $('#m-pessoa select[name="tipo"] option:selected').val()
        $('.switch-pessoa').hide()
        
        if (pessoa == 'f') {
            $('.switch-pessoa-fisica').show()
        }

        if (pessoa == 'j') {
            $('.switch-pessoa-juridica').show()
        }
    }
</script>