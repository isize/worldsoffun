
<div class="text-center">
<h1>Verander code</h1>

<p class="alert">
	U kunt nu uw eigen toegangscode invoeren.
</p>
</div>


<form action="<?php print wof_url('/client/changecode')?>" method="post" id="login">
	
	<h2 class="text-center">Nieuwe code</h2>
	
	<div class="passcode">
		<input type="tel" name="code[]" value="" />
		<input type="tel" name="code[]" value="" />
		<input type="tel" name="code[]" value="" />
		<input type="tel" name="code[]" value="" />
	</div>

	<h2 class="text-center">Herhaal nieuwe code</h2>
	
	<div class="passcode">
		<input type="tel" name="code_repeat[]" value="" />
		<input type="tel" name="code_repeat[]" value="" />
		<input type="tel" name="code_repeat[]" value="" />
		<input type="tel" name="code_repeat[]" value="" />
	</div>

</form>

<script type="text/javascript">
	$(document).ready(function() {
		
		
		$('.passcode input').keyup(function(){
			
			inputs = $('.passcode input');
			doPost = true;
			for(i=0;i<inputs.length;i++){
				doPost = $(inputs[i]).val() != '';
				
				if(!doPost){
					$(inputs[i]).focus();
					break;
				}
			}
			
			if(doPost){
				
				$('#login').submit();
				
			}
			
		});
	});

</script>