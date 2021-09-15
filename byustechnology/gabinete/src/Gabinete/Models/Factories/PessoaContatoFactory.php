<?php

namespace ByusTechnology\Gabinete\Models\Factories;

use ByusTechnology\Gabinete\Models\Pessoa;
use ByusTechnology\Gabinete\Models\PessoaContato;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class PessoaContatoFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PessoaContato::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $contato = array_rand(PessoaContato::TIPOS);
        $descricao = PessoaContato::TIPOS[$contato];
        $valor = $this->faker->email();

        if (in_array($contato, ['whats', 'cel'])) {
            $valor = $this->faker->numerify('###########');
        }

        if (in_array($contato, ['fixo'])) {
            $valor = $this->faker->numerify('##########');
        }

        return [
            'pessoa_id' => Pessoa::factory(),
            'tipo' => $contato,
            'titulo' => $descricao . ' ' . $this->faker->randomElement(['de trabalho', 'pessoal', 'dos filhos']),
            'valor' => $valor,
            'observacao' => $this->faker->realText()
        ];
    }
}
