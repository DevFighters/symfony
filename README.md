# DEV FIGHTERS - Symfony

REQUIREMENTS
------------
* Requires PHP >= 8.1

INSTALLATION
------------
* Install with composer : composer require dev-fighters/symfony

* Add to ``config/packages/doctrine.yaml`` :

```yaml
  doctrine:
    dbal:
      charset: utf8
      default_table_options:
        charset: utf8
        collate: utf8_unicode_ci
      types:
        mediumint: DevFighters\Symfony\Database\Type\MediumintType
        tinyint: DevFighters\Symfony\Database\Type\TinyintType
        datetime: DevFighters\Symfony\Database\Type\DateTimeType
        date: DevFighters\Symfony\Database\Type\DateType
      dql:
        string_functions:
          replace: DoctrineExtensions\Query\Mysql\Replace
          MONTH: DoctrineExtensions\Query\Mysql\Month
          YEAR: DoctrineExtensions\Query\Mysql\Year
```
