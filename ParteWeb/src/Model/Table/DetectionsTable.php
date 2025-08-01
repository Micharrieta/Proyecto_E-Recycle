<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Detections Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\LocationsTable&\Cake\ORM\Association\BelongsTo $Locations
 *
 * @method \App\Model\Entity\Detection newEmptyEntity()
 * @method \App\Model\Entity\Detection newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Detection> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Detection get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Detection findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Detection patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Detection> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Detection|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Detection saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Detection>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Detection>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Detection>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Detection> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Detection>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Detection>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Detection>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Detection> deleteManyOrFail(iterable $entities, array $options = [])
 */
class DetectionsTable extends Table
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

        $this->setTable('detections');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Locations', [
            'foreignKey' => 'location_id',
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
            ->integer('location_id')
            ->notEmptyString('location_id');

        $validator
            ->dateTime('detection_time')
            ->notEmptyDateTime('detection_time');

        $validator
            ->scalar('detected_object')
            ->maxLength('detected_object', 255)
            ->allowEmptyString('detected_object');

        $validator
            ->scalar('name')
            ->maxLength('name', 255)
            ->allowEmptyString('name');

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
        $rules->add($rules->existsIn(['location_id'], 'Locations'), ['errorField' => 'location_id']);

        return $rules;
    }
}
