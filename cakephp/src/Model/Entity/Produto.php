<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Produto Entity
 *
 * @property int $id
 * @property string $nome
 * @property float $preco_produto
 * @property int $categoria_id
 * @property int $fornecedore_id
 *
 * @property \App\Model\Entity\Categoria $categoria
 * @property \App\Model\Entity\Fornecedore $fornecedore
 * @property \App\Model\Entity\Pedido[] $pedidos
 */
class Produto extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'nome' => true,
        'preco_produto' => true,
        'categoria_id' => true,
        'fornecedore_id' => true,
        'categoria' => true,
        'fornecedore' => true,
        'pedidos' => true,
    ];
}
