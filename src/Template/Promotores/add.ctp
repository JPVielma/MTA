<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Promotores'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="promotores form large-9 medium-8 columns content">
    <?= $this->Form->create($promotore) ?>
    <fieldset>
        <legend><?= __('Add Promotore') ?></legend>
        <?php
            echo $this->Form->input('nombre');
            echo $this->Form->input('apellido');
            echo $this->Form->input('numero');
            echo $this->Form->input('correo');
            echo $this->Form->input('fechaNacimiento', array(
                'label' => 'Fecha de Nacimiento', 
                'dateFormat' => 'DMY',
                'minYear' => date('Y') - 100,
                'maxYear' => date('Y') - 1 ));
            echo $this->Form->input('sexo', array(
                'options' => array("Masculino", "Femenino"),
                'value' => array(0, 1)
            ));
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
