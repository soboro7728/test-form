## お問い合わせフォーム  
  



### 環境構築  
Dockerビルド

1.　git@github.com:soboro7728/test-form.git

2.　docker-compose up -d --build

※MySQLは、OSによって起動しない場合があるのでそれぞれのPCに合わせてdocker-compose.ymlファイルを編集してください。

Laravel環境構築

1. docker-compose exec php bash
2. composer install
3..env.exampleファイルから.envを作成し、環境変数を変更
4.php artisan key:generate
53.php artisan migrate
6.php artisan db;seed  
  



### 使用技術  
・php 8.0
・Laravel 10.0
・My SQL 8.0  
  



### URL  
・開発環境：http://localhost/
・phpMyAdmin:http://localhost:8080  
  

<br/>  
