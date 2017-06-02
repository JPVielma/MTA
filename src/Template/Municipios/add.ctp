<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Municipios'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="municipios form large-9 medium-8 columns content">
    <?= $this->Form->create($municipio) ?>
    <fieldset>
        <legend><?= __('Add Municipio') ?></legend>
        <?php
            echo $this->Form->input('Nombre');
            echo $this->Form->input('idEstado', array(
                'label' => 'Estado',
                'options' => $options
            ));
        ?>
    </fieldset>
    <?= $this->Form->button(__('Guardar')) ?>
    <?= $this->Form->end() ?>
</div>
