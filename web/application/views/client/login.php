<div class="text-center">
<h1>Login</h1>

<p>Voer hier uw persoonlijke code in.</p>
</div>
<form action="<?php print wof_url('/client/login')?>" method="post" id="login">
	
	<div class="passcode">
		<input type="tel" name="code[]" value="" />
		<input type="tel" name="code[]" value="" />
		<input type="tel" name="code[]" value="" />
		<input type="tel" name="code[]" value="" />
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