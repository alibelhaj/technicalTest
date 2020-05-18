init:
	composer.phar install
	php bin/console doctrine:database:drop  --force
	php bin/console doctrine:database:create --if-not-exists --no-interaction
	php bin/console doctrine:migrations:migrate --no-interaction -q
	php bin/console assets:install
	php bin/console cache:clear
