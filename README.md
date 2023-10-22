## How to launch

Install dependencies

- node modules - npm install
- vendor - composer install

Configure Database

- rename .env.example to .env
- type your host,port,username,password,database
- launch migrations - php artisan migrate
- (optional) seed db with test data - php artisan db:seed

Generate App key

- php artisan key:generate

Build node modules

- npm run build
