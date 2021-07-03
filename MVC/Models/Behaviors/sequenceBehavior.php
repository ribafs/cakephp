<?php
/**
 * 
 *  Esta classe é um software livre; você pode redistribui-lo e/ou 
 *  modifica-lo dentro dos termos da Licença Pública Geral GNU Menor (LGPL) como 
 *  publicada pela Fundação do Software Livre (FSF); na versão 3 da 
 *  Licença, ou (na sua opnião) qualquer versão. 
 *
 *  Este programa é distribuido na esperança que possa ser  util, 
 *  mas SEM NENHUMA GARANTIA; sem uma garantia implicita de ADEQUAÇÂO a qualquer
 *  MERCADO ou APLICAÇÃO EM PARTICULAR. Veja a
 *  Licença Pública Geral GNU menor para maiores detalhes.
 *  Você deve ter recebido uma cópia da Licença Pública Geral GNU Menor
 *  junto com este programa, se não, escreva para a Fundação do Software
 *  Livre(FSF) Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 * 
 * 
 * Behavior para manutencao de numeros sequenciais 
 * tanto para incluir editar e apagar, Mantendo uma sequencia initerrupta dos valores
 * CakePHP >= 1.3
 * 
 * @author Otavio Augusto
 * @since 06/2013
 * @license LGPLv3
 * @copyright Otavio Augusto <otavioti at gmail dot com>
 * @version 0.1.1
 */
class SequenceBehavior extends ModelBehavior {
    
    
    /**
     * Armazena as configuracoes
     * 
     * field_order  => Campo de numero inteiro que armazenará a ordem. Nao pode ser a chave primaria
     * 
     * field_group  => Campo que contem um nome ou id que agrupa os registros 
     * (podendo armazenar uma seguencia separada para cada grupo) , se falso nao usa.
     * 
     * first_number => Primeiro numero da sequencia.
     * 
     * max_number   => Numero máximo permitido no grupo ou tabela. Se menor ou igual a first_number é iguinorado, se 
     * o valor máximo foi atingido não permitirá que seja adicionado nenhum registro no grupo ou tabela.
     *
     * step         => Passo que será incrementado em novos registros, default 1  
     * 
     * @var array
     */
    var $config=array('field_order'=>'sequence','field_group'=>false,'first_number'=>0,'max_number'=>0,'step'=>1);

    /**
     * Model 
     * @var AppModel
     */
    var $model=null;
    
    /**
     * Registro antigo que foi apagado. Será usado na ordenaçao depois de removido
     * @var unknown_type
     */
    var $old_data=array();
    
    /**
     * OrderBehavior::setup()
     *
     * @param mixed $Model
     * @param mixed $config
     * @return void
     */
    function setup($Model, $config = array()) {
        parent::setup($Model,$config);
        $this->model=$Model;
        $this->setConfig($config);
    }
    
    /**
     * Seta as configuracoes
     * @param array $config
     */
    function setConfig($config) {
       foreach($config as $k=>$c ) {
           $this->config[$k]=$c;
       }
       
       //Disabilita caso o campo de sequencia seja igual a chave primaria
       if($this->config['field_order']==$this->model->primaryKey) { 
           $this->model->Behaviors->detach('Sequence');
       }
      
    }
    
