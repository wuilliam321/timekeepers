# Timekeepers

## How to install

### Pre-requisite
 * Install PHP5.6+
 * Install Laravel (see https://laravel.com/docs/5.3)
 * Install Composer (https://getcomposer.org/download/)
 * Install Node.js (Stable version) (https://github.com/creationix/nvm)
 * Install Gulp (http://gulpjs.com/)
 * Install a Mysql Server

### PHP 5.6 on Ubuntu
See https://launchpad.net/~ondrej/+archive/ubuntu/php
```
sudo add-apt-repository ppa:ondrej/php
sudo apt-get update
sudo apt-get install -y php5.6
```
### PHP 5.6 on Debian
See (https://www.dotdeb.org/instructions/)
```
# apt-get install -y php5 php5-mysql php5-cli libapache2-mod-php5
```
### Install Node
```
nvm install stable # See how to install nvm in pre-requisites
```
### Setting up the app
Installing some libraries needed
```
# apt-get install php5.6-mbstring php5.6-xml php5.6-mysql
```
Download the code
```
git clone https://github.com/wuilliam321/timekeepers.git
```
Move to the `timekeepers/` folder
```
cd timekeepers/
```
Install composer dependencies, you have to go to pre-requisite link and see how to enable composer
```
~/composer.phar install # Or the absolute route to composer.phar
```
This step is for nvm users only (stable)
```
nvm use stable
```
Install node dependencies
```
npm install --global gulp-cli # Ensure you have gulp installed
npm install
```
Create a mysql database named `timekeepersdb`. First log into the mysql shell
```
$ mysql # Use your custom credentials ex: mysql -u root -proot
```
In the mysql shell run:
```
mysql> create database timekeepersdb; 
```
Prepare `.env` file
```
cp .env.example .env
php artisan key:generate
```
Open the `.env` file and change these values with the yours
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=timekeepersdb # < HERE GOES YOUR MYSQL DATABASE
DB_USERNAME=root          # < HERE GOES YOUR MYSQL USERNAME
DB_PASSWORD=              # HERE GOES YOUR MYSQL PASSWORD

#Setup the SMPT Server or any mail server, Ex Google SMTP

MAIL_DRIVER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=somemail@gmail.com
MAIL_PASSWORD=50m3_Passw0rd
MAIL_ENCRYPTION=tls

# ADD THEESE NEW VARS

SEND_MAIL_WITH_SEMANA_PROCESADA=false
NOTIFICATION_MAIL=admin@domain.com
BASE_URL=http://localhost/timekeepers
DAYS_AGO_RECORDS_ADMIN=15
DAYS_AGO_RECORDS_NO_ADMIN=3
```
Save and close the file

After install all dependencies you have to run migrations
```
php artisan migrate
```
Fill database with data values
```
php artisan db:seed
```
If you want to clean all data and seed database again use:
```
php artisan migrate:refresh --seed
```
Run:
```
gulp # Every time you change the javascript files
```
Install the passport and credentials
```
php artisan passport:install
```
And run:
```
php artisan serve
```
Now you can go to:
```
http://localhost:8000/
```
And see the app working

### Configure the Recargos process (in background)
```
crontab -e
```
Add this line (Dont forget to put the right path to timekeepers directory)
```
* * * * *  cd /<PATH_TO_TIMEKEEPERS>/timekeepers/ && php artisan schedule:run >> /dev/null 2>&1
```
Save and exit.

Restart the `cron` service:
```
# service cron restart
```
You can check if the cron is OK by doing:
```
crontab -l
```
Install Supervisord to handle the queue worker (for recargos job)
```
# apt-get install supervisor
```
Create a file named `laravel-worker.conf` in the `/etc/supervisor/conf.d` path:
```
# vim /etc/supervisor/conf.d/laravel-worker.conf
```
Put the following content into this file
```
[program:laravel-worker]
process_name=%(program_name)s_%(process_num)02d
command=php /<PATH_TO_TIMEKEEPERS>/timekeepers/artisan queue:work database --sleep=3 --tries=1
autostart=true
autorestart=true
user=<LINUX_ACTIVE_USER>
numprocs=2
redirect_stderr=true
stdout_logfile=/<PATH_TO_TIMEKEEPERS>timekeepers/storage/logs/worker.log
```
Save and close the file

#### Start Supervisor
```
# supervisorctl reread
# supervisorctl update
# supervisorctl start laravel-worker:*
```

### Sending mails with exim4 and gmail on Debian/Ubuntu
See https://wiki.debian.org/GmailAndExim4
If you configure your gmail account to send mail with exim4, the workers must send you emails when success or errors.
