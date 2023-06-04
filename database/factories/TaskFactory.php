<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => 'Titre de la tâche',
            'description' => 'Description de la tâche',
            'status' => 'En cours',
            'user_id' => 2, // Remplacez 1 par l'ID de l'utilisateur réel

        ];
    }
}
