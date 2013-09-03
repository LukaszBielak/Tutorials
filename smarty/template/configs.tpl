{config_load file=dark.conf section="setup"}

<html>
<head>
<title>{$title} - {$version} - {#odcienie#}</title>
<style type="text/css">
{literal}
.odstep{
  height: 8px;
}
.srodek{
  padding: 15px 10px 15px 10px;
  text-indent: 25px;
}
{/literal}

{* {ldelim} {rdelim}*}
</style>
</head>
<body bgcolor="{#bgcolor#}">
<center>
<table border="1" width="{#width#}" cellspacing="0">
<tr><td colspan="2" align="center">{$title}</td></tr>
</table>
<div class="odstep"></div>
<table border="1" width="{#width#}" height="490" cellspacing="0">
<tr valign="top"><td width="10%" align="center">
{if #bold#}<b> {/if}Menu:
{if #bold#}</b>{/if}




