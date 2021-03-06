<?php

namespace Tests\Database\Controller\API;

use App\Models\Setting;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Str;
use Tests\TestCase;

class CronControllerTest extends TestCase
{
    use DatabaseTransactions;
    use DatabaseMigrations;

    public function testValidCronTokenResponse(): void
    {
        $cronToken = Str::random(32);

        Setting::create([
            'key' => 'cron_token',
            'value' => $cronToken,
        ]);

        $response = $this->get('cron/' . $cronToken);

        $response->assertStatus(200)
            ->assertSee('Cron successfully executed');
    }

    public function testInvalidCronTokenResponse(): void
    {
        $cronToken = Str::random(32);
        $invalidCronToken = Str::random(32);

        Setting::create([
            'key' => 'cron_token',
            'value' => $cronToken,
        ]);

        $response = $this->get('cron/' . $invalidCronToken);

        $response->assertStatus(403)
            ->assertSee('The provided cron token is invalid');
    }

    public function testMissingCronTokenResponse(): void
    {
        $response = $this->get('cron');

        $response->assertStatus(404);
    }
}
