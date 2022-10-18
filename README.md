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
$ docker-compose run --rm web comspoer i
```

### DB初期設定
usersテーブルを作る
```
$ docker-compose run --rm web bin/cake migrations migrate
```

### userの登録
superadmin, admin1, user1 が登録される
```
$ bin/cake migrations seed --seed UsersSeed
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

# URL

## 管理画面
[ ] - /admin
[ ] - /admin/login
[x] - /admin/users/index
[x] - /admin/users/add
[x] - /admin/users/edit/1
[x] - /admin/users/delete/1

## ユーザ画面
[ ] - /login
  [x] - /mypage
  [x] - /mypage ログイン後ここにくる


# 認証なしオープンページ
[x] - /
[x] - /pages/hello


# Others
[ ] php-cs-fixer
[ ] phpmd
[ ] prettier
[ ] eslint
