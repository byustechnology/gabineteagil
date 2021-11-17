<?php

namespace ByusTechnology\Gabinete\Actions;

use ByusTechnology\Gabinete\Models\Prefeitura;
use ByusTechnology\Gabinete\Models\Etapa;
use ByusTechnology\Gabinete\Models\Assunto;
use ByusTechnology\Gabinete\Models\TipoOcorrencia;
use ByusTechnology\Gabinete\Models\OrgaoResponsavel;
use ByusTechnology\Gabinete\Models\Usuario;
use Exception;

class CriarPrefeitura {

    public $prefeitura;

    public function __construct(Prefeitura $prefeitura, array $parameters)
    {
        $this->prefeitura = $prefeitura;
        $this->parameters = $parameters;
    }

    public function handle()
    {
        $usuarioRoot = $this->criarUsuarioRoot();
        $usuarioRoot->prefeitura_id = $this->prefeitura->id;
        $usuarioRoot->update();

        $this->criarEtapas();
        $this->criarOrgaosResponsaveis();
        $this->criarAssuntos();
        $this->criarTipoOcorrencias();
    }

    public function criarUsuarioRoot()
    {
        return Usuario::create([
            'name' => $this->parameters['user_name'],
            'email' => $this->parameters['user_email'],
            'type' => 'admin',
            'password' => bcrypt($this->parameters['password']),
        ]);
    }

    public function criarEtapas()
    {
        $faker = \Faker\Factory::create();

        $etapas = [
            'Aguardando',
            'Em análise',
            'Enviado para cotação',
            'Aguardando seleção',
            'Em fase de preparação',
            'Executando',
            'Finalizando',
        ];

        foreach($etapas as $ordem => $etapa) {
            Etapa::firstOrCreate([
                'prefeitura_id' => $this->prefeitura->id,
                'codigo' => 'ET-' . $ordem,
                'titulo' => $etapa,
                'ordem' => $ordem,
                'cor' => $faker->hexcolor(),
            ]);
        }
    }

    public function criarTipoOcorrencias()
    {
        TipoOcorrencia::firstOrCreate([
            'prefeitura_id' => $this->prefeitura->id,
            'titulo' => 'Requerimento'
        ]);

        TipoOcorrencia::firstOrCreate([
            'prefeitura_id' => $this->prefeitura->id,
            'titulo' => 'Indicação'
        ]);

        TipoOcorrencia::firstOrCreate([
            'prefeitura_id' => $this->prefeitura->id,
            'titulo' => 'Ofício'
        ]);

        TipoOcorrencia::firstOrCreate([
            'prefeitura_id' => $this->prefeitura->id,
            'titulo' => 'Moção'
        ]);

        TipoOcorrencia::firstOrCreate([
            'prefeitura_id' => $this->prefeitura->id,
            'titulo' => 'Projeto'
        ]);
    }

