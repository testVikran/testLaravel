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

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Test </title>
        <meta name="keywords" content="" />
        <meta name="description" content="" />
		<script src="<?php echo ABSOLUTE_URL;?>/js/jquery.min.js"></script> 
		<script src="<?php echo ABSOLUTE_URL;?>/js/bootstrap.min.js"  type="text/javascript"></script>
		<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
        <meta charset="UTF-8">
        <script src="<?php echo ABSOLUTE_URL;?>/js/bootstrapValidator.min.js"  type="text/javascript"></script>
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--<link rel="shortcut icon" href="PUT YOUR FAVICON HERE">-->
        
        <!-- Google Web Font Embed -->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
        
        <!-- Bootstrap core CSS -->
        <link href="<?php echo ABSOLUTE_URL;?>/css/bootstrap.css" rel='stylesheet' type='text/css'>
    </head> 
<body>
	<div id="container">
		
		<div id="content">
			<?php echo $this->fetch('content'); ?>

		</div>
		<div id="footer">
			
			<p>
				
			</p>
		</div>
	</div>
</body>
</html>
