# ログインとユーザ管理までのテンプレート

CakePHP+[CakeDC](https://github.com/CakeDC/users/)でログイン周り、パスワードリセットなどのテンプレートアプリ  
コマンド10行以内でアプリが起動する

## できるもの
- ユーザテーブル
  - `roles`カラムがある。値は以下のいずれか(string)
    - `superadmin`
    - `admin`
    - `user`
- 一般ユーザのログイン/ログアウト画面
    - 一般ユーザのログイン後のマイページ
- 管理ユーザのログイン/ログアウト画面
    - 管理ユーザのログイン後のダッシュボード
- CakeDCによるユーザ管理
  - パスワードリセットフロー
    - メール送信なども行う
    - 各種カスタムは[CakeDCドキュメント](https://github.com/CakeDC/users/blob/master/Docs/Home.md#i-want-to)参照
  - ユーザ新規登録（不要なら潰せる）

## Quickstart

新規アプリ立ち上げ時に、以下の[cleanup](#cleanup)までを行う

### ソース取得
```
$ git clone
$ cd WORKDIR
$ cp tool/git-hooks/pre-commit .git/hooks
```

### サーバ構築
web, db, mailhog(簡易メールサーバー/クライアント、WebUIあり)の3つができる
```
$ docker-compose build --no-cache
$ docker-compose run --rm web composer i --no-interaction
```

edit `config/app_local.php`
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
$ docker-compose run --rm web bin/cake migrations migrate -p CakeDC/Users
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
### cleanup
```
$ docker-compose run --rm web bin/cake cache clear _cake_core_
$ docker-compose up -d
```
ここまででWebAppが動く.


# Try app
- http://localhost:3000 (WebApp)
- http://localhost:8025 (Email client)

# test
```
$ docker-compose --rm web composer test
```

# lintなどの設定
以下は設置済
- .php-cs-fixer.php
- .eslintrc.js
- .prettierrc.js

以下を手動設置すると上記3つのlinterが動く
- tool/git-hooks/pre-commit


### (必要なら手動で)superadminの追加
stdoutにパスワードが表示されるので確保する
```
$ docker-compose run --rm web bin/cake users addSuperuser
```

詳しくは
```
$ docker-compose run --rm web bin/cake users add_user --help
```
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
