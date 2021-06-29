<footer class="mt-5 d-block">
    <div class="container my-5">
        <div class="row">
            <div class="col-lg-3 my-3">
                <img class="d-block mb-3" src="{{ asset('assets/images/logotipo.png') }}" alt="Logotipo {{ config('app.name') }}" width="100">
                <small>{{ config('app.name') }} é um programa licenciado para Prefeitura de Rio Claro/SP. Desenvolvido por <a href="#">BYUS Tecnologia</a>. Todos os direitos reservados. Em caso de dúvidas, procure o suporte online.</small>
            </div>
            <div class="my-3 offset-lg-1 col-lg-2">
                <h4 class="h5">Ocorrências</h4>
                <ul class="list-unstyled mt-3">
                    <li><a href="{{ route('ocorrencia.index') }}">Listar ocorrências</a></li>
                    <li><a href="{{ route('ocorrencia.create') }}">Cadastrar ocorrência</a></li>
                </ul>
            </div>
            <div class="my-3 col-lg-2">
                <h4 class="h5">Pessoas</h4>
                <ul class="list-unstyled mt-3">
                    <li><a href="{{ route('pessoa.index') }}">Listar pessoas</a></li>
                    <li><a href="{{ route('pessoa.create') }}">Cadastrar pessoas</a></li>
                </ul>
            </div>
            <div class="my-3 col-lg-2">
                <h4 class="h5">Cadastros</h4>
                <ul class="list-unstyled mt-3">
                    <li><a href="{{ route('orgao.index') }}">Orgãos responsáveis</a></li>
                    <li><a href="{{ route('orgao.create') }}">Novo orgão responsável</a></li>
                    <li><a href="{{ route('assunto.index') }}">Listar assuntos</a></li>
                    <li><a href="{{ route('assunto.create') }}">Cadastrar assuntos</a></li>
                </ul>
            </div>
            <div class="my-3 col-lg-2">
                <h4 class="h5">Minha conta</h4>
                <ul class="list-unstyled mt-3">
                    <li><a href="#">Meus dados</a></li>
                    <li><a href="#">Alterar minha senha</a></li>
                    <li><a href="#">Sair</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>