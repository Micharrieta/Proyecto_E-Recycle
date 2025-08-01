<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Tips Model
 *
 * @method \App\Model\Entity\Tip newEmptyEntity()
 * @method \App\Model\Entity\Tip newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Tip> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Tip get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Tip findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Tip patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Tip> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Tip|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Tip saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Tip>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Tip>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Tip>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Tip> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Tip>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Tip>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Tip>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Tip> deleteManyOrFail(iterable $entities, array $options = [])
 */
class TipsTable extends Table
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

        $this->setTable('tips');
        $this->setDisplayField('id');
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
            ->scalar('tip')
            ->requirePresence('tip', 'create')
            ->notEmptyString('tip');

        $validator
            ->scalar('objeto')
            ->maxLength('objeto', 255)
            ->allowEmptyString('objeto');

        return $validator;
    }
}
