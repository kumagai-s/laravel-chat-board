# laravel-chat-board

## laravelのインストール

```
[mac] $ docker-compose exec app bash
[app] $ composer create-project --prefer-dist "laravel/laravel=8.*" .
[app] $ php artisan -V
Laravel Framework 8.0.0
```

## Predisの追加

```
composer require predis/predis
```

## Laravel Echo Serverのインストール

```
# 下記コマンドはLaravel7では使えない
php artisan preset react

composer require laravel/ui
php artisan ui react

BROADCAST_DRIVER=redis
REDIS_HOST=redis

//for Echo
import Echo from 'laravel-echo';
window.io = require('socket.io-client');

//接続情報
window.Echo = new Echo({
    broadcaster: 'socket.io',
    host: 'http://localhost:6001',
});

//購読するチャネルの設定
window.Echo.channel('public-event')
    .listen('PublicEvent', (e) => {
        console.log(e);
    });

'client' => env('REDIS_CLIENT', 'predis'),
```