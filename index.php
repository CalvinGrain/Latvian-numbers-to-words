<?php
require_once 'lvnumtowords.php';
echo toCurrency('1337');
echo "<br/>";
echo toCurrency('1337.22');
echo "<br/>";
echo toCurrency('0.22');
echo "<br/>";
echo toCurrency('1,22');
echo "<br/>";
echo toCurrency('1,00');
