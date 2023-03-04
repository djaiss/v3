<?php

namespace Tests\Unit\Domains\Auth\Web\ViewHelpers;

use App\Domains\Auth\Web\ViewHelpers\EmailVerificationViewHelper;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class EmailVerificationViewHelperTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function it_gets_the_data_needed_by_the_view(): void
    {
        $array = EmailVerificationViewHelper::data();
        $this->assertEquals(
            [
                'url' => [
                    'store' => env('APP_URL').'/email/verification-notification',
                ],
            ],
            $array
        );
    }
}
