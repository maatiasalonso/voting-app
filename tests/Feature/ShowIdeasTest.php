<?php
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Idea;

uses(RefreshDatabase::class);

it('can show list of ideas on main page', function ()
{
    $ideaOne = Idea::factory()->create([
        'title' => 'My First Idea',
        'description' => 'Description of my first idea'
    ]);

    $ideaTwo = Idea::factory()->create([
        'title' => 'My Second Idea',
        'description' => 'Description of my second idea'
    ]);

    $response = $this->get(route('idea.index'));

    $response->assertSuccessful();
    $response->assertSee($ideaOne->title);
    $response->assertSee($ideaOne->description);
    $response->assertSee($ideaTwo->title);
    $response->assertSee($ideaTwo->description);
});

it('can show a single idea correctly', function ()
{
    $idea = Idea::factory()->create([
        'title' => 'My First Idea',
        'description' => 'Description of my first idea'
    ]);

    $response = $this->get(route('idea.show', $idea));

    $response->assertSuccessful();
    $response->assertSee($idea->title);
    $response->assertSee($idea->description);
});

test('ideas pagination works', function()
{
    Idea::factory(Idea::PAGINATION_COUNT + 1)->create();

    $ideaOne = Idea::first();
    $ideaOne->title = 'My First Idea';
    $ideaOne->save();

    $ideaEleven = Idea::find(11);
    $ideaEleven->title = 'My Eleventh Idea';
    $ideaEleven->save();

    $response = $this->get(route('idea.index'));

    $response->assertSee($ideaOne->title);
    $response->assertDontSee($ideaEleven->title);

    $response = $this->get('/?page=2');

    $response->assertSee($ideaEleven->title);
    $response->assertDontSee($ideaOne->title);
});

test('idea has unique slug', function()
{
    $ideaOne = Idea::factory()->create([
        'title' => 'My First Idea',
        'description' => 'Description of my first idea'
    ]);

    $ideaTwo = Idea::factory()->create([
        'title' => 'My First Idea',
        'description' => 'Description of my first idea'
    ]);

    $response = $this->get(route('idea.show', $ideaOne));

    $response->assertSuccessful();
    $this->assertTrue(request()->path() === 'idea/my-first-idea');

    $response = $this->get(route('idea.show', $ideaTwo));

    $response->assertSuccessful();
    $this->assertTrue(request()->path() === 'idea/my-first-idea-2');
});

