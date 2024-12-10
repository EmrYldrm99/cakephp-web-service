<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Pairs Model
 *
 * @property \App\Model\Table\PlayersTable&\Cake\ORM\Association\BelongsTo $Players
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\Pair newEmptyEntity()
 * @method \App\Model\Entity\Pair newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Pair> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Pair get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Pair findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Pair patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Pair> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Pair|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Pair saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Pair>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Pair>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Pair>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Pair> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Pair>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Pair>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Pair>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Pair> deleteManyOrFail(iterable $entities, array $options = [])
 */
class PairsTable extends Table
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

        $this->setTable('pairs');
        $this->setDisplayField('first_name');
        $this->setPrimaryKey('id');

        $this->belongsTo('Players', [
            'foreignKey' => 'player_id',
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
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
            ->scalar('first_name')
            ->maxLength('first_name', 50)
            ->requirePresence('first_name', 'create')
            ->notEmptyString('first_name');

        $validator
            ->integer('player_id')
            ->allowEmptyString('player_id');

        $validator
            ->integer('user_id')
            ->allowEmptyString('user_id');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn(['player_id'], 'Players'), ['errorField' => 'player_id']);
        $rules->add($rules->existsIn(['user_id'], 'Users'), ['errorField' => 'user_id']);

        return $rules;
    }
}
