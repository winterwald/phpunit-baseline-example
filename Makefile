
install:
	composer install

phpunit-without-deprecation-details:
	php vendor/bin/phpunit \
        --configuration phpunit.xml \
        ./tests

phpunit-with-some-deprecations:
	rm -f some-deprecations-baseline.xml
	php vendor/bin/phpunit \
		--configuration some-deprecations-phpunit.xml \
		--generate-baseline some-deprecations-baseline.xml \
		./tests
	cat some-deprecations-baseline.xml

run-phpunit-with-some-deprecations-baseline:
	php vendor/bin/phpunit \
		--configuration some-deprecations-phpunit.xml \
		--use-baseline some-deprecations-baseline.xml \
		./tests

phpunit-with-all-deprecations:
	rm -f all-deprecations-baseline.xml
	php vendor/bin/phpunit \
		--configuration all-deprecations-phpunit.xml \
		--generate-baseline all-deprecations-baseline.xml \
		./tests
	cat all-deprecations-baseline.xml

run-phpunit-with-all-deprecations-baseline:
	php vendor/bin/phpunit \
		--configuration all-deprecations-phpunit.xml \
		--use-baseline all-deprecations-baseline.xml \
		./tests
