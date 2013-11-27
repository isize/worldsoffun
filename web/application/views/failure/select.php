<h1><span>Selecteer</span> Storing</h1>

<p>Selecteer hier de storing.</p>
<form action="<?php print wof_url('/failure/send') ?>">

<?php foreach($failures as $failure) :  ?>
	<label class="radio">
		<input type="radio" name="failure" />
		<?php print $failure ?>
	</label>
<?php endforeach; ?>

<label class="radio">
	<input type="radio" name="failure" />
	Anders namelijk:
</label>

<textarea class="input-block-level" rows="5" placeholder="Beschrijf hier de storing"></textarea>


<input type="submit" name="" value="Verstuur" class="btn btn-primary pull-right" />


</form>