<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Contact Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\Contact newEmptyEntity()
 * @method \App\Model\Entity\Contact newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Contact> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Contact get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Contact findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Contact patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Contact> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Contact|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Contact saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Contact>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Contact>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Contact>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Contact> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Contact>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Contact>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Contact>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Contact> deleteManyOrFail(iterable $entities, array $options = [])
 */
class ContactTable extends Table
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

        $this->setTable('contact');
        $this->setDisplayField('mail');
        $this->setPrimaryKey('id');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
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
            ->integer('user_id')
            ->notEmptyString('user_id');

        $validator
            ->scalar('mail')
            ->maxLength('mail', 64)
            ->notEmptyString('mail');

        $validator
            ->scalar('phone')
            ->maxLength('phone', 64)
            ->notEmptyString('phone');

        $validator
            ->scalar('city')
            ->maxLength('city', 64)
            ->notEmptyString('city');

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
        $rules->add($rules->existsIn(['user_id'], 'Users'), ['errorField' => 'user_id']);

        return $rules;
    }
}
