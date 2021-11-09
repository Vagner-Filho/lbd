<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\EnderecosCliente $enderecosCliente
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $enderecosCliente->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $enderecosCliente->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Enderecos Clientes'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Clientes'), ['controller' => 'Clientes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Cliente'), ['controller' => 'Clientes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="enderecosClientes form large-9 medium-8 columns content">
    <?= $this->Form->create($enderecosCliente) ?>
    <fieldset>
        <legend><?= __('Edit Enderecos Cliente') ?></legend>
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
