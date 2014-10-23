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
    	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <?php echo $this->Html->charset(); ?>
        <title>
            <?php echo $cakeDescription ?>:
            <?php echo $title_for_layout; ?>
        </title>
        <?php
            echo $this->Html->meta('icon');
            echo $this->Html->css('bootstrap');
            echo $this->fetch('meta');
            echo $this->fetch('css');
            echo $this->fetch('script');
        ?>
        <style> 
        	.icon-spread{padding-left:10px; padding-right:10px}
        	.icon-spread:hover{color:lightblue
        	}
        </style>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <h1>Omaha Metro Area Science Fair</h1>
            </div>
            <div class="row">
                <?php echo $this->Session->flash(); ?>
                <?php echo $this->fetch('content'); ?>
            </div>
            <div class="row">
                <div class="col-md-5 col-md-offset-3" style="text-align:center;">
                	<a href="https://www.facebook.com/msefomaha"><i class="icon-spread fa fa-facebook fa-2x on fa-square-o"></i></a>
                	<a href="https://twitter.com/MSEFOmaha"><i class="icon-spread fa fa-twitter fa-2x on fa-square-o"></i></a>
                    <p>
                        Created as a University of Nebraska Capstone Project
                    </p>
                </div>
            </div>
        </div>
    </body>
</html>
