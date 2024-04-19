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
        mediumint: CkAmaury\Symfony\Database\Type\MediumintType
        tinyint: CkAmaury\Symfony\Database\Type\TinyintType
        datetime: CkAmaury\Symfony\Database\Type\DateTimeType
        date: CkAmaury\Symfony\Database\Type\DateType
      dql:
        string_functions:
          replace: DoctrineExtensions\Query\Mysql\Replace
          MONTH: DoctrineExtensions\Query\Mysql\Month
          YEAR: DoctrineExtensions\Query\Mysql\Year
```
