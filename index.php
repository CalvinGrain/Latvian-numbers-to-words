<?php
require_once 'lvnumtowords.php';
$num = new lvnumtowords();

echo $num->toCurrency('9999.99');
echo "<br/>";
echo $num->toCurrency('1337.22');
echo "<br/>";
echo $num->toCurrency('0.22');
echo "<br/>";
echo $num->toCurrency('1,22');
echo "<br/>";
echo $num->toCurrency('1,00');