    function beforeSave(AppModel $Model){
        //Detecta loop na alteracao de registros no evento ondelete
        if(isset($Model->data[$Model->alias]["__ondelete_sequence_tuple"])) {
            return true;
        }
        
        //Detecta loop na alteracao de registros no evento onupdate
        if(isset($Model->data[$Model->alias]["__onupdate_sequence_tuple"])) {
            return true;
        }
        
        //Detecta loop na alteracao de registros no evento oninsert
        if(isset($Model->data[$Model->alias]["__oninsert_sequence_tuple"])) {
            return true;
        }
        
        //cria conditions 
        $conditions=array();
        
        if($this->config['field_group'] !== false and isset($Model->data[$Model->alias][$this->config['field_group']])) {
            $conditions[$Model->alias.".".$this->config['field_group']] =
                         $Model->data[$Model->alias][$this->config['field_group']];
        }
        
        
        
        //Registro Novo sem ordem escolhida
        if(!isset($Model->data[$Model->alias][$Model->primaryKey]) and 
                !isset($Model->data[$Model->alias][$this->config['field_order']])){
            
            return $this->__insereNoFim($Model,$conditions);
            
        }//FIM - Registro Novo sem ordem escolhida

        
        
        //Registro Novo com ordem escolhida
        if(!isset($Model->data[$Model->alias][$Model->primaryKey]) and
                isset($Model->data[$Model->alias][$this->config['field_order']])){
            
            $conditions_order=$conditions;
            $conditions_order[$Model->alias.".".$this->config['field_order']] = 
                                 $Model->data[$Model->alias][$this->config['field_order']];
                
            $order=$Model->find('first',array('conditions'=>$conditions_order));
            
            //Caso nao exista a ordem encaixa no final
            if(empty($order)) {
                return $this->__insereNoFim($Model,$conditions);
            }
            $this->__reOrdenaInsert($Model, $Model->data[$Model->alias][$this->config['field_order']]);
            
            return true;
        }//FIM - Registro Novo com ordem escolhida
        
        //Atualiza registro que nao vai mudar de ordem
        if(isset($Model->data[$Model->alias][$Model->primaryKey]) and
                !isset($Model->data[$Model->alias][$this->config['field_order']])){

            //apenas retorna true pois nao é preciso fazer nada
            return true;
        
        }//FIM - Atualiza registro que nao vai mudar de ordem

        //Atualiza registro que VAI mudar de ordem
        if(isset($Model->data[$Model->alias][$Model->primaryKey]) and
                isset($Model->data[$Model->alias][$this->config['field_order']])){
            
            //Insere no inicio da lista caso o valor de field_order seja inicio
            if(strtolower($Model->data[$Model->alias][$this->config['field_order']])=="inicio") {
                $Model->data[$Model->alias][$this->config['field_order']]= $this->config['first_number'];
            } 
            //Insere no final da lista caso o valor de field_order seja inicio
            elseif(strtolower($Model->data[$Model->alias][$this->config['field_order']])=="fim") {
                $dados = $Model->find('first',
                        array('fields'=>
                                array($Model->alias.".".$Model->primaryKey,
                                        $Model->alias.".".$this->config['field_order'],
                                ),
                                'conditions'=>$conditions,
                                'order'=>$Model->alias.".".$this->config['field_order'].' DESC',
                                'recursive'=>-1,
                        )
                );
                if(!empty($dados)) {
                    
                    
                    if($this->config['max_number'] > $this->config['first_number']  ) {
                        if($dados[$Model->alias][$this->config['field_order']] < $this->config['max_number']) {
                            $Model->data[$Model->alias][$this->config['field_order']] =
                                $dados[$Model->alias][$this->config['field_order']];
                        } else {
                            $Model->data[$Model->alias][$this->config['field_order']] = $this->config['max_number'];
                        }
                    }  else {
                        $Model->data[$Model->alias][$this->config['field_order']] =
                            $dados[$Model->alias][$this->config['field_order']];
                    }
                    
                } else {
                    $Model->data[$Model->alias][$this->config['field_order']] = $this->config['first_number'];
                }
                                                
            }
            $old=$Model->findById($Model->data[$Model->alias][$Model->primaryKey]);

            $this->__reOrdenaUpdate($Model, 
                                    $old[$Model->alias][$this->config['field_order']], 
                                    $Model->data[$Model->alias][$this->config['field_order']]);
            
            
            return true;
        
        }//FIM - Atualiza registro que VAI mudar de ordem
        
        
        
        
        
        return true;
    }
    
    function beforeDelete(AppModel $Model,$cascade) {
        //guarda o registro anteiror
        $this->old_data=$Model->findById($Model->id);
        return true;
    }
    
    function afterDelete(AppModel $Model) {
        //cria conditions
        $conditions=array();
        if(isset($this->old_data[$Model->alias]["__ondelete_sequence_tuple"])) {
            return true;
        }
        //Se for o ultimo da fila nao faz nada
        if($this->config['max_number']>0) {
            if($this->old_data[$Model->alias][$this->config['field_order']] >= $this->config['max_number']) {
                return true;
            }
        }
        
        
        $this->__reOrdenaDelete($Model, $this->old_data[$Model->alias][$this->config['field_order']]);
        
        
       
    }
    
