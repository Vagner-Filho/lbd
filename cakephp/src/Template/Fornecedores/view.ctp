<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Fornecedores $fornecedores
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Fornecedores'), ['action' => 'edit', $fornecedores->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Fornecedores'), ['action' => 'delete', $fornecedores->id], ['confirm' => __('Are you sure you want to delete # {0}?', $fornecedores->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Fornecedores'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Fornecedores'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Categorias'), ['controller' => 'Categorias', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Categoria'), ['controller' => 'Categorias', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Produtos'), ['controller' => 'Produtos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Produto'), ['controller' => 'Produtos', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="fornecedores view large-9 medium-8 columns content">
    <h3><?= h($fornecedores->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Cnpj') ?></th>
            <td><?= h($fornecedores->cnpj) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nome Fornecedor') ?></th>
            <td><?= h($fornecedores->nome_fornecedor) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cep') ?></th>
            <td><?= h($fornecedores->cep) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($fornecedores->id) ?></td>
        </tr>
    </table>
</div>
