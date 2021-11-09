<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Pedido Entity
 *
 * @property int $id
 * @property float $preco_pedido
 * @property string $item
 * @property int $cliente_id
 * @property int $produto_id
 * @property int $enderecos_pedido_id
 *
 * @property \App\Model\Entity\Cliente $cliente
 * @property \App\Model\Entity\Produto $produto
 * @property \App\Model\Entity\EnderecosPedido $enderecos_pedido
 */
class Pedido extends Entity
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
        'preco_pedido' => true,
        'item' => true,
        'cliente_id' => true,
        'produto_id' => true,
        'enderecos_pedido_id' => true,
        'cliente' => true,
        'produto' => true,
        'enderecos_pedido' => true,
    ];
}
