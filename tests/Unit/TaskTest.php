<?php

namespace Tests\Unit;

use Tests\TestCase;

class TaskTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    protected $task;

    public function test_post_task()
    {
        $data = [
           'body' => 'Task body', 
        ];

        $response = $this->postJson('/api/task', $data);

        $this->task = $response;

        $response->assertStatus(201);
    }

    public function test_get_all_tasks()
    {
        $response = $this->get('/api/task');

        $response->assertStatus(200);
    }

    public function test_get_task()
    {
        $response = $this->get('/api/task/' . $this->task->id);
        $this->task = $response;

        $response->assertStatus(200);
    }

    public function test_update_tasks()
    {
        $response = $this->put('/api/task/' . $this->task->id);

        $this->task->body = 'New body';

        $this->task = $response;

        $response->assertStatus(200);
    }


    public function test_delete_tasks()
    {
        $response = $this->delete('/api/task/' . $this->task->id);

        $response->assertStatus(200);
    }
}
