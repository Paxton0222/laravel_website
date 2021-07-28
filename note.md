#  php artisan Commend

## 開始專案
    composer install && npm install
    php aritsan migrate
    php artisan serve
## 常見問題
    1.沒有key的問題 (php artisan key:generate)
## 開發模式
    php artisan down (暫時關閉網站)
    php artisan up (重新開啟網站)
## migrate
    php artisan migrate (執行 DB migrate)
    php aritsan migrate:install (Create the migration repository再研究)
    php artisan migrate:fresh (先Drop所有table再執行 DB migrate)
    php artisan migrate:refresh(跟fresh的差別是他會先reset再創建)
    php artisan migrate:rollback (還原 DB migrate)
    php artisan migrate:status (查看migrate情況)
    php artisan migrate:reset (把所有tabel刪除掉)
## seeder
    (seeder 是專案用來填充空DB用的假資料)
    php artisan make:seeder $name (創建一個seeder)
    php artisan db:seed (單純填充資料到DB)
## route
    php aritsan route:list (列出所有路由)
    php artisan route:clear (把所有route的快取檔案清除)
    php artisan route:cache (創建路由快取)