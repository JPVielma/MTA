<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Respuestas'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="respuestas form large-9 medium-8 columns content">
    <?= $this->Form->create($respuesta) ?>
    <fieldset>
        <legend><?= __('Add Respuesta') ?></legend>
        <?php
            echo $this->Form->input('idPregunta');
            echo $this->Form->input('respuesta');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
