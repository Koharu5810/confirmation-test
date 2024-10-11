# confirmation-test

お問い合わせフォーム

環境構築
Docker ビルド 1.
2.docker-compose up -d --build

    Laravel環境構築
        1.docker-compose exec php bash
        2.Composer install
        3. .env.exampleファイルから.envを作成し、環境変数を変更
        4.php artisan key:generate
        5.php artisan migrate
        6.php artisan db:seed

使用技術
・PHP
・Laravel
・MySQL

ER 図

URL
・環境開発：
・phpMyAdmin：
