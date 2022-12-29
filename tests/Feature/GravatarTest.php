<?php
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use Illuminate\Support\Facades\Http;

uses(RefreshDatabase::class);

test('user generate default gravatar when first character of email was an a and was not found', function ()
{
    $user = User::factory()->create([
        'name' => 'Anna',
        'email' => 'anna@fakemail.com'
    ]);

    $response = Http::get($user->getAvatar());

    $this->assertTrue($response->successful());

    $gravatarUrl = $user->getAvatar();

    $this->assertEquals(
        'https://www.gravatar.com/avatar/'.md5($user->email).'?s=200&d=https://s3.amazonaws.com/laracasts/images/forum/avatars/default-avatar-1.png',
        $gravatarUrl
    );
});

test('user generate default gravatar when first character of email was an z and was not found', function ()
{
    $user = User::factory()->create([
        'name' => 'Zoey',
        'email' => 'zoey@fakemail.com'
    ]);

    $gravatarUrl = $user->getAvatar();

    $response = Http::get($user->getAvatar());

    $this->assertTrue($response->successful());

    $this->assertEquals(
        'https://www.gravatar.com/avatar/'.md5($user->email).'?s=200&d=https://s3.amazonaws.com/laracasts/images/forum/avatars/default-avatar-26.png',
        $gravatarUrl
    );
});
