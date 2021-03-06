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
                ['action' => 'delete', $pago->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $pago->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Pagos'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="pagos form large-9 medium-8 columns content">
    <?= $this->Form->create($pago) ?>
    <fieldset>
        <legend><?= __('Edit Pago') ?></legend>
        <?php
               echo $this->Form->input('Promotor', array(
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
