<?php

namespace Tests\Feature;

use App\Models\ModelUser;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Zaico\Infrastructure\User\UserRepositoryImpl;

class UserRepositoryImplTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        $this->users = ModelUser::factory()->createMany([
            [
                'id' => 1,
                'name' => 'テスト1さん',
                'email' => 'gjaldkjjfi@gmail.com',
            ],
            [
                'id' => 2,
                'name' => 'テスト2さん',
                'email' => 'fejakfawfi@gmail.com',
            ],
        ]);
    }

    /**
     * A basic feature test example.
     *
     * @test
     */
    public function 主キー検索できる()
    {
        $userRepository = new UserRepositoryImpl();

        $actual = $userRepository->findById(1);

        $this->assertEquals($this->users[0]->toDomain(), $actual);
    }
}
