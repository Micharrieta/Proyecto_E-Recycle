<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * RecyclingCenters Model
 *
 * @method \App\Model\Entity\RecyclingCenter newEmptyEntity()
 * @method \App\Model\Entity\RecyclingCenter newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\RecyclingCenter> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\RecyclingCenter get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\RecyclingCenter findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\RecyclingCenter patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\RecyclingCenter> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\RecyclingCenter|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\RecyclingCenter saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\RecyclingCenter>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\RecyclingCenter>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\RecyclingCenter>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\RecyclingCenter> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\RecyclingCenter>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\RecyclingCenter>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\RecyclingCenter>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\RecyclingCenter> deleteManyOrFail(iterable $entities, array $options = [])
 */
class RecyclingCentersTable extends Table
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

        $this->setTable('recycling_centers');
        $this->setDisplayField('name');
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
            ->scalar('name')
            ->maxLength('name', 100)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->scalar('address')
            ->maxLength('address', 255)
            ->requirePresence('address', 'create')
            ->notEmptyString('address');

        $validator
            ->scalar('horario')
            ->maxLength('horario', 255)
            ->allowEmptyString('horario');

        return $validator;
    }
}
