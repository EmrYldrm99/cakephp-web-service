<?php

declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Requests Model
 *
 * @method \App\Model\Entity\Request newEmptyEntity()
 * @method \App\Model\Entity\Request newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Request> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Request get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Request findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Request patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Request> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Request|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Request saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Request>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Request>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Request>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Request> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Request>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Request>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Request>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Request> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class RequestsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array<string, mixed> $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('requests');
        $this->setDisplayField('first_name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
    }


    public function validationPersonal(Validator $validator): Validator
    {
        $validator
            ->scalar('first_name')
            ->maxLength('first_name', 50)
            ->notEmptyString('first_name');

        $validator
            ->scalar('last_name')
            ->maxLength('last_name', 50)
            ->notEmptyString('last_name');

        $validator
            ->date('departure_date')
            ->notEmptyDate('departure_date');

        $validator
            ->time('departure_time')
            ->notEmptyTime('departure_time');

        return $validator;
    }

    public function validationContact(Validator $validator): Validator
    {
        $validator
            ->scalar('mail_address')
            ->maxLength('mail_address', 50)
            ->notEmptyString('mail_address');

        $validator
            ->scalar('phone_number')
            ->maxLength('phone_number', 50)
            ->notEmptyString('phone_number');

        return $validator;
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
            ->scalar('first_name')
            ->maxLength('first_name', 50)
            ->requirePresence('first_name', 'create')
            ->notEmptyString('first_name');

        $validator
            ->scalar('last_name')
            ->maxLength('last_name', 50)
            ->requirePresence('last_name', 'create')
            ->notEmptyString('last_name');

        $validator
            ->scalar('mail_address')
            ->maxLength('mail_address', 50)
            ->requirePresence('mail_address', 'create')
            ->notEmptyString('mail_address');

        $validator
            ->scalar('phone_number')
            ->maxLength('phone_number', 50)
            ->requirePresence('phone_number', 'create')
            ->notEmptyString('phone_number');

        $validator
            ->date('departure_date')
            ->requirePresence('departure_date', 'create')
            ->notEmptyDate('departure_date');

        $validator
            ->time('departure_time')
            ->requirePresence('departure_time', 'create')
            ->notEmptyTime('departure_time');

        return $validator;
    }
}
