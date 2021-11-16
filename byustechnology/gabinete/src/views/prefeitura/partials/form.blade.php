<div class="container-fluid">

    @component('ui::card')

        @slot('title')
            Informações da prefeitura
        @endslot

        <div class="form-group">
            {!! Form::label('titulo', 'Título da prefeitura *') !!}
            {!! Form::text('titulo', null, ['class' => 'form-control']) !!}
            <span class="form-text">Informe o nome completo do usuário. Este nome será utilizado no sistema.</span>
        </div>

        <div class="row">
            <div class="col-lg-7 form-group">
                {!! Form::label('cidade', 'Cidade') !!}
                {!! Form::text('cidade', null, ['class' => 'form-control']) !!}
                <span class="form-text">Informe a cidade referente a prefeitura.</span>
            </div>
            <div class="col-lg-5 form-group">
                {!! Form::label('estado', 'Estado') !!}
                {!! Form::select('estado', [
                    '' => 'Por favor, selecione...',
                ] + \ByusTechnology\Gabinete\Models\Estado::LISTA, null, ['class' => 'form-control']) !!}
                <span class="form-text">Informe o estado referente a prefeitura.</span>
            </div>
        </div>
    @endcomponent

    @if ( ! isset($prefeitura))
        @component('ui::card')
            @slot('title')
                Usuário principal
            @endslot

            <div class="row">
                <div class="col-lg-6 form-group">
                    {!! Form::label('user_name', 'Nome do usuário') !!}
                    {!! Form::text('user_name', null, ['class' => 'form-control']) !!}
                    <span class="form-text">Informe o nome do usuário responsável por esta prefeitura.</span>
                </div>
                <div class="col-lg-6 form-group">
                    {!! Form::label('user_email', 'E-mail do usuário') !!}
                    {!! Form::text('user_email', null, ['class' => 'form-control']) !!}
                    <span class="form-text">Informe o email do usuário responsável por esta prefeitura. <strong class="text-danger">O e-mail deverá ser único e não pode ser repetido entre prefeituras.</strong></span>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-3 form-group">
                    {!! Form::label('user_password', 'Senha do usuário') !!}
                    {!! Form::password('user_password', ['class' => 'form-control']) !!}
                    <span class="form-text">Informe uma senha para o usuário atrelado a prefeitura. <strong class="text-danger">A senha deve contér no mínimo 06 dígitos.</strong></span>
                </div>
                <div class="col-lg-3 form-group">
                    {!! Form::label('user_password_confirmation', 'Confirme sua senha') !!}
                    {!! Form::password('user_password_confirmation', ['class' => 'form-control']) !!}
                    <span class="form-text">Por favor, confirme a senha do usuário informado.</span>
                </div>
            </div>
        @endcomponent
    @endif

    @component('ui::form-footer')
        <button type="submit" class="btn btn-success btn-lg"><i class="far fa-save fa-fw mr-1"></i> Salvar</button>
    @endcomponent

</div>
