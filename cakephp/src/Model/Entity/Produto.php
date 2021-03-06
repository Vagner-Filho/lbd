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
 * @property int $fornecedor_id
 *
 * @property \App\Model\Entity\Categoria $categoria
 * @property \App\Model\Entity\Fornecedor $fornecedor
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
        'fornecedor_id' => true,
        'categoria' => true,
        'fornecedor' => true,
        'pedidos' => true,
    ];
}
