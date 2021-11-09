<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\EnderecosPedido $enderecosPedido
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Enderecos Pedidos'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="enderecosPedidos form large-9 medium-8 columns content">
    <?= $this->Form->create($enderecosPedido) ?>
    <fieldset>
        <legend><?= __('Add Enderecos Pedido') ?></legend>
        <?php
            echo $this->Form->control('numero');
            echo $this->Form->control('rua');
            echo $this->Form->control('cidade');
            echo $this->Form->control('estado');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
