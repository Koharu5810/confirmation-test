# confirmation-test

## プロジェクト名

お問い合わせフォーム

## 環境構築

Docker ビルド
1.git@github.com:Koharu5810/confirmation-test.git
2.docker-compose up -d --build

Laravel 環境構築
1.docker-compose exec php bash
2.Composer install 3. .env.example ファイルから.env を作成し、環境変数を変更
4.php artisan key:generate
5.php artisan migrate
6.php artisan db:seed

## 使用技術

| 言語・フレームワーク | バージョン |
| -------------------- | ---------- |
| PHP                  | 8.3.12     |
| Laravel              | 8.83.27    |
| MySQL                | 9.0.1      |

## ER 図

(https://github.com/user-attachments/assets/49c8f1e0-e6b6-44cf-93bb-0942b5eb57a6)

## URL

・環境開発：http://localhost
・phpMyAdmin：http://localhost:8080
