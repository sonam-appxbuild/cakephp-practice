<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CorporateClients Model
 *
 * @method \App\Model\Entity\CorporateClient newEmptyEntity()
 * @method \App\Model\Entity\CorporateClient newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\CorporateClient[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CorporateClient get($primaryKey, $options = [])
 * @method \App\Model\Entity\CorporateClient findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\CorporateClient patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CorporateClient[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\CorporateClient|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CorporateClient saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CorporateClient[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\CorporateClient[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\CorporateClient[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\CorporateClient[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CorporateClientsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('corporate_clients');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('name')
            ->maxLength('name', 255)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->scalar('sales')
            ->maxLength('sales', 255)
            ->requirePresence('sales', 'create')
            ->notEmptyString('sales');

        $validator
            ->scalar('purchase')
            ->maxLength('purchase', 255)
            ->requirePresence('purchase', 'create')
            ->notEmptyString('purchase');

        $validator
            ->scalar('cart')
            ->maxLength('cart', 255)
            ->requirePresence('cart', 'create')
            ->notEmptyString('cart');

        $validator
            ->scalar('wishlist')
            ->maxLength('wishlist', 255)
            ->requirePresence('wishlist', 'create')
            ->notEmptyString('wishlist');

        return $validator;
    }
}
