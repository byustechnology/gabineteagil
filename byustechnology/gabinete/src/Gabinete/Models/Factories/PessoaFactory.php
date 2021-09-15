<?php

namespace ByusTechnology\Gabinete\Models\Factories;

use ByusTechnology\Gabinete\Models\Prefeitura;
use ByusTechnology\Gabinete\Models\Pessoa;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class PessoaFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Pessoa::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $tipoPessoa = $this->faker->randomElement(array_keys(Pessoa::TIPO));

        $faker = [
            'prefeitura_id' => Prefeitura::factory(), 
            'codigo' => $this->faker->unique()->numerify('###########'), 
            'titulo' => $this->faker->name(), 
            'tipo' => $tipoPessoa, 
            'documento' => $tipoPessoa == 'j' ? $this->faker->unique()->numerify('##############') : $this->faker->unique()->numerify('###########'), 
            'cep' => $this->faker->numerify('########'), 
            'logradouro' => $this->faker->streetName(), 
            'numero' => $this->faker->numerify('####'), 
            'complemento' => $this->faker->optional()->sentence(2), 
            'bairro' => $this->faker->state(), 
            'cidade' => $this->faker->city(), 
            'estado' => $this->faker->stateAbbr(), 
        ];

        if ($tipoPessoa == 'p') {
            $faker = array_merge($faker, [
                'genero' => $this->faker->randomElement(['m', 'f']), 
                'nascido_em' => $this->faker->dateTime('-18 years'), 
                'estado_civil' => $this->faker->randomElement(array_keys(Pessoa::ESTADO_CIVIL)), 
                'escolaridade' => $this->faker->randomElement(array_keys(Pessoa::ESCOLARIDADE)), 
                'profissao' => $this->faker->randomElement(['Web Designer', 'Desenvolvedor']), 
                'conjugue_nome' => $this->faker->optional()->name, 
                'conjugue_nascido_em' => $this->faker->dateTime('-18 years'), 
                'filhos' => $this->faker->randomDigit(), 
                'renda' => $this->faker->randomDigit() * 1000, 
                'residencia_tipo' => $this->faker->randomElement(array_keys(Pessoa::TIPO_RESIDENCIA)), 
                'moradia_tipo' => $this->faker->randomElement(array_keys(Pessoa::TIPO_MORADIA)), 
                'influencia' => $this->faker->randomElement(array_keys(Pessoa::INFLUENCIA)), 
            ]);
        }

        if ($tipoPessoa == 'j') {
            $faker = array_merge($faker, [
                'ramo_atuacao' => $this->faker->randomElement(['']), 
                'fundada_em' => $this->faker->dateTime('-18 years'), 
                'colaboradores_quantidade' => $this->faker->randomDigit() * mt_rand(1, 10)
            ]);
        }

        return $faker;
    }
}