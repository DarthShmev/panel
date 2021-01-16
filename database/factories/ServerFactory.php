<?php

namespace Database\Factories;

use Carbon\Carbon;
use Pterodactyl\Models\Server;
use Illuminate\Database\Eloquent\Factories\Factory;

class ServerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Server::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'uuid' => $this->faker->unique()->uuid,
            'uuidShort' => str_random(8),
            'name' => $this->faker->firstName,
            'description' => implode(' ', $this->faker->sentences()),
            'skip_scripts' => 0,
            'suspended' => 0,
            'memory' => 512,
            'swap' => 0,
            'disk' => 512,
            'io' => 500,
            'cpu' => 0,
            'oom_disabled' => 0,
            'installed' => 1,
            'database_limit' => null,
            'allocation_limit' => null,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}