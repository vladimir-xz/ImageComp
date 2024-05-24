install:
	composer install
validate:
	composer validate
test:
	composer exec --verbose phpunit tests/models