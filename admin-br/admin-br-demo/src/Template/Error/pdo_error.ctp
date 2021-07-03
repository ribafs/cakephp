<?php
/**
 * src/Templates/Error/pdo_error.ctp
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
use Cake\Utility\Debugger;
?>
<h2>Plugin admin-br para CakePHP 3</h2>
<p class="error">
	<strong>Demo do plugin<br></strong>

	<?php
        if($error->getCode() == 42000){
            print "Somente select é aceito<br>";
            print '<a href="http://backup/admin-br-demo/customers">Voltar</a>';
        }

        //print $message; 
    ?>
</p>
