<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Thumbnails Model
 *
 * @property \App\Model\Table\ProductsTable&\Cake\ORM\Association\HasMany $Products
 *
 * @method \App\Model\Entity\Thumbnail newEmptyEntity()
 * @method \App\Model\Entity\Thumbnail newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Thumbnail[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Thumbnail get($primaryKey, $options = [])
 * @method \App\Model\Entity\Thumbnail findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Thumbnail patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Thumbnail[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Thumbnail|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Thumbnail saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Thumbnail[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Thumbnail[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Thumbnail[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Thumbnail[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ThumbnailsTable extends Table
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

        $this->setTable('thumbnails');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Products', [
            'foreignKey' => 'thumbnail_id',
        ]);
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
            ->scalar('file_name')
            ->maxLength('file_name', 255)
            ->allowEmptyFile('file_name');

        $validator
            ->scalar('mime_type')
            ->maxLength('mime_type', 50)
            ->allowEmptyString('mime_type');

        $validator
            ->scalar('extension')
            ->maxLength('extension', 20)
            ->allowEmptyString('extension');

        $validator
            ->integer('size')
            ->allowEmptyString('size');

        $validator
            ->scalar('path')
            ->maxLength('path', 255)
            ->allowEmptyString('path');

        $validator
            ->scalar('url')
            ->maxLength('url', 16777215)
            ->allowEmptyString('url');

        return $validator;
    }
}
