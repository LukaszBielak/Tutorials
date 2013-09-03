{include file="head.tpl" title="Strona Główna!" version="2.2"}


Witaj, na mojej stronie o SMARTY :

{* capitalize      - cypierwsze literki słow dużą literą, z :true także przy cyfrach  *}
{* count_character - zlicza ilość znaków, z :true liczy także spacje *}
{* count_words     - zlicza ilość słów *}
{* cat:"zdanie"    - dopisuje na końcu "zdanie" *}
{* nl2br           - zamienia \n do <br /> *}
{* default:"co wyswietlic gdy nie ma danej zmiennej" *}
{* replace:'ZAMIEN TO':'NA TO' *}
{* upper           - wszystkie litery z dużej *} 
{* lower           - wszystkie litery z małej *}
{* wordrap:5:"cokolwiek"  - po każdych 5 zakach wpisze "cokolwiek"  *}
<br /><br /><br />

{$smarty.now|date_format:'%Y-%m-%d %H:%M:%S'}
{* Wyświetla dzisiejszą date i godzine *}

{include file="foot.tpl"}