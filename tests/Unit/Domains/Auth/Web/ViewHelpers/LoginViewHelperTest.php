<?php

namespace Tests\Unit\Domains\Auth\Web\ViewHelpers;

use App\Domains\Auth\Web\ViewHelpers\LoginViewHelper;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class LoginViewHelperTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function it_gets_the_data_needed_by_the_view(): void
    {
        $array = LoginViewHelper::data();
        $this->assertEquals(
            [
                'url' => [
                    'register' => env('APP_URL').'/register',
                    'store' => env('APP_URL').'/login',
                ],
            ],
            $array
        );
    }
}
