<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Fornecedor $fornecedor
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Fornecedors'), ['action' => 'index']) ?></li>
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
<div class="fornecedors form large-9 medium-8 columns content">
    <?= $this->Form->create($fornecedor) ?>
    <fieldset>
        <legend><?= __('Add Fornecedor') ?></legend>
        <?php
            echo $this->Form->control('cnpj');
            echo $this->Form->control('nome_fornecedor');
            echo $this->Form->control('cep');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
