<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PedidosProduto $pedidosProduto
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Pedidos Produtos'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Pedidos'), ['controller' => 'Pedidos', 'action' => 'index']) ?></li>
         <!--<li><?php// $this->Html->link(__('New Pedido'), ['controller' => 'Pedidos', 'action' => 'add']) ?></li>-->
         <li><?= $this->Html->link(__('List Enderecos Pedidos'), ['controller' => 'EnderecosPedidos', 'action' => 'index']) ?> </li>
         <li><?= $this->Html->link(__('List Produtos'), ['controller' => 'Produtos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Produto'), ['controller' => 'Produtos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Categorias'), ['controller' => 'Categorias', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Categoria'), ['controller' => 'Categorias', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Fornecedors'), ['controller' => 'Fornecedors', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Fornecedor'), ['controller' => 'Fornecedors', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Clientes'), ['controller' => 'Clientes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('List Enderecos Clientes'), ['controller' => 'EnderecosClientes', 'action' => 'index']) ?></li>
    </ul>
</nav>
<div class="pedidosProdutos form large-9 medium-8 columns content">
    <?= $this->Form->create($pedidosProduto) ?>
    <fieldset>
        <legend><?= __('Add Pedidos Produto') ?></legend>
        <?php
            echo $this->Form->control('pedido_id', ['options' => $pedidos]);
            echo $this->Form->control('produto_id', ['options' => $produtos]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
