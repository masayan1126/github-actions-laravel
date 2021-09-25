### 概要 

既存のlaravelプロジェクト(新規作成ではない)をcloneしてテスト、デプロイする

### 手順

パッケージのインストール

```
composer install
```

↓dockerコンテナ内で実行

```
cp .env.example my-app/.env 
```

```
php artisan key:generate
```
```
php artisan migrate
```

