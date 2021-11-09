<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Fornecedores $fornecedores
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $fornecedores->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $fornecedores->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Fornecedores'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Categorias'), ['controller' => 'Categorias', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Categoria'), ['controller' => 'Categorias', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Produtos'), ['controller' => 'Produtos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Produto'), ['controller' => 'Produtos', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="fornecedores form large-9 medium-8 columns content">
    <?= $this->Form->create($fornecedores) ?>
    <fieldset>
        <legend><?= __('Edit Fornecedores') ?></legend>
        <?php
            echo $this->Form->control('cnpj');
            echo $this->Form->control('nome_fornecedor');
            echo $this->Form->control('cep');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