    public function criarOrgaosResponsaveis()
    {
        OrgaoResponsavel::create([
            'titulo' => 'Secretaria de agricultura',
            'cor' => '#03bb85',
            'prefeitura_id' => $this->prefeitura->id,
        ]);
        OrgaoResponsavel::create([
            'titulo' => 'Secretaria de meio ambiente',
            'cor' => '#008000',
            'prefeitura_id' => $this->prefeitura->id,
        ]);
        OrgaoResponsavel::create([
            'titulo' => 'Departamento de água e esgoto',
            'cor' => '#0000ff',
            'prefeitura_id' => $this->prefeitura->id,
        ]);
        OrgaoResponsavel::create([
            'titulo' => 'Secretaria de segurança',
            'cor' => '#ff0000',
            'prefeitura_id' => $this->prefeitura->id,
        ]);
        OrgaoResponsavel::create([
            'titulo' => 'Defesa civil',
            'cor' => '#ffff00',
            'prefeitura_id' => $this->prefeitura->id,
        ]);
        OrgaoResponsavel::create([
            'titulo' => 'Secretaria Mobilidade urbana',
            'cor' => '#4169e1',
            'prefeitura_id' => $this->prefeitura->id,
        ]);
        OrgaoResponsavel::create([
            'titulo' => 'Guarda civil',
            'cor' => '#f5f5dc',
            'prefeitura_id' => $this->prefeitura->id,
        ]);
        OrgaoResponsavel::create([
            'titulo' => 'Secretaria de habitação',
            'cor' => '#f4bb29',
            'prefeitura_id' => $this->prefeitura->id,
        ]);
        OrgaoResponsavel::create([
            'titulo' => 'Secretaria de governo',
            'cor' => '#38b0de',
            'prefeitura_id' => $this->prefeitura->id,
        ]);
        OrgaoResponsavel::create([
            'titulo' => 'Secretaria de administração',
            'cor' => '#add8e6',
            'prefeitura_id' => $this->prefeitura->id,
        ]);
        OrgaoResponsavel::create([
            'titulo' => 'Secretaria de desenvolvimento social',
            'cor' => '#c8a2c8',
            'prefeitura_id' => $this->prefeitura->id,
        ]);
        OrgaoResponsavel::create([
            'titulo' => 'Fundo social de solidariedade',
            'cor' => '#ffcbcb',
            'prefeitura_id' => $this->prefeitura->id,
        ]);
        OrgaoResponsavel::create([
            'titulo' => 'Secretaria de finanças',
            'cor' => '#ffdf00',
            'prefeitura_id' => $this->prefeitura->id,
        ]);
        OrgaoResponsavel::create([
            'titulo' => 'Secretaria de negócios juridicos',
            'cor' => '#000000',
            'prefeitura_id' => $this->prefeitura->id,
        ]);
        OrgaoResponsavel::create([
            'titulo' => 'Gabinete do prefeito',
            'cor' => '#00008b',
            'prefeitura_id' => $this->prefeitura->id,
        ]);
        OrgaoResponsavel::create([
            'titulo' => 'Secretaria de educação',
            'cor' => '#d1f3c5',
            'prefeitura_id' => $this->prefeitura->id,
        ]);
        OrgaoResponsavel::create([
            'titulo' => 'Arquivo público e histórico',
            'cor' => '#964b00',
            'prefeitura_id' => $this->prefeitura->id,
        ]);
        OrgaoResponsavel::create([
            'titulo' => 'Secretaria de esporte',
            'cor' => '#ffa500',
            'prefeitura_id' => $this->prefeitura->id,
        ]);
        OrgaoResponsavel::create([
            'titulo' => 'Secretaria de turismo',
            'cor' => '#c78077',
            'prefeitura_id' => $this->prefeitura->id,
        ]);
        OrgaoResponsavel::create([
            'titulo' => 'Secretaria de obras',
            'cor' => '#808080',
            'prefeitura_id' => $this->prefeitura->id,
        ]);
        OrgaoResponsavel::create([
            'titulo' => 'Fundação municipal de Saúde',
            'cor' => '#eeeeee',
            'prefeitura_id' => $this->prefeitura->id,
        ]);
        OrgaoResponsavel::create([
            'titulo' => 'Canil',
            'cor' => '#cccccc',
            'prefeitura_id' => $this->prefeitura->id,
        ]);
        OrgaoResponsavel::create([
            'titulo' => 'Zoonoses',
            'cor' => '#ffdb58',
            'prefeitura_id' => $this->prefeitura->id,
        ]);
        OrgaoResponsavel::create([
            'titulo' => 'Secretária de cultura',
            'cor' => '#ff007f',
            'prefeitura_id' => $this->prefeitura->id,
        ]);
    }

