<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Fornecedor[]|\Cake\Collection\CollectionInterface $fornecedors
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Fornecedor'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Categorias'), ['controller' => 'Categorias', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Categoria'), ['controller' => 'Categorias', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Produtos'), ['controller' => 'Produtos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Produto'), ['controller' => 'Produtos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pedidos'), ['controller' => 'Pedidos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Pedidos Produtos'), ['controller' => 'PedidosProdutos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Enderecos Pedidos'), ['controller' => 'EnderecosPedidos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('List Clientes'), ['controller' => 'Clientes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('List Enderecos Clientes'), ['controller' => 'EnderecosClientes', 'action' => 'index']) ?></li>
    </ul>
</nav>
<div class="fornecedors index large-9 medium-8 columns content">
    <h3><?= __('Fornecedors') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cnpj') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nome_fornecedor') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cep') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($fornecedors as $fornecedor): ?>
            <tr>
                <td><?= $this->Number->format($fornecedor->id) ?></td>
                <td><?= h($fornecedor->cnpj) ?></td>
                <td><?= h($fornecedor->nome_fornecedor) ?></td>
                <td><?= h($fornecedor->cep) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $fornecedor->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $fornecedor->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $fornecedor->id], ['confirm' => __('Are you sure you want to delete # {0}?', $fornecedor->id)]) ?>
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
