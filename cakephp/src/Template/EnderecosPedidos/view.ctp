<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\EnderecosPedido $enderecosPedido
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Enderecos Pedido'), ['action' => 'edit', $enderecosPedido->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Enderecos Pedido'), ['action' => 'delete', $enderecosPedido->id], ['confirm' => __('Are you sure you want to delete # {0}?', $enderecosPedido->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Enderecos Pedidos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Enderecos Pedido'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pedidos'), ['controller' => 'Pedidos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pedido'), ['controller' => 'Pedidos', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="enderecosPedidos view large-9 medium-8 columns content">
    <h3><?= h($enderecosPedido->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Rua') ?></th>
            <td><?= h($enderecosPedido->rua) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cidade') ?></th>
            <td><?= h($enderecosPedido->cidade) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Estado') ?></th>
            <td><?= h($enderecosPedido->estado) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($enderecosPedido->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Numero') ?></th>
            <td><?= $this->Number->format($enderecosPedido->numero) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Pedidos') ?></h4>
        <?php if (!empty($enderecosPedido->pedidos)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Preco Pedido') ?></th>
                <th scope="col"><?= __('Cliente Id') ?></th>
                <th scope="col"><?= __('Enderecos Pedido Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($enderecosPedido->pedidos as $pedidos): ?>
            <tr>
                <td><?= h($pedidos->id) ?></td>
                <td><?= h($pedidos->preco_pedido) ?></td>
                <td><?= h($pedidos->cliente_id) ?></td>
                <td><?= h($pedidos->enderecos_pedido_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Pedidos', 'action' => 'view', $pedidos->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Pedidos', 'action' => 'edit', $pedidos->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Pedidos', 'action' => 'delete', $pedidos->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pedidos->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
