<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Fornecedor $fornecedor
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Fornecedor'), ['action' => 'edit', $fornecedor->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Fornecedor'), ['action' => 'delete', $fornecedor->id], ['confirm' => __('Are you sure you want to delete # {0}?', $fornecedor->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Fornecedors'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Fornecedor'), ['action' => 'add']) ?> </li>
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
<div class="fornecedors view large-9 medium-8 columns content">
    <h3><?= h($fornecedor->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Cnpj') ?></th>
            <td><?= h($fornecedor->cnpj) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nome Fornecedor') ?></th>
            <td><?= h($fornecedor->nome_fornecedor) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cep') ?></th>
            <td><?= h($fornecedor->cep) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($fornecedor->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Produtos') ?></h4>
        <?php if (!empty($fornecedor->produtos)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Nome') ?></th>
                <th scope="col"><?= __('Preco Produto') ?></th>
                <th scope="col"><?= __('Categoria Id') ?></th>
                <th scope="col"><?= __('Fornecedor Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($fornecedor->produtos as $produtos): ?>
            <tr>
                <td><?= h($produtos->id) ?></td>
                <td><?= h($produtos->nome) ?></td>
                <td><?= h($produtos->preco_produto) ?></td>
                <td><?= h($produtos->categoria_id) ?></td>
                <td><?= h($produtos->fornecedor_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Produtos', 'action' => 'view', $produtos->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Produtos', 'action' => 'edit', $produtos->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Produtos', 'action' => 'delete', $produtos->id], ['confirm' => __('Are you sure you want to delete # {0}?', $produtos->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
