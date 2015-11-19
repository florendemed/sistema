<?php 
namespace App\Model\Table;

use Cake\ORM\Table;

class AppTable extends Table{
	
	public function beforeFind($event, $query, $options, $primary) {
		if ( in_array('status', $this->schema()->columns()) ) {
			$query->where([$this->alias() . '.status IN' => array('a', 'i')]);
		}
	}
	
	public function beforeSave($event, $entity, $options) {
        if ( ( in_array('created', $this->schema()->columns()) ) && $entity->isNew() == 1 ) {
            if ( !isset($entity->created) )
                $entity->created	= date("Y-m-d H:i:s");
		}
		if ( in_array('modified', $this->schema()->columns()) ) {
            if ( !isset($entity->modified) )
                $entity->modified	= date("Y-m-d H:i:s");
		}
	}
	
	public function initialize(array $config){
        $this->addBehavior('Timestamp');
    }
}
?>