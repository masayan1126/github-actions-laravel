<?php

namespace Tests\Feature;

use App\Models\ModelStock;
use App\Models\ModelUser;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Zaico\Application\Stock\StockFetchService;
use Zaico\Application\Stock\StockFindService;
use Zaico\Application\Stock\StockUpdateService;
use Zaico\Domain\Stock\Stock;
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
        $stock = new Stock();

        $stock
            ->setId(1)
            ->setUserId(1)
            ->setName('ガム')
            ->setImageUrl(
                'http://thumbnail.image.rakuten.co.jp/@0_mall/jetprice/cabinet/107/800364.jpg?_ex=128x128'
            )
            ->setUrl('https://item.rakuten.co.jp/jetprice/x21203/')
            ->setNumber(7)
            ->setExpiryDate('2021-09-10');

        $this->stockRepository->save($stock);

        $this->assertDatabaseHas('stocks', [
            'id' => 1,
            'user_id' => 1,
            'name' => 'ガム',
            'image_url' =>
                'http://thumbnail.image.rakuten.co.jp/@0_mall/jetprice/cabinet/107/800364.jpg?_ex=128x128',
            'url' => 'https://item.rakuten.co.jp/jetprice/x21203/',
            'number' => 7,
            'expiry_date' => '2021-09-10',
        ]);
    }

    /**
     * A basic feature test example.
     *
     * @test
     */
    public function 更新できる()
    {
        $modelStock = ModelStock::factory()->create();
        $stockUpdateService = new StockUpdateService($this->stockRepository);

        $data = [
            'id' => 1,
            'user_id' => 1,
            'name' => 'ガム',
            'image_url' =>
                'http://thumbnail.image.rakuten.co.jp/@0_mall/jetprice/cabinet/107/800364.jpg?_ex=128x128',
            'url' => 'https://item.rakuten.co.jp/jetprice/x21203/',
            'number' => 7,
            'expiry_date' => '2021-09-10',
            'created_at' => now(),
            'updated_at' => now(),
        ];

        $stockUpdateService->exec($data);

        $this->assertDatabaseHas('stocks', $data);
    }

    /**
     * A basic feature test example.
     *
     * @test
     */
    public function 主キー検索できる()
    {
        $modelStock = ModelStock::factory()->create([
            'id' => 1,
            'user_id' => 1,
            'name' => 'ガム',
            'image_url' =>
                'http://thumbnail.image.rakuten.co.jp/@0_mall/jetprice/cabinet/107/800364.jpg?_ex=128x128',
            'url' => 'https://item.rakuten.co.jp/jetprice/x21203/',
            'number' => 7,
            'expiry_date' => '2021-09-10',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $stockFindService = new StockFindService($this->stockRepository);

        $actual = $stockFindService->exec(1);

        $this->assertEquals($modelStock->toDomain(), $actual);
    }

    /**
     * A basic feature test example.
     *
     * @test
     */
    public function ユーザーIDで検索できる()
    {
        $userRepository = new UserRepositoryImpl();

        $actual = $userRepository->findById(1);

        $this->assertEquals($this->users[0]->toDomain(), $actual);
    }
}
