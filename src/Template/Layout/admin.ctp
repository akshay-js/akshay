<?php 
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */


?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $this->fetch('title'); ?>
	</title>
	 <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	
    <!-- Bootstrap Core CSS -->
	<?php echo $this->Html->css(array('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css','https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'),
	array('block' =>'css'));
	echo $this->fetch('meta');
	echo $this->fetch('css'); ?>
</head>
<body>
<div id="wrapper">
	<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0"><h2>Website Visitors</h2></nav>
		<?php echo $this->fetch('content'); ?>
	</div>
	<?php 
   echo $this->Html->script(array(
	'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js', 
	'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'
	),
   array('block' =>'bottom')); 
	echo $this->fetch('bottom');
	echo $this->fetch('custom_script');
	?>
</body>
</html>
