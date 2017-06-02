<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Listar Beneficiarios'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="beneficiario form large-9 medium-8 columns content">
    <?= $this->Form->create($beneficiario) ?>
    <fieldset>
        <legend><?= __('Agregar Beneficiario') ?></legend>
        <?php
            echo $this->Form->input('Nombre');
            echo $this->Form->input('Apellido');
            echo $this->Form->input('idPromotor', array(
                'label' => 'Promotor', 
                'options' => $optionsPromotores
            ));
            echo $this->Form->input('idComunidad', array(
                'label' => 'Comunidad', 
                'options' => $optionsComunidades
            ));
            echo $this->Form->input('fecha_nacimiento', array(
                'label' => 'Fecha de Nacimiento', 
                'dateFormat' => 'DMY',
                'minYear' => date('Y') - 100,
                'maxYear' => date('Y') - 1 ));
            echo $this->Form->input('sexo', array(
                'options' => array("Masculino", "Femenino"),
                'value' => array(0, 1)
            ));

            echo $this->Form->input('curp');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Guardar')) ?>
    <?= $this->Form->end() ?>
</div>
