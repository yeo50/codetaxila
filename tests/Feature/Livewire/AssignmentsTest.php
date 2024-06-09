<?php

namespace Tests\Feature\Livewire;

use App\Livewire\Assignments;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class AssignmentsTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(Assignments::class)
            ->set('photo', '5Vu0JNcP1posMXlbEN2JFB52HgY2iRWR8KhY8EqG.jpg')
            ->assertStatus(200);
    }

    /** @test */
    public function dispatch_successfully()
    {
        Livewire::test(Assignments::class)
            ->assertDispatched('show-ongoing');
    }
}
