<?php
$ModuleTools = ModuleTools::instance();

$Module = array(
		'name'=>'BOTR Video',
		'variable_params'=>true,
		'left_menu_heading'=>'BOTR Video',
		'default_view'=>'operatorlist',
		'default_navigation_part'=>ModuleTools::navigationPart('setup'),
		'left_menu'=>'design:parts/setup/menu.tpl'
);

$ViewList = array();

$ViewList['create_url'] = array(
			'name'=>'Create URL',
			'script'=>'create_url.php',
			'params'=>array(''),
			'default_navigation_part'=>$Module['default_navigation_part'],
			'left_menu'=>true
);
			
$ViewList['post_url'] = array(
			'name'=>'Post URL',
			'script'=>'post_url.php',
			'params'=>array(''),
			'default_navigation_part'=>$Module['default_navigation_part'],
			'left_menu'=>true
);

?>