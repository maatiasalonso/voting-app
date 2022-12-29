<?php
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Idea;
use App\Models\Category;

uses(RefreshDatabase::class);

it('can show list of ideas on main page', function ()
{
    $categoryOne = Category::factory()->create(['name' => 'Category 1']);

    $categoryTwo = Category::factory()->create(['name' => 'Category 2']);

    $ideaOne = Idea::factory()->create([
        'title' => 'My First Idea',
        'category_id' => $categoryOne->id,
        'description' => 'Description of my first idea'
    ]);

    $ideaTwo = Idea::factory()->create([
        'title' => 'My Second Idea',
        'category_id' => $categoryTwo->id,
        'description' => 'Description of my second idea'
    ]);

    $response = $this->get(route('idea.index'));

    $response->assertSuccessful();
    $response->assertSee($ideaOne->title);
    $response->assertSee($ideaOne->description);
    $response->assertSee($categoryOne->name);
    $response->assertSee($ideaTwo->title);
    $response->assertSee($ideaTwo->description);
    $response->assertSee($categoryTwo->name);
});

it('can show a single idea correctly', function ()
{
    $idea = Idea::factory()->create([
        'category_id' => Category::factory()->create(['name' => 'Category 1']),
        'title' => 'My First Idea',
        'description' => 'Description of my first idea'
    ]);

    $response = $this->get(route('idea.show', $idea));

    $response->assertSuccessful();
    $response->assertSee($idea->title);
    $response->assertSee($idea->description);
    $response->assertSee($idea->category->name);
});

test('ideas pagination works', function()
{
    Idea::factory(Idea::PAGINATION_COUNT + 1)->create([
        'category_id' => Category::factory()->create(['name' => 'Category 1']),
    ]);

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
        'category_id' => Category::factory()->create(['name' => 'Category 1']),
        'title' => 'My First Idea',
        'description' => 'Description of my first idea'
    ]);

    $ideaTwo = Idea::factory()->create([
        'category_id' => Category::factory()->create(['name' => 'Category 2']),
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

