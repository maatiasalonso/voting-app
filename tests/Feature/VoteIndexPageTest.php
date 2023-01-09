<?php

use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Models\Category;
use App\Models\Idea;
use App\Models\Status;
use App\Models\User;
use App\Models\Vote;

use App\Http\Livewire\IdeaIndex;

uses(RefreshDatabase::class);

test('index page contains idea show livewire component', function () {

    $user = User::factory()->create();

    Idea::factory()->create([
        'user_id' => $user->id,
        'category_id' => Category::factory()->create(['name' => 'Category 1']),
        'status_id' => Status::factory()->create(['name' => 'Open']),
        'title' => 'My First Idea',
        'description' => 'Description of my first idea'
    ]);

    $this->get(route('idea.index'))
        ->assertSeeLivewire('idea-index');

});

test('index page correctly receives votes count', function () {

    $userOne = User::factory()->create();
    $userTwo = User::factory()->create();

    $idea = Idea::factory()->create([
        'user_id' => $userOne->id,
        'category_id' => Category::factory()->create(['name' => 'Category 1']),
        'status_id' => Status::factory()->create(['name' => 'Open']),
        'title' => 'My First Idea',
        'description' => 'Description of my first idea'
    ]);

    Vote::factory()->create([
        'idea_id' => $idea->id,
        'user_id' => $userOne->id,
    ]);

    Vote::factory()->create([
        'idea_id' => $idea->id,
        'user_id' => $userTwo->id,
    ]);

    $this->get(route('idea.index'))
        ->assertViewHas('ideas', function($ideas)
        {
            return $ideas->first()->votes_count == 2;
        });
});

test('votes count shows correctly on index page livewire component', function () {

    $userOne = User::factory()->create();

    $idea = Idea::factory()->create([
        'user_id' => $userOne->id,
        'category_id' => Category::factory()->create(['name' => 'Category 1']),
        'status_id' => Status::factory()->create(['name' => 'Open']),
        'title' => 'My First Idea',
        'description' => 'Description of my first idea'
    ]);

    Livewire::test(IdeaIndex::class, [
        'idea' => $idea,
        'votesCount' => 12,
    ])
    ->assertSet('votesCount', 12);
});
