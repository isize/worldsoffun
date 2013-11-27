<h1><span>Selecteer</span> speelautomaten</h1>
<p>Selecteer hier de speelautomaten die bij <?php print $company['name'] ?> staan. Je kunt er maximaal twee selecteren</p>

<form action="<?php print wof_url('/machine/change/'.$company['id'])?>" method="post">
	<input type="text" class="machine-search input-block-level" placeholder="Zoeken" />
	
	
	<?php foreach($machines as $machine) :  ?>
		<label class="checkbox machine-select" data-name="<?php print $machine['name'] ?>" >
			
			<input type="checkbox" name="machine[]" value="<?php print $machine['id'] ?>" />
			<?php print $machine['name'] ?>
			
		</label>	
	<?php endforeach; ?>
	
	
	<div class="text-center">
		<a href="#" class="btn btn-primary btn-post">
			Opslaan
		</a>
	</div>
</form>

<script type="text/javascript">

	$(document).ready(function() {
		
		$('.machine-search').keyup(function(){
			
			rows = $('.machine-select');
			
			for(i=0;i<rows.length;i++){
				row = $(rows[i]);
				machineName = row.attr('data-name').toString().toLowerCase();
				search = $('.machine-search').val().toString().toLowerCase();
				
				match = machineName.indexOf(search) != -1;
				
				row.css('display', match || search == '' ? 'block' : 'none' );
				
			}
		});
		
		
	});

</script>