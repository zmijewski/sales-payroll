## Simple sales payroll application
 - PHP 5.6
 - PHPUnit 4.7
 - XDebug 2.3

### Steps
1. Install docker `https://docs.docker.com/installation`
2. Pull image with `docker pull zmijewski/php-xdebug:latest`
3. Clone repository `git clone git@github.com:zmijewski/sales-payroll.git`
4. Enter `cd sales-payroll`
5. Run `docker run -it -v $(pwd):/project --name=app zmijewski/php-xdebug:latest`
6. Run in container `php composer.phar install`
7. To run application, run in container `php src/app.php -f your_filename`
8. To run tests with coverage, run in container `./vendor/bin/phpunit`
9. To check coverage see build folder

### Caution
`$(pwd):/project` - means that your current directory is mounted in container at `/project`, so that you can work and use git on host machine

### Extra
 - Start/Stop container with `docker container-name stop/start`
 - To enter container run `docker exec -it container-name bash`
