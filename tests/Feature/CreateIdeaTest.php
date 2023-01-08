<?php
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use App\Models\Status;
use App\Models\Category;
use App\Http\Livewire\CreateIdea;
use Livewire\Livewire;

uses(RefreshDatabase::class);

test('create idea form does not show when logged out', function ()
{
    $response = $this->get(route('idea.index'));

    $response->assertStatus(200);
    $response->assertSee('Please login to create an idea.');
    $response->assertDontSee('Let us know everything!');
});

test('create idea form does not show when logged in', function ()
{
    $response = $this->actingAs(User::factory()->create())
                     ->get(route('idea.index'));

    $response->assertStatus(200);
    $response->assertDontSee('Please login to create an idea.');
    $response->assertSee('Let us know everything!');
});

test('main page contains create idea livewire component', function ()
{
    $this->actingAs(User::factory()->create())
         ->get(route('idea.index'))
         ->assertSeeLivewire('create-idea');
});

test('create idea form validation works', function ()
{
    Livewire::actingAs(User::factory()->create())
            ->test(CreateIdea::class)
            ->set('title', '')
            ->set('category', '')
            ->set('description', '')
            ->call('createIdea')
            ->assertHasErrors(['title', 'category', 'description'])
            ->assertSee('The title field is required');
});

test('creating an idea works correctly', function ()
{
    $user = User::factory()->create();

    $categoryOne = Category::factory()->create(['name' => 'Category 1']);

    $statusOpen = Status::factory()->create(['name' => 'Open']);

    Livewire::actingAs($user)
            ->test(CreateIdea::class)
            ->set('title', 'My First Idea')
            ->set('category', $categoryOne->id)
            ->set('description', 'This is a testing idea')
            ->call('createIdea')
            ->assertRedirect('/');

    $response = $this->actingAs($user)->get(route('idea.index'));
    $response->assertStatus(200);
    $response->assertSee('My First Idea');
    $response->assertSee('This is a testing idea');

    $this->assertDatabaseHas('ideas', [
        'title' => 'My First Idea',
    ]);

});

test('creating two ideas works but create different slug', function ()
{
    $user = User::factory()->create();

    $categoryOne = Category::factory()->create(['name' => 'Category 1']);

    $statusOpen = Status::factory()->create(['name' => 'Open']);

    Livewire::actingAs($user)
            ->test(CreateIdea::class)
            ->set('title', 'My First Idea')
            ->set('category', $categoryOne->id)
            ->set('description', 'This is a testing idea')
            ->call('createIdea')
            ->assertRedirect('/');

    $this->assertDatabaseHas('ideas', [
        'title' => 'My First Idea',
        'slug' => 'my-first-idea'
    ]);

    Livewire::actingAs($user)
            ->test(CreateIdea::class)
            ->set('title', 'My First Idea')
            ->set('category', $categoryOne->id)
            ->set('description', 'This is a testing idea')
            ->call('createIdea')
            ->assertRedirect('/');

    $this->assertDatabaseHas('ideas', [
        'title' => 'My First Idea',
        'slug' => 'my-first-idea-2'
    ]);

});
