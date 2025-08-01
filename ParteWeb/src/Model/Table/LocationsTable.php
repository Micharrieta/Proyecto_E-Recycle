<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Locations Model
 *
 * @property \App\Model\Table\DetectionsTable&\Cake\ORM\Association\HasMany $Detections
 *
 * @method \App\Model\Entity\Location newEmptyEntity()
 * @method \App\Model\Entity\Location newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Location> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Location get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Location findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Location patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Location> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Location|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Location saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Location>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Location>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Location>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Location> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Location>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Location>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Location>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Location> deleteManyOrFail(iterable $entities, array $options = [])
 */
class LocationsTable extends Table
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

        $this->setTable('locations');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('Detections', [
            'foreignKey' => 'location_id',
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
            ->maxLength('name', 100)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        return $validator;
    }
}
