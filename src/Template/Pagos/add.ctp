<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Pagos'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="pagos form large-9 medium-8 columns content">
    <?= $this->Form->create($pago) ?>
    <fieldset>
        <legend><?= __('Add Pago') ?></legend>
        <?php
             echo $this->Form->input('idPromotor', array(
                'options' => $options
            ));
            echo $this->Form->input('monto');
            echo $this->Form->input('fecha', array(
                'label' => 'Fecha', 
                'dateFormat' => 'DMY',
                'minYear' => date('Y') - 10,
                'maxYear' => date('Y')));
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
