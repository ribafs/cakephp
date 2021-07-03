<?php
/**
 * Component Calculo
 * For CakePHP 3.x
 * Autor: Ribamar FS
 *
 * This component allow access control to each action from application with web interface.
 *
 * Licenced with The MIT License
 * Redistributions require keep copyright below.
 *
 * @copyright     Copyright (c) Ribamar FS (http://ribafs.org)
 * @link          http://ribafs.org
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

 
namespace App\Controller\Component;
use Cake\Controller\Component;

class CalculoComponent extends Component{

	private $um;
	private $dois;

	public function soma($um,$dois){
		return ($um + $dois);
	}

	public function subtracao($um,$dois){
		return ($um - $dois);
	}
	
	public function multiplicacao($um,$dois){
		return ($um * $dois);
	}	

	public function divisao($um,$dois){
		return ($um / $dois);
	}
	
}
/*Usando
Salvar na pasta src/Controller/Component

Em um dos actions:
	public $components = array('Calculo');

	$soma = $this->Calculo->soma(2,3);
	$multiplicacao = $this->Calculo->multiplicacao(2,3);
	$this->set('soma',$soma);
	$this->set('multiplicacao',$multiplicacao);

No Template correspondente:
<?php print 'A soma é '.$soma;?>
<?php print '<br>O produto é '.$multiplicacao;?>
*/
