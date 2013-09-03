<html>
<head>
{if $mode eq pelne}
<title>Smarty. Wyswietlanie pelnych artykulow</title>
{else}
<title>Smarty. Wyswietlanie zajawek</title>
{/if}
</head>
<body>
{if $mode eq 'pelne'}
<h3>{$news.autor}: {$news.tytul}</h3>
<p>{$news.zajawka}</p>
<p>{$news.rozwiniecie}</p>
<a href="{$smarty.server.SCRIPT_NAME}">powrot</a>
{else}
{section name=i loop=$news}
<table border="1" cellspacing="0" cellpadding="0" 
  {if $smarty.section.i.iteration is even} bgcolor="EAEAEA"{/if}>
<tr><td>{$news[i].autor}</td><td>{$news[i].tytul}</td></tr>
<tr><td colspan="2">{$news[i].zajawka}</td></tr>
<td  colspan="2" align="right">
  <a href="{$smarty.server.SCRIPT_NAME}?n={$news[i].id}">wiecej</a>
</td></tr>
</table>
<hr>
{/section}
{/if}
{html_table}
</body>
</html>