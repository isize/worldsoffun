<h1><span>Registreren</span><br/>Bedrijfsgegevens</h1>

<form action="<?php print wof_url('/client/register') ?>" method="post">
	
	<?php wof_text_form('company', $company_fields,$company) ?>
	
	<h2>Uw gegevens</h2>
	<?php wof_text_form('client', $client_fields,$client) ?>
	
		<a href="#" class="btn btn-primary btn-post pull-right">
			Registreer
		</a>
	
</form>