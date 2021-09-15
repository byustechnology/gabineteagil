<?php

namespace ByusTechnology\Gabinete\Models\Factories;

use App\Models\User;
use ByusTechnology\Gabinete\Models\Agenda;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class AgendaFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Agenda::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $inicio = $this->faker->dateTimeBetween('-1 week', '+4 weeks');

        return [
            'titulo' => $this->faker->sentence(2), 
            'prefeitura_id' => 1, // TODO: Ajustar para a prefeitura corrente
            'descricao' => $this->faker->optional()->realText(), 
            'inicio_em' => $inicio, 
            'termino_em' => Carbon::createFromFormat('Y-m-d H:i', $inicio->format('Y-m-d H:i'))->addMinutes($this->faker->randomDigit() * 10), 
            'user_id' => User::factory()
        ];
    }
}