    /**
     * Retorna uma array com a sequencia completa sendo a chave e valor iguais. 
     * para ser usado em um combobox, retorna tambem as palavras chaves inicio e fim 
     * que podem ser usadas para deslocar o registro para o inicio ou fim da sequencia
     * 
     * @author Otavio Augusto
     */
    function getSequenceList(AppModel $Model, $group=false){
        //cria conditions
        $conditions=array();
        
        if($group !== false and $this->config['field_group'] !== false) {
            $conditions[$Model->alias.".".$this->config['field_group']] = $group;
        }
        
        $dados = $Model->find('all',
                array('fields'=>
                        array($Model->alias.".".$Model->primaryKey,
                                $Model->alias.".".$this->config['field_order'],
                        ),
                        'conditions'=>$conditions,
                        'order'=>$Model->alias.".".$this->config['field_order'].' ASC',
                        'recursive'=>-1,
        
                )
        );
        
        $ret=array();
        $ret['inicio']="INICIO";
        foreach($dados as $d) {
            $ret[$d[$Model->alias][$this->config['field_order']]] = $d[$Model->alias][$this->config['field_order']];
        }
        $ret['fim']="FIM";
        return $ret;
        
        
        
    }
    
    /**
     * Re ordena todos os registros.
     * util para quando sequence é implantado depois da tabela ja povoada.
     * usa a primary key como referencia.
     * @param AppModel $Model
     * @param mixed $group
     */
    function reOrdenaAll(AppModel $Model, $group=false) {
        //cria conditions
        $conditions=array();
        
        if($group !== false and $this->config['field_group'] !== false) {
            $conditions[$Model->alias.".".$this->config['field_group']] = $group;
        }
        
        $dados = $Model->find('all',
                array('fields'=>
                        array($Model->alias.".".$Model->primaryKey,
                                $Model->alias.".".$this->config['field_order'],
                        ),
                        'conditions'=>$conditions,
                        'order'=>$Model->alias.".".$Model->primaryKey.' ASC',
                        'recursive'=>-1,
        
                )
        );
        $saveModel = new $Model->alias;
        
        $i=$this->config['first_number'];
        
        foreach($dados as $k=>$val) {
            $val[$Model->alias][$this->config['field_order']] = $i;
            $i = $i + $this->config['step'];
            $saveModel->create();
            $saveModel->Behaviors->detach('Sequence');
            $val[$Model->alias]["__onupdate_sequence_tuple"]=true;
            $saveModel->save($val);
        }
        
        
    }
    
    
    /**
     * Reordena os registros para usar a nova ordem
     * @param AppModel $Model
     * @param int $old_order
     * @param int $new_order
     */
    function __reOrdenaUpdate(AppModel $Model, $old_order, $new_order) {
       
        //Se nao houver mudanca na ordem retorna true
        if($new_order == $old_order) return true;

        //cria conditions
        $conditions=array();
        
        if($this->config['field_group'] !== false) {
            $conditions[$Model->alias.".".$this->config['field_group']] =
               $Model->data[$Model->alias][$this->config['field_group']];
        }
        
        
        //se estiver se deslocando para cima
        if($new_order < $old_order) {
            //debug("cima");
            $conditions['AND']=array($Model->alias.".".$this->config['field_order']." >="=>$new_order,
                                    $Model->alias.".".$this->config['field_order']." <"=>$old_order);
            
            $dados = $Model->find('all',
                    array('fields'=>
                            array($Model->alias.".".$Model->primaryKey,
                                    $Model->alias.".".$this->config['field_order'],
                            ),
                            'conditions'=>$conditions,
                            'recursive'=>-1,
            
                    )
            );

            /*$dbo = $Model->getDatasource();
            $logs = $dbo->_queriesLog;
            
            debug(end($logs));
            */
            $saveModel = new $Model->alias;
            
            foreach($dados as $k=>$val) {
                $val[$Model->alias][$this->config['field_order']] =
                      $dados[$k][$Model->alias][$this->config['field_order']] + $this->config['step'];
                $saveModel->create();
                $saveModel->Behaviors->detach('Sequence');
                $val[$Model->alias]["__onupdate_sequence_tuple"]=true;
                $saveModel->save($val);
            }
        }//FIM -//se estiver se deslocando para cima

        //Se estiver se deslocando para baixo
        if($new_order > $old_order) {
            $conditions['AND']=array($Model->alias.".".$this->config['field_order']." >"=>$old_order,
                                    $Model->alias.".".$this->config['field_order']." <="=>$new_order);
            
            $dados = $Model->find('all',
                    array('fields'=>
                            array($Model->alias.".".$Model->primaryKey,
                                    $Model->alias.".".$this->config['field_order'],
                            ),
                            'conditions'=>$conditions,
                            'recursive'=>-1,
            
                    )
            );
            
            $saveModel = new $Model->alias;
            
            foreach($dados as $k=>$val) {
                $val[$Model->alias][$this->config['field_order']] =
                         $dados[$k][$Model->alias][$this->config['field_order']] - $this->config['step'];
                $saveModel->create();
                $saveModel->Behaviors->detach('Sequence');
                $val[$Model->alias]["__onupdate_sequence_tuple"]=true;
                $saveModel->save($val);
            }
        }//FIM -//se estiver se deslocando para baixo
    }
    
    
    
