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
        return [
            'prefeitura_id' => Prefeitura::factory(), 
            'codigo' => $this->faker->unique()->numerify('###########'), 
            'titulo' => $this->faker->name(), 
        ];
    }
}