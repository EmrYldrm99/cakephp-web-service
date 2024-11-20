<?php

declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @method \App\Model\Entity\User newEmptyEntity()
 * @method \App\Model\Entity\User newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\User> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\User findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\User> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\User|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\User saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\User>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\User>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\User>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\User> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\User>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\User>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\User>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\User> deleteManyOrFail(iterable $entities, array $options = [])
 */
class UsersTable extends Table
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

        $this->setTable('users');
        $this->setDisplayField('fname');
        $this->setPrimaryKey('id');

        // Define 'hasOne' association with 'Contact' table
        $this->hasOne('Contact', [
            'foreignKey' => 'user_id', // Adjust to the correct foreign key column in Contact
        ]);
    }

    public function test()
    {
        debug('hello');
    }

    public function getUsersWithContact()
    {
        return $this->find()
            ->contain(['Contact'])  // Include associated Contact data
            ->enableHydration(false) // Disable hydration to get a plain array
            ->toArray();             // Convert the result to an array
    }

    public function validationTest(Validator $validator): Validator
    {
        //debug("validationTest called!");

        $validator
            ->scalar('fname')
            ->maxLength('fname', 8)
            ->notEmptyString('fname');

        $validator
            ->scalar('lname')
            ->maxLength('lname', 8)
            ->notEmptyString('lname');

        return $validator;
    }

    public function validationLol(Validator $validator): Validator
    {
        debug("validationLol called!");

        $validator
            ->scalar('age')
            ->maxLength('age', 3)
            ->notEmptyString('age');

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
            ->scalar('fname')
            ->maxLength('fname', 255)
            ->notEmptyString('fname');

        $validator
            ->scalar('lname')
            ->maxLength('lname', 255)
            ->notEmptyString('lname');

        $validator
            ->integer('age')
            ->notEmptyString('age');

        return $validator;
    }
}
