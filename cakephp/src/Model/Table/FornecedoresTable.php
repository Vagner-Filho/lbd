<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Fornecedores Model
 *
 * @method \App\Model\Entity\Fornecedore get($primaryKey, $options = [])
 * @method \App\Model\Entity\Fornecedore newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Fornecedore[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Fornecedore|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Fornecedore saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Fornecedore patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Fornecedore[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Fornecedore findOrCreate($search, callable $callback = null, $options = [])
 */
class FornecedoresTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('fornecedores');
        $this->setDisplayField('nome_fornecedor');
        $this->setPrimaryKey('id');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('cnpj')
            ->maxLength('cnpj', 200)
            ->requirePresence('cnpj', 'create')
            ->notEmptyString('cnpj')
            ->add('cnpj', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('nome_fornecedor')
            ->maxLength('nome_fornecedor', 200)
            ->requirePresence('nome_fornecedor', 'create')
            ->notEmptyString('nome_fornecedor');

        $validator
            ->scalar('cep')
            ->maxLength('cep', 200)
            ->requirePresence('cep', 'create')
            ->notEmptyString('cep');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['cnpj']));

        return $rules;
    }
}
