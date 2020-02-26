# laravel-blog

执行命令:
复制配置文件 env
cp .env.example .env
Tip: 修改其中的 APP_URL / APP_ADMIN_URL / 数据库配置
在数据库中创建 blog 表, 编码 utf8mb4 - utf8mb4_general_ci

生成 key
php artisan key:generate

安装 composer
composer install

安装 npm
npm install

创建数据表
php artisan mirgrate:fresh

生成测试数据
php artisan db:seed

执行 npm
npm run dev
npm run watch-poll

