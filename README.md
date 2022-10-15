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
$ docker-compose up
```

### DB初期設定
usersテーブルを作る
```
$ docker-compose run --rm web bin/cake migrations migrate -p CakeDC/Users
```

### superadminの追加
stdoutにパスワードが表示されるので確保する
```
$ docker-compose run --rm web bin/cake users addSuperuser
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
