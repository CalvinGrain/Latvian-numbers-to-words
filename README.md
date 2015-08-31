* Works under 10 000
* Works with both "," and "." decimal seperator
* Can be used for latvian invoice generation

Examples:
```php
require_once 'lvnumtowords.php';
echo toCurrency('1337');
echo toCurrency('1337.22');
echo toCurrency('0.22');
echo toCurrency('1,22');
echo toCurrency('1,00');
```
