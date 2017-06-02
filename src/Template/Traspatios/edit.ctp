<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $traspatio->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $traspatio->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Traspatios'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="traspatios form large-9 medium-8 columns content">
    <?= $this->Form->create($traspatio) ?>
    <fieldset>
        <legend><?= __('Edit Traspatio') ?></legend>
        <?php
            echo $this->Form->input('idBeneficiario', array(
                'label' => 'Beneficiario',
                'options' => $options
            ));
            echo $this->Form->input('mts', array(
                'label'=>'Metros Cuadrados'
                ));
            echo $this->Form->input('fecha', array(
                'label' => 'Fecha de Siembra', 
                'dateFormat' => 'DMY',
                'minYear' => date('Y') - 10,
                'maxYear' => date('Y')));
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
