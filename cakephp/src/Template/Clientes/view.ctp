<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cliente $cliente
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Cliente'), ['action' => 'edit', $cliente->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Cliente'), ['action' => 'delete', $cliente->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cliente->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Clientes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cliente'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Enderecos Clientes'), ['controller' => 'EnderecosClientes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Enderecos Cliente'), ['controller' => 'EnderecosClientes', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="clientes view large-9 medium-8 columns content">
    <h3><?= h($cliente->nome) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Cpf') ?></th>
            <td><?= h($cliente->cpf) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nome') ?></th>
            <td><?= h($cliente->nome) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($cliente->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Senha') ?></th>
            <td><?= h($cliente->senha) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($cliente->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Enderecos Clientes') ?></h4>
        <?php if (!empty($cliente->enderecos_clientes)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Cliente Id') ?></th>
                <th scope="col"><?= __('Numero') ?></th>
                <th scope="col"><?= __('Rua') ?></th>
                <th scope="col"><?= __('Cidade') ?></th>
                <th scope="col"><?= __('Estado') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($cliente->enderecos_clientes as $enderecosClientes): ?>
            <tr>
                <td><?= h($enderecosClientes->id) ?></td>
                <td><?= h($enderecosClientes->cliente_id) ?></td>
                <td><?= h($enderecosClientes->numero) ?></td>
                <td><?= h($enderecosClientes->rua) ?></td>
                <td><?= h($enderecosClientes->cidade) ?></td>
                <td><?= h($enderecosClientes->estado) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'EnderecosClientes', 'action' => 'view', $enderecosClientes->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'EnderecosClientes', 'action' => 'edit', $enderecosClientes->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'EnderecosClientes', 'action' => 'delete', $enderecosClientes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $enderecosClientes->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