    public function criarAssuntos()
    {
        Assunto::create([
            'titulo' => 'Tapa buraco',
            'prefeitura_id' => $this->prefeitura->id,
            'cor' => '#03bb85',
        ]);
        Assunto::create([
            'titulo' => 'Poda de árvore',
            'prefeitura_id' => $this->prefeitura->id,
            'cor' => '#008000',
        ]);
        Assunto::create([
            'titulo' => 'Limpeza de terreno',
            'prefeitura_id' => $this->prefeitura->id,
            'cor' => '#FF0000',
        ]);
        Assunto::create([
            'titulo' => 'Informação sobre licitação',
            'prefeitura_id' => $this->prefeitura->id,
            'cor' => '#ffff00',
        ]);
        Assunto::create([
            'titulo' => 'Lombada',
            'prefeitura_id' => $this->prefeitura->id,
            'cor' => '#4169e1',
        ]);
        Assunto::create([
            'titulo' => 'Semáforo',
            'prefeitura_id' => $this->prefeitura->id,
            'cor' => '#f5f5dc',
        ]);
        Assunto::create([
            'titulo' => 'Cemitério',
            'prefeitura_id' => $this->prefeitura->id,
            'cor' => '#F4BB29',
        ]);
        Assunto::create([
            'titulo' => 'Esclarecimentos',
            'prefeitura_id' => $this->prefeitura->id,
            'cor' => '#87ceeb',
        ]);
        Assunto::create([
            'titulo' => 'Solicitações',
            'prefeitura_id' => $this->prefeitura->id,
            'cor' => '#add8e6',
        ]);
        Assunto::create([
            'titulo' => 'Arrumar estrada',
            'prefeitura_id' => $this->prefeitura->id,
            'cor' => '#c8a2c8',
        ]);
        Assunto::create([
            'titulo' => 'Ponte',
            'prefeitura_id' => $this->prefeitura->id,
            'cor' => '#ffcbdb',
        ]);
        Assunto::create([
            'titulo' => 'Animal de grande porte solto',
            'prefeitura_id' => $this->prefeitura->id,
            'cor' => '#ffdf00',
        ]);
        Assunto::create([
            'titulo' => 'Animal em situação de maus tratos',
            'prefeitura_id' => $this->prefeitura->id,
            'cor' => '#000000',
        ]);
        Assunto::create([
            'titulo' => 'Casos de saúde',
            'prefeitura_id' => $this->prefeitura->id,
            'cor' => '#00008B',
        ]);
        Assunto::create([
            'titulo' => 'Iluminação pública',
            'prefeitura_id' => $this->prefeitura->id,
            'cor' => '#D1F3C5',
        ]);
        Assunto::create([
            'titulo' => 'Corte de arvore',
            'prefeitura_id' => $this->prefeitura->id,
            'cor' => '#964B00',
        ]);
        Assunto::create([
            'titulo' => 'Ônibus',
            'prefeitura_id' => $this->prefeitura->id,
            'cor' => '#ffa500',
        ]);
        Assunto::create([
            'titulo' => 'Recapeamento (nunca acontece, mas tem demanda)',
            'prefeitura_id' => $this->prefeitura->id,
            'cor' => '#b76e76',
        ]);
        Assunto::create([
            'titulo' => 'Asfalto',
            'prefeitura_id' => $this->prefeitura->id,
            'cor' => '#808080',
        ]);
        Assunto::create([
            'titulo' => 'Plantio de árvore',
            'prefeitura_id' => $this->prefeitura->id,
            'cor' => '#ffffff',
        ]);
        Assunto::create([
            'titulo' => 'Cobertura para ônibus',
            'prefeitura_id' => $this->prefeitura->id,
            'cor' => '#D3D3D3',
        ]);
        Assunto::create([
            'titulo' => 'Banco para praças',
            'prefeitura_id' => $this->prefeitura->id,
            'cor' => '#E1AD01',
        ]);
        Assunto::create([
            'titulo' => 'Melhorias (se enquadra em vários assuntos)',
            'prefeitura_id' => $this->prefeitura->id,
            'cor' => '#993399',
        ]);
        Assunto::create([
            'titulo' => 'Manutenção (se enquadra em vários assuntos)',
            'prefeitura_id' => $this->prefeitura->id,
            'cor' => '#9400d3',
        ]);
    }

}