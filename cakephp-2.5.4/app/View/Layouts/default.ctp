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
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1>Omaha Metro Area Science Fair</h1>
                </div>
                <div class="col-md-3 col-md-offset-3">
                    <button class="btn btn-success" type="button">Create Project</button>
                    <button class="btn btn-info" type="button">View My Project</button>
                </div>
            </div>
            <div class="row">
                <?php echo $this->Session->flash(); ?>
                <?php echo $this->fetch('content'); ?>
            </div>
            <div class="row">
                <div class="col-md-5 col-md-offset-3" style="text-align:center;">
                    <p>
                        Created as a University of Nebraska Capstone Project
                    </p>
                    <p>
                        <a style="font-weight:normal !important;" href="https://github.com/FinaL111291" target="_blank">Nicholas Goetzinger</a> |
                        <a style="font-weight:normal !important;" href="https://github.com/JMey94" target="_blank">Joe Meyer</a> |
                        <a style="font-weight:normal !important;" href="https://github.com/nminchow" target="_blank">Noel Minchow</a> |
                        <a style="font-weight:normal !important;" href="https://github.com/zwmcfarland" target="_blank">Zachary McFarland</a>
                    </p>
                    <p>
                        Powered by <?php echo $cakeVersion; ?>
                    </p>
                </div>
            </div>
        </div>
    </body>
</html>
