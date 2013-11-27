<?php print '<?xml version="1.0" encoding="UTF-8"?>' ?>
<html lang="nl">
	<head>
		
		
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=9" />
		
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<?php if(isset($page_title)) : ?><title><?php echo $page_title; ?></title>
		<?php endif; ?>
		
		<?php if(isset($meta_keywords)) : ?><meta name="keywords" content="<?php print $meta_keywords ?>" />
		<?php endif; ?>
		
		<?php if(isset($meta_description)) : ?><meta name="description" content="<?php print $meta_description ?>" />
		<?php endif; ?>
		
		<meta name="resource-type" content="document" />
		<meta name="robots" content="all, index, follow"/>
		<meta name="googlebot" content="all, index, follow" />
		
		<?php if(!empty($connanical)) : ?><link rel="canonical" href="<?php echo $canonical?>" />
		<?php endif; ?>
		
		<?php foreach($css as $file ):  ?><link rel="stylesheet" href="<?php echo $file; ?>" type="text/css" />
		<?php endforeach; ?>
		
		<?php foreach($js as $file) :  ?><script src="<?php echo $file; ?>"></script>
		<?php endforeach; ?>
		
		
		<?php if(isset($map)) print $map['js']; // print google map JS if needed?>


	    <!-- Le styles -->
	    <link href="<?php echo base_url(); ?>static/css/bootstrap.css" rel="stylesheet">
	    <link href="<?php echo base_url(); ?>static/css/custom.css" rel="stylesheet">
	
	    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
	    <!--[if lt IE 9]>
	      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	    <![endif]-->
	
	    <!-- Le fav and touch icons -->
	    <link rel="shortcut icon" href="<?php echo base_url(); ?>static/images/favicon.png" type="image/x-icon"/>
		<meta property="og:image" content="<?php echo base_url(); ?>static/images/favicon.png"/>
		<link rel="image_src" href="<?php echo base_url(); ?>static/images/favicon.png" />
		
</head>

  <body>
  		<?php if($errors) : ?>
			<div class="alert alert-danger">
				<h2>Woops! Er ging iets fout.</h2>
				<ul>
					<li><?php print implode($errors,'</li><li>')?></li>
				</ul>
			</div>
		<?php endif; ?>
		<?php if($message) : ?>
			<div class="alert alert-info">
				<h2>Goed bezig! </h2>
				<?php print $message ?>
			</div>
		<?php endif; ?>
  	<?php print $output; ?></body>
</html>
