<?php
namespace Akshay\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AnalyticsReports Model
 *
 * @method \Akshay\Model\Entity\AnalyticsReport get($primaryKey, $options = [])
 * @method \Akshay\Model\Entity\AnalyticsReport newEntity($data = null, array $options = [])
 * @method \Akshay\Model\Entity\AnalyticsReport[] newEntities(array $data, array $options = [])
 * @method \Akshay\Model\Entity\AnalyticsReport|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Akshay\Model\Entity\AnalyticsReport patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \Akshay\Model\Entity\AnalyticsReport[] patchEntities($entities, array $data, array $options = [])
 * @method \Akshay\Model\Entity\AnalyticsReport findOrCreate($search, callable $callback = null)
 */
class AnalyticsReportsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);
	
        $this->table('analytics_reports');
        $this->displayField('id');
        $this->primaryKey('id');
		$this->addBehavior('Timestamp');		

    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('load_time', 'create')
            ->notEmpty('load_time');

        $validator
            ->requirePresence('curr_url', 'create')
            ->notEmpty('curr_url');

        $validator
            ->requirePresence('page_title', 'create')
            ->notEmpty('page_title');

        $validator
            ->requirePresence('height', 'create')
            ->notEmpty('height');

        $validator
            ->requirePresence('width', 'create')
            ->notEmpty('width');

        $validator
            ->requirePresence('location', 'create')
            ->notEmpty('location');

        return $validator;
    }
}
