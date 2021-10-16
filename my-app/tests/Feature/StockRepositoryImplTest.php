<?php

namespace Tests\Feature;

use App\Models\ModelUser;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Zaico\Infrastructure\Stock\StockRepositoryImpl;
use Zaico\Infrastructure\User\UserRepositoryImpl;

class StockRepositoryImplTest extends TestCase
{
    use RefreshDatabase;

    private $stockRepository;

    public function setUp(): void
    {
        parent::setUp();

        $this->users = ModelUser::factory()->createMany([
            [
                'id' => 1,
                'name' => 'テスト1さん',
                'email' => 'gjaldkjjfi@gmail.com',
            ],
        ]);

        $this->stockRepository = new StockRepositoryImpl();
    }

    /**
     * A basic feature test example.
     *
     * @test
     */
    public function 永続化できる()
    {
        $this->stockRepository->save([
            'id' => 1,
            'user_id' => 1,
            'name' => 'ガム',
            'image_url' =>
                'http://thumbnail.image.rakuten.co.jp/@0_mall/jetprice/cabinet/107/800364.jpg?_ex=128x128',
            'url' => 'https://item.rakuten.co.jp/jetprice/x21203/',
        ]);

        $this->assertDatabaseHas('stocks', [
            'id' => 1,
            'user_id' => 1,
            'name' => 'ガム',
            'image_url' =>
                'http://thumbnail.image.rakuten.co.jp/@0_mall/jetprice/cabinet/107/800364.jpg?_ex=128x128',
            'url' => 'https://item.rakuten.co.jp/jetprice/x21203/',
        ]);
    }
}