    /**
     * Reordena os registros para abrir espaço para um novo.
     * 
     * @param AppModel $Model
     * @param int $order
     */
    function __reOrdenaInsert(AppModel $Model, $order) {
        //cria conditions
        $conditions=array();
        
        if($this->config['field_group'] !== false) {
            $conditions[$Model->alias.".".$this->config['field_group']] =
               $Model->data[$Model->alias][$this->config['field_group']];
        }
        
        $conditions[$Model->alias.".".$this->config['field_order']." >="]=$order;
        $dados = $Model->find('all',
                array('fields'=>
                        array($Model->alias.".".$Model->primaryKey,
                                $Model->alias.".".$this->config['field_order'],
                        ),
                        'conditions'=>$conditions,
                        'recursive'=>-1,
                        
                )
        );
        $saveModel = new $Model->alias;
        
        foreach($dados as $k=>$val) {
            $val[$Model->alias][$this->config['field_order']] = 
                        $dados[$k][$Model->alias][$this->config['field_order']] + $this->config['step'];
            $saveModel->create();
            $saveModel->Behaviors->detach('Sequence');
            $val[$Model->alias]["__oninsert_sequence_tuple"]=true;
            $saveModel->save($val);
        }
        
    }
    /**
     * Reordena os registros para cobrir espaço vazio.
     * 
     * @param AppModel $Model
     * @param int $order
     */
    function __reOrdenaDelete(AppModel $Model, $order) {
        //cria conditions
        $conditions=array();
        
        if($this->config['field_group'] !== false) {
            $conditions[$Model->alias.".".$this->config['field_group']] =
               $this->old_data[$Model->alias][$this->config['field_group']];
        }
        
        $conditions[$Model->alias.".".$this->config['field_order']." >="]=$order;
        $dados = $Model->find('all',
                array('fields'=>
                        array($Model->alias.".".$Model->primaryKey,
                                $Model->alias.".".$this->config['field_order'],
                        ),
                        'conditions'=>$conditions,
                        'recursive'=>-1,
                        
                )
        );
        $saveModel = new $Model->alias;
        
        foreach($dados as $k=>$val) {
            $val[$Model->alias][$this->config['field_order']] = 
                        $dados[$k][$Model->alias][$this->config['field_order']] - $this->config['step'];
            
            $val[$Model->alias]["__ondelete_sequence_tuple"]=true;
            $saveModel->create();
            $saveModel->Behaviors->detach('Sequence');
            $saveModel->save($val);
        }
        
    }
    
    /**
     * Insere no fim da fila
     * @param AppModel $Model
     */
    function __insereNoFim(AppModel $Model,$conditions=array()){
        $dados = $Model->find('first',
                array('fields'=>
                        array($Model->alias.".".$Model->primaryKey,
                                $Model->alias.".".$this->config['field_order'],
                        ),
                        'conditions'=>$conditions,
                        'order'=>$Model->alias.".".$this->config['field_order'].' DESC',
                        'recursive'=>-1,
                )
        );
        
        //Se for o primeiro registro inserido no grupo/tabela entra com o numero minimo
        if(empty($dados)) {
            
            $Model->data[$Model->alias][$this->config['field_order']]=$this->config['first_number'];
            return true;
        }
        
        if($this->config['max_number'] > $this->config['first_number']) {
        
            //Se  o campo order ja atingiu o máximo bloqueia a entrada do registro.
            if($dados[$Model->alias][$this->config['field_order']] >= $this->config['max_number']) {
                return false;
            }
        }
        
        
        //Se tudo ok incrementa field_order com valor de step
        $Model->data[$Model->alias][$this->config['field_order']] =
             $dados[$Model->alias][$this->config['field_order']] + $this->config['step'];

        return true;
        
    }
    
}


?>