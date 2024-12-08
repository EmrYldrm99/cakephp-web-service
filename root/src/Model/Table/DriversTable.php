<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Drivers Model
 *
 * @method \App\Model\Entity\Driver newEmptyEntity()
 * @method \App\Model\Entity\Driver newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Driver> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Driver get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Driver findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Driver patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Driver> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Driver|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Driver saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Driver>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Driver>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Driver>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Driver> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Driver>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Driver>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Driver>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Driver> deleteManyOrFail(iterable $entities, array $options = [])
 */
class DriversTable extends Table
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

        $this->setTable('drivers');
        $this->setDisplayField('first_name');
        $this->setPrimaryKey('id');
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

        return $validator;
    }
}
