<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Products Model
 *
 * @property \App\Model\Table\CampaignsTable|\Cake\ORM\Association\BelongsTo $Cats
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Stores
 *
 * @method \App\Model\Entity\Product get($primaryKey, $options = [])
 * @method \App\Model\Entity\Product newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Product[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Product|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Product patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Product[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Product findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CampaignsTable extends Table
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

        $this->setTable('campaigns');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        // $this->belongsTo('Categories', [  
        //     'foreignKey' => 'cat_id',
        //     'joinType' => 'INNER'
        // ]);
      
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);

        $this->belongsTo('Deals', [
            'foreignKey' => 'deal_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Organisations', [
            'foreignKey' => 'org_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Perks', [
            'foreignKey' => 'perks',
            'joinType' => 'INNER'
        ]);

        
        $this->hasMany('Campaigncategories', [
            'foreignKey' => 'camp_id'
        ]);

        $this->hasMany('Invests', [
            'foreignKey' => 'camp_id'
        ]);

        $this->hasMany('Updates', [
            'foreignKey' => 'camp_id'
        ]);

        $this->hasMany('Faqs', [
            'foreignKey' => 'camp_id'
        ]);
        

    } 

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        // $validator
        //     ->integer('id')
        //     ->allowEmpty('id', 'create');

        // $validator
        //     ->allowEmpty('slug');

        // $validator
        //     ->allowEmpty('name');

        // $validator
        //     ->allowEmpty('image');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        // $rules->add($rules->existsIn(['cat_id'], 'Categories'));
        // $rules->add($rules->existsIn(['org_id'], 'Stores'));

        return $rules;  
    }
}
