<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\EnderecosCliente[]|\Cake\Collection\CollectionInterface $enderecosClientes
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Enderecos Cliente'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Clientes'), ['controller' => 'Clientes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Cliente'), ['controller' => 'Clientes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="enderecosClientes index large-9 medium-8 columns content">
    <h3><?= __('Enderecos Clientes') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cliente_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('numero') ?></th>
                <th scope="col"><?= $this->Paginator->sort('rua') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cidade') ?></th>
                <th scope="col"><?= $this->Paginator->sort('estado') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($enderecosClientes as $enderecosCliente): ?>
            <tr>
                <td><?= $this->Number->format($enderecosCliente->id) ?></td>
                <td><?= $enderecosCliente->has('cliente') ? $this->Html->link($enderecosCliente->cliente->nome, ['controller' => 'Clientes', 'action' => 'view', $enderecosCliente->cliente->id]) : '' ?></td>
                <td><?= $this->Number->format($enderecosCliente->numero) ?></td>
                <td><?= h($enderecosCliente->rua) ?></td>
                <td><?= h($enderecosCliente->cidade) ?></td>
                <td><?= h($enderecosCliente->estado) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $enderecosCliente->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $enderecosCliente->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $enderecosCliente->id], ['confirm' => __('Are you sure you want to delete # {0}?', $enderecosCliente->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
