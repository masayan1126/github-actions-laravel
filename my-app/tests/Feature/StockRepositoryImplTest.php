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

        $this->stocks = ModelStock::factory()->create([
            'id' => 1,
            'user_id' => 1,
            'name' => 'ガム',
            'image_url' =>
                'http://thumbnail.image.rakuten.co.jp/@0_mall/jetprice/cabinet/107/800364.jpg?_ex=128x128',
            'url' => 'https://item.rakuten.co.jp/jetprice/x21203/',
            'number' => 7,
            'expiry_date' => '2021-09-10',
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
<<<<<<< HEAD

        $stock
            ->setId(1)
=======
        $stock
            ->setId(2)
>>>>>>> dd189bbf0ecd45db5c1fd39c44f78f285d2ee691
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
            'id' => 2,
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
    // public function 更新できる()
    // {
    //     // 更新対象のstock
    //     $stockFindService = new StockFindService($this->stockRepository);
    //     $targetStock = $stockFindService->exec($stockId = 1);

    //     $targetStock
    //         // ->setId(1)
    //         // ->setUserId(1)
    //         ->setName(2)
    //         ->setImageUrl(
    //             'http://thumbnail.image.rakuten.co.jp/@0_mall/jetprice/cabinet/107/800364.jpg?_ex=128x128'
    //         )
    //         ->setUrl('https://item.rakuten.co.jp/jetprice/x21203/')
    //         ->setNumber(7)
    //         ->setExpiryDate('2021-09-11');

    //     $stockUpdateService = new StockUpdateService($this->stockRepository);
    //     $stockUpdateService->exec($targetStock);

    //     $this->assertDatabaseHas('stocks', [
    //         'id' => 1,
    //         'user_id' => 1,
    //         'name' => 2,
    //         'image_url' =>
    //             'http://thumbnail.image.rakuten.co.jp/@0_mall/jetprice/cabinet/107/800364.jpg?_ex=128x128',
    //         'url' => 'https://item.rakuten.co.jp/jetprice/x21203/',
    //         'number' => 7,
    //         'expiry_date' => '2021-09-11',
    //     ]);
    // }

    /**
     * A basic feature test example.
     *
     * @test
     */
    public function 主キー検索できる()
    {
        $stockFindService = new StockFindService($this->stockRepository);
        $actual = $stockFindService->exec($stockId = 1);

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

        $this->assertEquals($stock, $actual);
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
