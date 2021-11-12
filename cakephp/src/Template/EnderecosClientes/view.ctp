<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\EnderecosCliente $enderecosCliente
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <!--<li> $this->Html->link(__('Edit Enderecos Cliente'), ['action' => 'edit', $enderecosCliente->id]) ?> </li>-->
        <!--<li> $this->Form->postLink(__('Delete Enderecos Cliente'), ['action' => 'delete', $enderecosCliente->id], ['confirm' => __('Are you sure you want to delete # {0}?', $enderecosCliente->id)]) ?> </li>-->
        <li><?= $this->Html->link(__('List Enderecos Clientes'), ['action' => 'index']) ?> </li>
        <!--<li> $this->Html->link(__('New Enderecos Cliente'), ['action' => 'add']) ?> </li>-->
        <li><?= $this->Html->link(__('List Clientes'), ['controller' => 'Clientes', 'action' => 'index']) ?> </li>
        <!--<li><?php// $this->Html->link(__('New Cliente'), ['controller' => 'Clientes', 'action' => 'add']) ?> </li>-->
        </ul>
</nav>
<div class="enderecosClientes view large-9 medium-8 columns content">
    <h3><?= h($enderecosCliente->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Cliente') ?></th>
            <td><?= $enderecosCliente->has('cliente') ? $this->Html->link($enderecosCliente->cliente->cpf, ['controller' => 'Clientes', 'action' => 'view', $enderecosCliente->cliente->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Rua') ?></th>
            <td><?= h($enderecosCliente->rua) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cidade') ?></th>
            <td><?= h($enderecosCliente->cidade) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Estado') ?></th>
            <td><?= h($enderecosCliente->estado) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($enderecosCliente->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Numero') ?></th>
            <td><?= $this->Number->format($enderecosCliente->numero) ?></td>
        </tr>
    </table>
</div>
