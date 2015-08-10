## Simple sales payroll application
 - PHP 5.6
 - PHPUnit 4.7
 - XDebug 2.3

### Steps
1. Install docker `https://docs.docker.com/installation`
2. Pull image with `docker pull zmijewski/php-xdebug:latest`
3. Run `docker run -it --name=app zmijewski/php-xdebug:latest`
4. Run in container `php composer.phar install`
5. To run application run in container `php src/app.php -f your_filename`
6. To run tests with coverage run in container `./vendor/bin/phpunit`

### Extra
 - Start/Stop container with `docker container-name stop/start`
 - To enter container run `docker exec -it container-name bash`