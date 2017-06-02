<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Atributos'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="atributos form large-9 medium-8 columns content">
    <?= $this->Form->create($atributo) ?>
    <fieldset>
        <legend><?= __('Add Atributo') ?></legend>
        <?php
            echo $this->Form->input('nombre');
            echo $this->Form->input('criterioAceptacion');
            echo $this->Form->input('idMedalla');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
