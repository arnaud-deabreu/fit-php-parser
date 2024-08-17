PHPCSFIXER = vendor/bin/php-cs-fixer fix --config=.php-cs-fixer.php --verbose --diff

.PHONY: phpstan
phpstan:
	vendor/bin/phpstan analyse

.PHONY: phpcsfixer-dryrun
phpcsfixer-dryrun:
	$(PHPCSFIXER) --dry-run

.PHONY: phpcsfixer
phpcsfixer:
	$(PHPCSFIXER)

.PHONY: fitparser-gen-profile
fitparser-gen-profile:
	bin/fit-parser fit-parser:generate:profile