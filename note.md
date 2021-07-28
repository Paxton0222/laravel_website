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
## factory
    php artisan make:factory (產生factory檔案)
## migrate
    php artisan migrate (執行 DB migrate up())
    php artisan migrate --seed (migrate 順便 填充seeder 資料)
    php artisan migrate:refresh --seed (順便填充seeder 資料)
    php aritsan migrate:install (Create the migration repository再研究)
    php artisan migrate:fresh (先Drop所有table再執行 DB migrate)
    php artisan migrate:refresh(跟fresh的差別是他會先reset再創建)
    php artisan migrate:rollback (還原 DB migrate down())
    php artisan migrate:status (查看migrate情況)
    php artisan migrate:reset (把所有tabel刪除掉)
## model
    (創建model層)
    php artisan make:model $MODEL_NAME (創建model)
## seeder
    (seeder 是專案用來填充空DB用的假資料)
    php artisan make:seeder $name (創建一個seeder)
    php artisan db:seed (單純填充資料到DB)
## route
    php aritsan route:list (列出所有路由)
    php artisan route:clear (把所有route的快取檔案清除)
    php artisan route:cache (創建路由快取)

# php infyom Commend

## Official Api Documentation URL
    https://www.infyom.com/open-source/laravelgenerator/docs/8.0/installation

## 安裝步驟
1 到 composer.json加入依賴項

    "require": {
     "infyomlabs/laravel-generator": "^3.0",
     "laravelcollective/html": "^6.2",
     "infyomlabs/adminlte-templates": "^3.0"
    }
    
2 如果想要CoreUI再加入

    "require": {
      "doctrine/dbal": "~2.3"
    }

3 執行update指令

    composer update

4 到 config/app.php 'aliases'加入

    'Form'      => Collective\Html\FormFacade::class,
    'Html'      => Collective\Html\HtmlFacade::class,
    'Flash'     => Laracasts\Flash\Flash::class,

5 執行指令

    php artisan vendor:publish --provider="InfyOm\Generator\InfyOmGeneratorServiceProvider"

6 更新api路由 到 app\Providers\RouteServiceProvider.php boot() 更新此方法(只要更新Route::perfix('api'))

    Route::prefix('api')
        ->middleware('api')
        ->as('api.')
        ->namespace($this->app->getNamespace().'Http\Controllers\API')
        ->group(base_path('routes/api.php'));

7 更新完成boot()之後，執行

    php artisan infyom:publish

8 安裝 laravel 用戶介面

    composer require laravel/ui:^3.0
    php artisan ui bootstrap --auth
    npm install && npm run dev

9 發布infyom layout(執行完應該會在首頁看到login register)

    php artisan infyom.publish:layout

10 配置菜單 到 config/infyom/laravel_generator.php 設置

    'add_on' => [ 'menu' => [ 'enabled' => true ] ]

## 安裝 swagger api
    
1 先在composer.json加入依賴項

    "repositories": [
    {
        "type": "vcs",
        "url":  "git@github.com:InfyOmLabs/swaggervel.git"
    }
    ],

    "require": {
        "appointer/swaggervel": "dev-master",
        "infyomlabs/swagger-generator": "dev-master",
    },
2 執行指令

    composer update
    php artisan vendor:publish --provider="Appointer\Swaggervel\SwaggervelServiceProvider"

3 到 config/infyom/laravel_generator.php 更改

    'add_on' => ['swagger' => true]

## 生成器指令
    (建議先做migration再做生成指令，就不會一個一個問)
    php artisan infyom:api $MODEL_NAME (生成api Controller)
    php artisan infyom:scaffold $MODEL_NAME (生成curd頁面 Controller)
    php artisan infyom:api_scaffold $MODEL_NAME (api，scaffold一起做)
    php artisan infyom:$options $MODEL_NAME --fromTable --tableName=$tableName (從現有的table生成api或是curd頁面)