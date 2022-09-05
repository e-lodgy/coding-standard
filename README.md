<h1 align="center">Coding Standard</h1>

[![CI](https://github.com/e-lodgy/coding-standard/actions/workflows/ci.yaml/badge.svg)](https://github.com/e-lodgy/coding-standard/actions/workflows/ci.yaml)

Coding standard configuration used by E-Lodgy.

Installation & usage
--------------------
1. Install this package:
```bash
$ composer require --dev e-lodgy/coding-standard
```

2. Import the configuration file in your `ecs.php`:
```php
$config->import('vendor/e-lodgy/coding-standard/ecs.php');
```

Example config (ecs.php)
------------------------
```php
use Symplify\EasyCodingStandard\Config\ECSConfig;
   
return static function (ECSConfig $config): void {
    $config->import('vendor/e-lodgy/coding-standard/ecs.php');
};
```
