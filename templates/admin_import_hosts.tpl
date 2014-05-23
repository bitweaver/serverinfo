{strip}

<div class="admin themes">
	<header>
		<h1 class="page-header">{tr}Import Host Data{/tr}</h1>
	</header>

	{formfeedback hash=$formFeedback}

	<div class="body">
		{form enctype="multipart/form-data" method="post"}
			<fieldset>
				<label>Select Hosts File</label>
				<input type="file" name="serverinfo_hosts">
				<span class="help-block">File should have one host per line, in "[name] [type] [address]" format</span>
				<button type="submit" name="import_hosts" value="import_hosts" class="btn btn-default">Import Hosts</button>
			</fieldset>
		{/form}
	</div>
</div>

{/strip}
