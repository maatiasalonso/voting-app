<?php

use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Models\Category;
use App\Models\Idea;
use App\Models\Status;
use App\Models\User;
use App\Models\Vote;

use App\Http\Livewire\IdeaShow;

uses(RefreshDatabase::class);

test('can check if an idea is voted for by user', function ()
{
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

    $this->assertTrue($idea->isVotedByUser($userOne));
    $this->assertFalse($idea->isVotedByUser($userTwo));
    $this->assertFalse($idea->isVotedByUser(null));
});
