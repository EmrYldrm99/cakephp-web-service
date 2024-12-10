<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Platoons Model
 *
 * @property \App\Model\Table\AccountsTable&\Cake\ORM\Association\HasMany $Accounts
 *
 * @method \App\Model\Entity\Platoon newEmptyEntity()
 * @method \App\Model\Entity\Platoon newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Platoon> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Platoon get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Platoon findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Platoon patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Platoon> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Platoon|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Platoon saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Platoon>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Platoon>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Platoon>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Platoon> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Platoon>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Platoon>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Platoon>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Platoon> deleteManyOrFail(iterable $entities, array $options = [])
 */
class PlatoonsTable extends Table
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

        $this->setTable('platoons');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('Accounts', [
            'foreignKey' => 'platoon_id',
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
            ->scalar('name')
            ->maxLength('name', 50)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        return $validator;
    }
}
