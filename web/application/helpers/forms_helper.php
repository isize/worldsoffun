<?php 

	/**
	 * undocumented function
	 *
	 * @return void
	 * @author  
	 */
	function wof_url($url) {
		
		return site_url($url);
	}
	
	
	function wof_text_form($name,$fields,$record = array()){
		
		foreach($fields as $field=>$label){
			wof_input($name,$field,$label,$record);
		}
		
	}
		
	function wof_input(
		$name,
		$field,
		$placeholder = '',
		$record = array(),
		$settings = array()){
		
		$attributes = array();
		$attributes['name'] = $name.'['.$field.']';
		$attributes['value'] = (isset($record[$field]) ? $record[$field] : '');
		$attributes['placeholder'] = $placeholder;
		$attributes['type'] = isset($settings['type']) ? $settings['type'] : 'text';
		$attributes['class'] = isset($settings['class']) ? $settings['class'] .' input-block-level' : 'input-block-level';
		
		foreach(array('disabled') as $attr){
			if(isset($settings[$attr])){
				$attributes[$attr] = $settings[$attr];
			}	
		}
		
		if($attributes['type'] != 'hidden') {
		//	print '<label>'.$placeholder.'</label>';
		}
		print '<input';
		
		foreach($attributes as $name=>$val){
			print ' '.$name.'="'.$val.'"';
		}
		print '/>';
		
// 		
		// print '<input type="'.$type.'" '
		// .'name="'.$name.'['.$field.']" '
		// .'placeholder="'.$placeholder.'"'
		// .'value="'.$value.'"'
		// .'class="input-block-level"/>';
		
	}
		
	function wof_select(
		$name,
		$field,
		$placeholder,
		$records,
		$object = null,
		$nameField = 'name',
		$idField = 'id'
	){
		
		if($placeholder != ''){
		// 	print '<label>'.$placeholder.'</label>';
		}
		print '<select name="'.$name.'['.$field.']" class="input-block-level">';
		foreach($records as $record){
			
			$selected = (isset($object[$field]) && $record[$idField] == $object[$field]) ? ' SELECTED' : '';
			
			print '<option'.$selected.' value="'.$record[$idField].'">';
			print $record[$nameField];
			print '</option>';
			
		}
		print '</select>';
	}
	
	/**
	 * undocumented function
	 *
	 * @return void
	 * @author  
	 */
	function wof_checkbox($name,$field,$label,$object,$idField = 'id') {
		$value = isset($object) && isset($object[$idField]) ? $object[$idField] : 1;
	print '<label class="checkbox">
			<input type="checkbox" name="'.$name.'['.$field.']" value="'.$value.'" /> '.$label.'
		</label>';
}
	/**
	 * undocumented function
	 *
	 * @return void
	 * @author  
	 */
	function wof_radio($name,$field,$label,$object,$idField = 'id') {
		$value = isset($object) && isset($object[$idField]) ? $object[$idField] : 1;
	print '<label class="radio">
			<input type="radio" name="'.$name.'['.$field.']" value="'.$value.'" /> '.$label.'
		</label>';
}

	/**
	 * undocumented function
	 *
	 * @return void
	 * @author  
	 */
	function fw_status_class($s) {
		
		foreach(fw_statusses() as $status){
			if($status['id'] == $s){
				return $status['class'];
			}
		}
		
		return '';
		
	}

	/**
	 * Gets the status from the class
	 * @return void
	 * @author Stef Wijnberg
	 */
	function fw_status_name($s) {
		
		foreach(fw_statusses() as $status){
			if($status['id'] == $s){
				return $status['name'];
			}
		}
		
		return '';
		
	}
	
	function fw_statusses(){
		return array(
			array(
				'id' => 'open',
				'name' => 'Openstaand',
				'class' => 'danger'
			),
			array(
				'id' => 'closed',
				'name' => 'Afgerond',
				'class' => 'success'
			),
			array(
				'id' => 'send_back',
				'name' => 'Terugsturen',
				'class' => 'info'
			)
		);
	}
	
	function wof_table($records, $controller = '', $fields = array(), $buttons = array(),  $id_field = 'id'){
		
		
		
		print '<table class="table">';
		print '<thead>';
		print '<tr>';
		foreach($fields as $field=>$label){
			print '<th>'.$label.'</th>';
		}
		foreach($buttons as $name => $settings){
			print '<th>&nbsp;</th>';
		}
		print '</tr>';
		print '</thead>';
		print '<tbody>';
		
		foreach($records as $i=>$record){
			print '<tr>';
				foreach($fields as $field=>$label){
					print '<td>'.$record[$field].'</td>';
				}
				foreach($buttons as $action => $label){
					print '<td>';
					
					if($action == 'delete'){
						$class = 'btn btn-danger';
					}
					if($action == 'view'){
						$class = 'btn btn-info';
						
					}
					if($action == 'edit'){
						$class = 'btn btn-primary';
					}
					
					$url = site_url('/' . $controller . '/'.$action.'/'.$record[ $id_field ]);
					
					print '<a class="'.$class.'" href="'.$url.'">'.$label.'</a>';
					print '</td>';
				}
			print '</tr>';
		}

		if(count($records) == 0){
			print '<tr class="danger">';
			$colspan = count($fields) + count($buttons);
			print '<td colspan="'.$colspan.'" >Er is niks gevonden</td>';
			print '</tr>';
		}

		print '</tbody>';
		print '</table>';
		
	}
		
	function price($in){
		return  number_format($in,2,'.','');
	}


	function wof_photo_path($photo){
		return '/files/session/' . $photo['session_id'] . '/fotos/' .$photo['number'] .'.jpg';
	}

	/**
	 * Resizes a image with the given paht. 
	 * The path must be from the root URL, like so: /static/images/image.jpg
	 * The default output format is JPG
	 * caches the images in the /cache/images directory. 
	 * @return String
	 * @author Stef Wijnberg
	 */
    function wof_image($path,$w=0,$h = 0,$crop = 0,$format = 'png',$settings = array()){
		
		print '<img src="'.resize($path,$w,$h,$crop,$format,$settings).'" />';
		
	}
	
	
	
	/**
	 * Resizes a image with the given paht. 
	 * The path must be from the root URL, like so: /static/images/image.jpg
	 * The default output format is JPG
	 * caches the images in the /cache/images directory. 
	 * @return String
	 * @author Stef Wijnberg
	 */
    function resize($p,$w=0,$h = 0,$crop = 0,$format = 'png',$settings = array()){
	
		if(!file_exists(DOC_ROOT . $p)){
			return '';
		}
	
		$sourceFile = DOC_ROOT . $p;
		
		$cacheUrl = '/static/cache/images';
		
		if(!is_dir(DOC_ROOT.$cacheUrl)){
			mkdir(DOC_ROOT.$cacheUrl);
		}
		$hash = md5($p.$w.$h.$crop.$format);
		$outputUrl 	= $cacheUrl.$hash.".".$format;
		
		$outputfile = DOC_ROOT . $outputUrl;
		
	
		
		if(file_exists($outputfile)){
				
			// rewrites the path of the image for search index
			// needs to be supported in the .htaccess file
			// Use this line: RewriteRule ^img/([a-zA-Z0-9]+)/([a-zA-Z0-9-]+).png cache/images/$1.png
			if(isset($settings['rewrite'])){
				$outputUrl = '/img/'.$hash.'/'.$settings['rewrite'].'.'.$format;	
			}
			
			return $outputUrl;
		}	
		
		require_once( $_SERVER['DOCUMENT_ROOT']. "/application/third_party/phpThumb/phpthumb.class.php" );
		
		$phpThumb = new phpThumb();
		$phpThumb->setSourceFilename( $sourceFile );
		$phpThumb->setParameter( 'f' ,$format );
		
		if($w != 0){
			$phpThumb->setParameter( 'w' ,$w );
		}
	
		if($h != 0){
			$phpThumb->setParameter( 'h' , $h );
		}
				
		if($crop){
			
			if($w  != 0){	
				$phpThumb->setParameter( 'ws' , $w );
			}
			
			if($h != 0){
				$phpThumb->setParameter( 'hs' , $h );
			}
			
			$phpThumb->setParameter( 'zc' , 1 );
		}else{
			$phpThumb->setParameter( 'far' , 1 );
			$phpThumb->setParameter( 'bg' , 'ffffff' );
		}
		
		
		
		if(!$phpThumb->GenerateThumbnail())
		{
			return '';
		}else{
			
			$phpThumb->RenderToFile( $outputfile );	
			
			// adds the watermark to the newly rendered image
			if(isset($settings['watermark'])){
				watermarkImage($outputUrl,$settings['watermark']);
			}
			
			if(defined('BASE_URL')){
				$outputUrl = BASE_URL . $outputUrl;
			}
			return $outputUrl;
		}
		
	}

	/**
	 * Watermarks an image
	 * @return void
	 * @author Stef Wijnberg  
	 */
	function watermarkImage($src, $watermarkPath){
		
		$stamp = imagecreatefrompng(DOC_ROOT.$watermarkPath);
		$im = imagecreatefrompng(DOC_ROOT.$src);
		
		// Set the margins for the stamp and get the height/width of the stamp image
		$marge_right = 10;
		$marge_bottom = 10;
		$sx = imagesx($stamp);
		$sy = imagesy($stamp);
		
		//imagealphablending($im, false);
		imagesavealpha($im, true);
		imagesavealpha($stamp, true);
		
		// Copy the stamp image onto our photo using the margin offsets and the photo 
		// width to calculate positioning of the stamp. 
		imagecopy($im, $stamp, imagesx($im) - $sx - $marge_right, imagesy($im) - $sy - $marge_bottom, 0, 0, imagesx($stamp), imagesy($stamp));
		
		// Save and free memory
		imagepng($im,DOC_ROOT.$src);
		imagedestroy($im);
		
	}
	
?>