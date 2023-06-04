<?php

namespace Tests\Unit\Controllers;

use App\Models\Task;
use Tests\TestCase;

class TasksControllerTest extends TestCase
{

    /**
     * Helper method to simulate an authenticated task.
     */
    protected function actingAstask()
    {
        $user = \App\Models\User::factory()->create(); // Crée un utilisateur de test
        $this->actingAs($user); // Simule l'authentification de l'utilisateur
    }
    // public function testIndex()
    // {
      
    //     $this->actingAstask();
    //     Task::factory()->count(1)->create(); // Crée 5 tâches de test

    //     $response = $this->get(route('tasks.index'));

    //     $response->assertStatus(200);
    //     $tasks = Task::all();
    //     foreach ($tasks as $task) {
    //         $response->assertSee($task->title);
    //         $response->assertSee($task->description);
    //         $response->assertSee($task->status);
    //     }
    // }

    public function testEdit()
    {
        $this->actingAstask();
        $task = Task::factory()->create();

        $response = $this->actingAstask()->get("/tasks/{$task->id}/edit");

        $response->assertStatus(200)
            ->assertJson($task->toArray());
    }

    public function testDestroy()
    {
        $this->actingAstask();
        $task = Task::factory()->create();

        $response = $this->actingAstask()->delete("/tasks/{$task->id}");

        $response->assertStatus(200)
            ->assertJson(['success' => 'Customer deleted!']);

        $this->assertDatabaseMissing('tasks', ['id' => $task->id]);
    }
}
