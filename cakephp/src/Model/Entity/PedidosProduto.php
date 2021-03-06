<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PedidosProduto Entity
 *
 * @property int $id
 * @property int $pedido_id
 * @property int $produto_id
 *
 * @property \App\Model\Entity\Pedido $pedido
 * @property \App\Model\Entity\Produto $produto
 */
class PedidosProduto extends Entity
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
        'pedido_id' => true,
        'produto_id' => true,
        'pedido' => true,
        'produto' => true,
    ];
}
