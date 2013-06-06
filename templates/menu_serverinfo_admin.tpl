{strip}
{if $packageMenuTitle}<a href="#"> {tr}{$packageMenuTitle|capitalize}{/tr}</a>{/if}
<ul class="{$packageMenuClass}">
	<li><a class="item" href="{$smarty.const.SERVERINFO_PKG_URL}admin/import_hosts.php">{tr}Import Hosts{/tr}</a></li>
</ul>
{/strip}
