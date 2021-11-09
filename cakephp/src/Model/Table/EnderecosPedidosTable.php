<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * EnderecosPedidos Model
 *
 * @property \App\Model\Table\PedidosTable&\Cake\ORM\Association\HasMany $Pedidos
 *
 * @method \App\Model\Entity\EnderecosPedido get($primaryKey, $options = [])
 * @method \App\Model\Entity\EnderecosPedido newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\EnderecosPedido[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\EnderecosPedido|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\EnderecosPedido saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\EnderecosPedido patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\EnderecosPedido[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\EnderecosPedido findOrCreate($search, callable $callback = null, $options = [])
 */
class EnderecosPedidosTable extends Table
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

        $this->setTable('enderecos_pedidos');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('Pedidos', [
            'foreignKey' => 'enderecos_pedido_id',
        ]);
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
            ->integer('numero')
            ->requirePresence('numero', 'create')
            ->notEmptyString('numero');

        $validator
            ->scalar('rua')
            ->maxLength('rua', 200)
            ->requirePresence('rua', 'create')
            ->notEmptyString('rua');

        $validator
            ->scalar('cidade')
            ->maxLength('cidade', 200)
            ->requirePresence('cidade', 'create')
            ->notEmptyString('cidade');

        $validator
            ->scalar('estado')
            ->maxLength('estado', 200)
            ->requirePresence('estado', 'create')
            ->notEmptyString('estado');

        return $validator;
    }
}
