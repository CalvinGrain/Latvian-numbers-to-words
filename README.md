* Works under 10 000
* Works with both "," and "." decimal seperator
* Can be used for latvian invoice generation
* lightweight and fast

Examples:
```php
require_once 'lvnumtowords.php';
$num = new lvnumtowords();

echo $num->toCurrency('9999.99');
//deviņtūkstoš deviņsimt deviņdesmit deviņi eiro un deviņdesmit deviņi centi

echo $num->toCurrency('1337.22');
//tūkstots trīssimt trīsdesmit septiņi eiro un divdesmit divi centi

echo $num->toCurrency('0.22');
//00 eiro un divdesmit divi centi

echo $num->toCurrency('1,22');
//viens eiro un divdesmit divi centi

echo $num->toCurrency('1,00');
//viens eiro un 00 centi
```
