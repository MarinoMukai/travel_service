## プロジェクトのセットアップ

依存関係をインストールするには、以下のコマンドを実行してください：

```bash

cd travel_service

docker run --rm \
-u "$(id -u):$(id -g)" \
-v "$(pwd)":/var/www/html \
-w /var/www/html \
laravelsail/php81-composer:latest \
composer install --ignore-platform-reqs

// エイリアス
alias sail="./vendor/bin/sail"
source ~/.zshrc

// dopcker立ち上げ
sail up -d

// docker停止
sail down
sail stop

// 500エラー出たら環境構築者に聞いてください。