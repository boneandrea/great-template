# CakePHP+CakeDCでログインとユーザ管理をテンプレート化する

CakePHP+[CakeDC](https://github.com/CakeDC/users/)でログイン周り、パスワードリセットなどのテンプレートアプリ

## できるもの
- ユーザテーブル
  - roles
    - superadmin
    - admin
    - user
- ログイン/ログアウト
- CakeDCによるユーザ管理
  - パスワードリセットフロー
    - メール送信なども行う
  - ユーザ新規登録（不要なら潰せる）

## Installation

新規アプリ立ち上げは以下

### ソース取得
```
$ git clone
```

### サーバ構築
起動までを行う.
web, db, mailhog(簡易メールサーバー/クライアント、WebUIあり)の3つができる
```
$ docker-compose build --no-cache
$ docker-compose up -d
$ docker-compose run --rm web composer i --no-interaction
$ docker-compose run --rm web bin/cake migrations migrate -p CakeDC/Users
```

edit config/app_local.php
```
    'Datasources' => [
        'default' => [
            'host' => 'db',
            'username' => 'user',
            'password' => 'pass',
            'database' => 'project',
        ],
        'test' => [
            'host' => 'db',
            'username' => 'user',
            'password' => 'pass',
            'database' => 'test_project',
        ],
    ],
    'EmailTransport' => [
        'default' => [
            'className' => 'Smtp',
            'host' => 'mailhog',
            'port' => 1025,
            'timeout' => 30,
            'tls' => null,
        ],
    ],
```


### DB初期設定
usersテーブルを作る
```
$ docker-compose run --rm web bin/cake migrations migrate
```

### userの登録
3usersが登録される
- superadmin@example.com (role:superuser)/ 123456
- admin1@example.com (role:admin)/ 123456
- user1@example.com (role:user)/ 123456
```
$ bin/cake migrations seed --seed
```
### (手動)superadminの追加
stdoutにパスワードが表示されるので確保する
```
$ docker-compose run --rm web bin/cake users addSuperuser
```

詳しくは
```
$ docker-compose run --rm web bin/cake users add_user --help
```
## cleanup
```
docker-compose run --rm web bin/cake cache clear _cake_core_
```

# Try app
http://localhost:3000 (WebApp)
http://localhost:8025 (Email client)

# test
```
$ docker-compose --rm web composer test
```

# lintなどの設定
以下は設置済
- .eslintrc.js
- .prettierrc.js

以下は手動設置
- tool/git-hooks/pre-commit

# URL

## 管理画面
- /admin/login
- /admin/users/index
- /admin/users/add
- /admin/users/edit/1
- /admin/users/delete/1

## ユーザ画面
- /login
- /mypage


# 認証なしページ
- /
- /pages/hello


# Others
[ ] php-cs-fixer
[ ] phpmd
[ ] prettier
[ ] eslint
