<?php

namespace Tests\Unit\Domains\Auth\Web\ViewHelpers;

use App\Domains\Auth\Web\ViewHelpers\RegisterViewHelper;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class RegisterViewHelperTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function it_gets_the_data_needed_by_the_view(): void
    {
        $array = RegisterViewHelper::data();
        $this->assertEquals(
            [
                'url' => [
                    'login' => env('APP_URL').'/login',
                    'store' => env('APP_URL').'/register',
                ],
            ],
            $array
        );
    }
}
