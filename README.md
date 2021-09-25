### 概要 

既存のlaravelプロジェクト(新規作成ではない)をcloneしてテスト、デプロイする

### 手順

```
cd my-app
```

パッケージのインストール

```
composer install
```

↓dockerコンテナ内で実行

```
cp ../.env.example .env 
```

```
php artisan key:generate
```
```
php artisan migrate
```

