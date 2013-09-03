{* PĘTLA FOREACH

{foreach from=$msg key=indeks item=wartosc}
 <table border='1' cellspacing='0' width='320'>

   <tr><td>  ID       - {$wartosc.ID}       </td></tr>
   <tr><td>  Imię     - {$wartosc.Imie}     </td></tr>
   <tr><td>  Nazwisko - {$wartosc.Nazwisko} </td></tr>

 </table>
 {foreachelse}
 Nie znalazłem nikogo!
{/foreach}

*}

{*PĘTLA SECTION

{section name=i loop=$msg step=1 max=3}
    {if $smarty.section.i.first}
    <table border='1' cellspacing='0' cellpading='1'>
    {/if}

    <tr><td bgcolor="{cycle values="green, red"}"> {$msg[i].ID}   </td></tr>
    <tr><td bgcolor="{cycle values="green, red"}">{$haha[i].Imie}  </td></tr>
    <tr><td bgcolor="{cycle values="green, red"}">  {$msg[i].Nazwisko} </td></tr>
    {if $smarty.section.i.last}
    </table>
    {/if}
{sectionelse}
 Nie znalazłem nikogo!
{/section}

Mamy {$smarty.section.cokolwiek.total} użytkowników

*}

{* INSTRUKCJA IF

{if $ranga eq "Admin" or $ranga == "Król" || $ranga == "Książe"}
 Witaj Władco!
{elseif $ranga == "Wieszcz"}
  Witaj Wiesczu!
{else}
  Witaj Obywatelu!
{/if}

*}

{* TWORZENIE ZMIENNEJ

{assign var="name" value="Arek"}
Wartość w zmiennej $name to {$name}

*}

{* LICZNIK

{counter start=1 skip=1 direction=up assign=lala}<br />
{counter} <br />
{counter} <br />
{counter} <br />
{counter} <br />
{counter} <br />

{$lala}
*}

{* WYWOŁĄNIE KONSOLI DEBUG

{debug}

*}
 
{* WCZYTANIE PLIKU LUB STRONY

{fetch file='test.txt'}

*}

{*HIPEŁĄCZE DO MAILA

{mailto address='eskoal@bochnia.pl' subject='Oferta Współpracy' text='Nazwa' cc='druga@lala' bcc='lalala@hotmail.com, hmmm@trala' extra='class="email"'}

*}

{*TWORZENIE LISTY ROZWIJANEJ

<form method=GET>
{html_options name=foo values=$ID output=$Imie selected=3}
<input type=submit>
</form>
        {*
          name = nazwa selecta

          <SELECT name=tralala>
          
          values - wartości które są wysyłane do tablicy $_GET lub tez $_POST

          output = wynik (to co pokoze lista)

          selected = to jest to co jest wybrane (ale jest to polaczone z values)
        *}
*}        

{*WYBÓR CZASU I DATY

{html_select_time}

{html_select_date start_year=-20}

*}