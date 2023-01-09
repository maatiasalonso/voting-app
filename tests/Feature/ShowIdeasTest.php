<?php
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Category;
use App\Models\Idea;
use App\Models\Status;
use App\Models\User;

uses(RefreshDatabase::class);

it('can show list of ideas on main page', function ()
{
    $user = User::factory()->create();

    $statusOpen = Status::factory()->create(['name' => 'Open']);

    $statusConsidering = Status::factory()->create(['name' => 'Considering']);

    $categoryOne = Category::factory()->create(['name' => 'Category 1']);

    $categoryTwo = Category::factory()->create(['name' => 'Category 2']);

    $ideaOne = Idea::factory()->create([
        'user_id' => $user->id,
        'title' => 'My First Idea',
        'category_id' => $categoryOne->id,
        'status_id' => $statusOpen->id,
        'description' => 'Description of my first idea'
    ]);

    $ideaTwo = Idea::factory()->create([
        'user_id' => $user->id,
        'title' => 'My Second Idea',
        'category_id' => $categoryTwo->id,
        'status_id' => $statusConsidering->id,
        'description' => 'Description of my second idea'
    ]);

    $response = $this->get(route('idea.index'));

    $response->assertSuccessful();

    $response->assertSee($ideaOne->title);
    $response->assertSee($ideaOne->description);
    $response->assertSee($categoryOne->name);
    $response->assertSee('status-'.Str::kebab($statusOpen->name));

    $response->assertSee($ideaTwo->title);
    $response->assertSee($ideaTwo->description);
    $response->assertSee($categoryTwo->name);
    $response->assertSee('status-'.Str::kebab($statusConsidering->name));

});

it('can show a single idea correctly', function ()
{
    $user = User::factory()->create();

    $idea = Idea::factory()->create([
        'user_id' => $user->id,
        'category_id' => Category::factory()->create(['name' => 'Category 1']),
        'status_id' => Status::factory()->create(['name' => 'Open']),
        'title' => 'My First Idea',
        'description' => 'Description of my first idea'
    ]);

    $response = $this->get(route('idea.show', $idea));

    $response->assertSuccessful();
    $response->assertSee($idea->title);
    $response->assertSee($idea->description);
    $response->assertSee($idea->category->name);
    $response->assertSee('status-'.Str::kebab($idea->status->name));

});

test('ideas pagination works', function()
{
    $user = User::factory()->create();

    Idea::factory(Idea::PAGINATION_COUNT + 1)->create([
        'user_id' => $user->id,
        'category_id' => Category::factory()->create(['name' => 'Category 1']),
        'status_id' => Status::factory()->create(['name' => 'Open']),
    ]);

    $ideaOne = Idea::first();
    $ideaOne->title = 'My First Idea';
    $ideaOne->save();

    $ideaEleven = Idea::find(11);
    $ideaEleven->title = 'My Eleventh Idea';
    $ideaEleven->save();

    $response = $this->get(route('idea.index'));

    $response->assertSee($ideaEleven->title);
    $response->assertDontSee($ideaOne->title);

    $response = $this->get('/?page=2');

    $response->assertSee($ideaOne->title);
    $response->assertDontSee($ideaEleven->title);
});

test('idea has unique slug', function()
{
    $user = User::factory()->create();

    $ideaOne = Idea::factory()->create([
        'user_id' => $user->id,
        'category_id' => Category::factory()->create(['name' => 'Category 1']),
        'status_id' => Status::factory()->create(['name' => 'Open']),
        'title' => 'My First Idea',
        'description' => 'Description of my first idea'
    ]);

    $ideaTwo = Idea::factory()->create([
        'user_id' => $user->id,
        'category_id' => Category::factory()->create(['name' => 'Category 2']),
        'status_id' => Status::factory()->create(['name' => 'Closed']),
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

