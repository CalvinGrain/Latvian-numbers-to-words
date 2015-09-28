* Works under 10 000
* Works with both "," and "." decimal seperator
* Can be used for latvian invoice generation
* lightweight and fast

Examples:
```php
require_once 'lvnumtowords.php';
$num = new lvnumtowords();

echo $num->toCurrency('9999');
//deviņtūkstoš deviņsimt deviņdesmit deviņi eiro un 00 centi

echo $num->toCurrency('1337.22');
//tūkstots trīssimt trīsdesmit septiņi eiro un 22 centi

echo $num->toCurrency('0.22');
//00 eiro un 01 cents

echo $num->toCurrency('1,22');
//viens eiro un 22 centi

echo $num->toCurrency('1,00');
//viens eiro un 00 centi
```
