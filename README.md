## プロジェクトのセットアップ

依存関係をインストールするには、以下のコマンドを実行してください：

```bash
docker run --rm \
-u "$(id -u):$(id -g)" \
-v "$(pwd)":/var/www/html \
-w /var/www/html \
laravelsail/php81-composer:latest \
composer install --ignore-platform-reqs

cd travel_service

//エイリアス
alias sail="./vendor/bin/sail"
source ~/.zshrc

// dopcker立ち上げ
sail up -d

// docker停止
sail down
sail stop
