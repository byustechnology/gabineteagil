<div class="container-fluid">

    @component('ui::card')

        @slot('title')
            Informações da usuário
        @endslot

        <div class="form-group">
            {!! Form::label('name', 'Nome completo *') !!}
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
            <span class="form-text">Informe o nome completo do usuário. Este nome será utilizado no sistema.</span>
        </div>
        <div class="form-group">
            {!! Form::label('email', 'E-mail de cadastro *') !!}
            {!! Form::email('email', null, ['class' => 'form-control']) !!}
            <span class="form-text">Informe o e-mail de cadastro do usuário. <span class="text-success">Este e-mail será utilizado para realizar login no sistema</span>.</span>
        </div>

        <div class="form-group">
            {!! Form::label('type', 'Tipo do usuário') !!}
            {!! Form::select('type', [
                '' => 'Por favor, selecione...', 
                'admin' => 'Administrador (acesso total)', 
                'funcionario' => 'Funcionário',     
                'vereador' => 'Vereador',     
            ], null, ['class' => 'form-control']) !!}
            <span class="form-text">Informe qual o tipo de acesso referente a este usuário. Dependendo do nível de acesso algumas permissões poderão ser dadas ou negadas.</span>
        </div>
    @endcomponent

    @component('ui::card')
        @slot('title')
            Credenciais e segurança
        @endslot

        <div class="row">
            <div class="col-lg-3 form-group">
                {!! Form::label('password', 'Senha') !!}
                {!! Form::password('password', ['class' => 'form-control']) !!}
                <span class="form-text">Informe uma senha para o usuário. A senha deve conter no mínimo 06 dígitos.</span>
            </div>
            <div class="col-lg-3 form-group">
                {!! Form::label('password_confirmation', 'Confirme a sua senha') !!}
                {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
                <span class="form-text">Informe novamente a senha digitada ao lado para confirmarmos a sua senha.</span>
            </div>
        </div>
    @endcomponent
    
    @component('ui::form-footer')
        <button type="submit" class="btn btn-success btn-lg"><i class="far fa-save fa-fw mr-1"></i> Salvar</button>
    @endcomponent

</div>
