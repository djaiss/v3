<?php

namespace Tests\Unit\Domains\Auth\Web\ViewHelpers;

use App\Domains\Settings\ManageCompany\Web\ViewHelpers\WelcomeIndexViewHelper;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class WelcomeIndexViewHelperTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function it_gets_the_data_needed_by_the_view(): void
    {
        $array = WelcomeIndexViewHelper::data();
        $this->assertEquals(
            [
                'url' => [
                    'create' => env('APP_URL').'/create',
                    'logout' => env('APP_URL').'/logout',
                ],
            ],
            $array
        );
    }
}
