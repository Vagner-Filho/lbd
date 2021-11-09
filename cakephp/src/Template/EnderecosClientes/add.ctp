<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\EnderecosCliente $enderecosCliente
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Enderecos Clientes'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Clientes'), ['controller' => 'Clientes', 'action' => 'index']) ?></li>
        <!--<li><?php// $this->Html->link(__('New Cliente'), ['controller' => 'Clientes', 'action' => 'add']) ?> </li>-->
        </ul>
</nav>
<div class="enderecosClientes form large-9 medium-8 columns content">
    <?= $this->Form->create($enderecosCliente) ?>
    <fieldset>
        <legend><?= __('Add Enderecos Cliente') ?></legend>
        <?php
            echo $this->Form->control('cliente_id', ['options' => $clientes]);
            echo $this->Form->control('numero');
            echo $this->Form->control('rua');
            echo $this->Form->control('cidade');
            echo $this->Form->control('estado');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
