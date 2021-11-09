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
</div>
