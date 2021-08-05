<div class="container-fluid">

    @component('ui::card')
        @slot('title')
            <h2 class="h6 d-block mb-0">Informações gerais</h2>
        @endslot
        <div class="form-group">
            {!! Form::label('titulo', 'Título da pessoa *') !!}
            {!! Form::text('titulo', null, ['class' => 'form-control']) !!}
            <span class="form-text">Preencha uma identificação para a pessoa.</span>
        </div>
        <div class="row">
            <div class="col-lg-4 form-group">
                {!! Form::label('tipo', 'Tipo da pessoa') !!}
                {!! Form::select('tipo', [
                    '' => 'Por favor, selecione...'
                ] + \ByusTechnology\Gabinete\Models\Pessoa::TIPO, null, ['class' => 'form-control']) !!}
                <span class="form-text">Por favor, informe o tipo da pessoa. Ao informar o tipo da pessoa, os novos campos irão aparecer.</span>
            </div>
        </div>
    @endcomponent
    
    <div class="switch-pessoa switch-pessoa-fisica">
        @component('ui::card')
            @slot('title')
                <h2 class="h6 d-block mb-0">Pessoa física</h2>
            @endslot

            <div class="row">
                <div class="col-lg-3 form-group">
                    {!! Form::label('documento', 'CPF') !!}
                    {!! Form::text('documento', null, ['class' => 'form-control']) !!}
                    <span class="form-text">Informe o CPF relacionado a esta pessoa. <span class="text-danger">Este campo deve ser único</span>.</span>
                </div>
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
                <div class="col-lg form-group">
                    {!! Form::label('escolaridade', 'Escolaridade') !!}
                    {!! Form::select('escolaridade', [
                        '' => 'Por favor, selecione...', 
                    ] + \ByusTechnology\Gabinete\Models\Pessoa::ESCOLARIDADE, null, ['class' => 'form-control']) !!}
                    <span class="form-text">Informe o estado civil referente a pessoa.</span>
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('profissao', 'Profissão') !!}
                {!! Form::text('profissao', null, ['class' => 'form-control']) !!}
                <span class="form-text">Informe a profissão referente a pessoa.</span>
            </div>
            <div class="row">
                <div class="col-lg-3 form-group">
                    {!! Form::label('estado_civil', 'Estado civil') !!}
                    {!! Form::select('estado_civil', [
                        '' => 'Por favor, selecione...', 
                    ] + \ByusTechnology\Gabinete\Models\Pessoa::ESTADO_CIVIL, null, ['class' => 'form-control']) !!}
                    <span class="form-text">Informe o estado civil referente a pessoa.</span>
                </div>
            </div>
            <div class="row">
                <div class="col-lg form-group">
                    {!! Form::label('conjugue_nome', 'Nome do cônjugue') !!}
                    {!! Form::text('conjugue_nome', null, ['class' => 'form-control']) !!}
                    <span class="form-text">Informe o nome completo do cônjugue.</span>
                </div>
                <div class="col-lg-4 form-group">
                    {!! Form::label('conjugue_nascido_em', 'Data de nascimento do cônjugue') !!}
                    {!! Form::date('conjugue_nascido_em', null, ['class' => 'form-control']) !!}
                    <span class="form-text">Informe a data de nascimento do cônjugue.</span>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-3 form-group">
                    {!! Form::label('filhos', 'Qtde. de filhos') !!}
                    {!! Form::number('filhos', null, ['class' => 'form-control']) !!}
                    <span class="form-text">Informe a quantidade de filhos, ou deixe em branco caso não haja nenhum.</span>
                </div>
                <div class="col-lg-3 form-group">
                    {!! Form::label('renda', 'Renda familiar aprox.') !!}
                    {!! Form::number('renda', null, ['class' => 'form-control', 'step' => 'any']) !!}
                    <span class="form-text">Informe a renda familiar ou deixe em branco caso não deseje informar.</span>
                </div>
                <div class="col-lg-3 form-group">
                    {!! Form::label('residencia_tipo', 'Tipo de residência') !!}
                    {!! Form::select('residencia_tipo', [
                        '' => 'Por favor, selecione...', 
                    ] + \ByusTechnology\Gabinete\Models\Pessoa::RESIDENCIA_TIPO, null, ['class' => 'form-control']) !!}
                    <span class="form-text">Informe o tipo de residência na qual a pessoa reside.</span>
                </div>
                <div class="col-lg-3 form-group">
                    {!! Form::label('moradia_tipo', 'Tipo de moradia') !!}
                    {!! Form::select('moradia_tipo', [
                        '' => 'Por favor, selecione...', 
                    ] + \ByusTechnology\Gabinete\Models\Pessoa::MORADIA_TIPO, null, ['class' => 'form-control']) !!}
                    <span class="form-text">Informe o tipo de moradia na qual a pessoa reside.</span>
                </div>
            </div>
        @endcomponent
    </div>

    <div class="switch-pessoa switch-pessoa-juridica">
        @component('ui::card')
            @slot('title')
                <h2 class="h6 d-block mb-0">Pessoa jurídica</h2>
            @endslot
            <div class="row">
                <div class="col-lg form-group">
                    {!! Form::label('ramo_atuacao', 'Ramo de atuação') !!}
                    {!! Form::text('ramo_atuacao', null, ['class' => 'form-control']) !!}
                    <span class="form-text">Informe o ramo de atuação da pessoa jurídica.</span>
                </div>
                <div class="col-lg-3 form-group">
                    {!! Form::label('fundada_em', 'Fundada em') !!}
                    {!! Form::date('fundada_em', null, ['class' => 'form-control']) !!}
                    <span class="form-text">Informe quando a pessoa jurídica iniciou suas atividades.</span>
                </div>
                <div class="col-lg-3 form-group">
                    {!! Form::label('colaboradores_quantidade', 'Número de colaboradores') !!}
                    {!! Form::select('colaboradores_quantidade', [
                        '' => 'Por favor, selecione...', 
                    ] + \ByusTechnology\Gabinete\Models\Pessoa::COLABORADORES_QUANTIDADE, null, ['class' => 'form-control']) !!}
                    <span class="form-text">Informe o número de colaboradores que prestam serviços para esta pessoa.</span>
                </div>
            </div>
        @endcomponent
    </div>

    @component('ui::card')
        @slot('title')
            <h2 class="h6 d-block mb-0">Endereço e localização</h2>
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

    @if ( ! isset($pessoa))
        <!--
            Caso a pessoa ainda não exista, abrimos 
            o formulário de atalho para os contatos.
        -->
        @component('ui::card')
            @slot('title')
                Informações de contato
            @endslot

            <div class="row">
                <div class="col-lg form-group">
                    {!! Form::label('email', 'E-mail de contato') !!}
                    {!! Form::email('email', null, ['class' => 'form-control']) !!}
                    <span class="form-text">Informe este campo caso você tenha um e-mail de contato para esta pessoa.</span>
                </div>
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

            <div class="alert alert-warning">
               <i class="fas fa-info-circle fa-fw"></i> As informações acima poderão ser cadastradas posteriormente na aba de contatos da pessoa. Caso você não tenha estas informações agora, cadastre a pessoa sem as informações e então posteriormente acesso o menu da pessoa e procure pelo menu "Contatos".
            </div>
        @endcomponent
    @endif

    @component('ui::card')

        @slot('title')
            <h2 class="h6 d-block mb-0">Informações adicionais</h2>
        @endslot
        <div class="row">
            <div class="col-lg-4 form-group">
                {!! Form::label('influencia', 'Influencia') !!}
                {!! Form::select('influencia', [
                    '' => 'Por favor, selecione...', 
                ] + \ByusTechnology\Gabinete\Models\Pessoa::INFLUENCIA, null, ['class' => 'form-control']) !!}
                <span class="form-text">Informe o grau de influência desta pessoa. O grau de influência será utilizado posteriormente nos relatórios</span>
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('observacao', 'Observações') !!}
            {!! Form::textarea('observacao', null, ['class' => 'form-control', 'rows' => 3]) !!}
            <span class="form-text">Utilize este campo para adicionar observações referentes a pessoa. <span class="text-success">Este campo é opcional</span></span>
        </div>

    @endcomponent
   
    @component('ui::form-footer')
        <button type="submit" class="btn btn-success btn-lg"><i class="far fa-save fa-fw mr-1"></i> Salvar</button>
    @endcomponent
</div>

<script>
    $(function() {
        switchPessoa()
        $('#tipo').change(switchPessoa)
    });

    function switchPessoa()
    {
        var pessoa = $('#tipo option:selected').val()
        $('.switch-pessoa').hide()
        
        if (pessoa == 'f') {
            $('.switch-pessoa-fisica').show()
        }

        if (pessoa == 'j') {
            $('.switch-pessoa-juridica').show()
        }
    }
</script>
