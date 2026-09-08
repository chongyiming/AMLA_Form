# AMLA_Form — Setup Guide (Windows)
php: copy local php to pc, add path and php path
git clone <repo-url> AMLA_Form
cd AMLA_Form
Install composer: https://getcomposer.org/download/
composer install
npm install
npx puppeteer browsers install chrome-headless-shell
npx puppeteer browsers install chrome
copy .env
php artisan storage:link
php artisan serve