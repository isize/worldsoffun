<h1><span>Selecteer</span> speelautomaat</h1>
<p>Selecteer hier de speelauotmaat die storing heeft</p>

<table class="table">
<?php foreach($machines as $machine) :  ?>
	<tr>
		<td>
			<?php print $machine['name'] ?>
		</td>
		<td>
			<a href="<?php print wof_url('/failure/select/'.$company['id'] . '/' . $machine['id'])?>" class="btn btn-primary pull-right">
				Selecteer
			</a>
		</td>
	</tr>
<?php endforeach; ?>
</table> 