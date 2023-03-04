<?php

namespace Tests\Unit\Domains\Auth\Web\ViewHelpers;

use App\Domains\Settings\ManageCompany\Web\ViewHelpers\CreateCompanyIndexViewHelper;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class CreateCompanyIndexViewHelperTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function it_gets_the_data_needed_by_the_view(): void
    {
        $array = CreateCompanyIndexViewHelper::data();
        $this->assertEquals(
            [
                'url' => [
                    'back' => env('APP_URL').'/welcome',
                    'store' => env('APP_URL').'/create',
                ],
            ],
            $array
        );
    }
}
