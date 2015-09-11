<?php 
namespace App\Model\Table;

use Cake\ORM\Table;

class AppTable extends Table{
	
	public function beforeFind($event, $query, $options, $primary) {
		if ( $this->hasField('status') ) {
			$query->where(['status IN' => array('a', 'i')]);
		}
	}
	
	public function initialize(array $config){
        $this->addBehavior('Timestamp');
    }
}
?>