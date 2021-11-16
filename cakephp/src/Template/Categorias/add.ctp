<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Categoria $categoria
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Categorias'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Fornecedors'), ['controller' => 'Fornecedors', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Fornecedor'), ['controller' => 'Fornecedors', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pedidos'), ['controller' => 'Pedidos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Produtos'), ['controller' => 'Produtos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Produto'), ['controller' => 'Produtos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pedidos Produtos'), ['controller' => 'PedidosProdutos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Enderecos Pedidos'), ['controller' => 'EnderecosPedidos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('List Clientes'), ['controller' => 'Clientes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('List Enderecos Clientes'), ['controller' => 'EnderecosClientes', 'action' => 'index']) ?></li>
    </ul>
</nav>
<div class="categorias form large-9 medium-8 columns content">
    <?= $this->Form->create($categoria) ?>
    <fieldset>
        <legend><?= __('Add Categoria') ?></legend>
        <?php
            echo $this->Form->control('nome_categoria');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
