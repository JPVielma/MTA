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
                ['action' => 'delete', $reunione->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $reunione->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Reuniones'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="reuniones form large-9 medium-8 columns content">
    <?= $this->Form->create($reunione) ?>
    <fieldset>
        <legend><?= __('Edit Reunione') ?></legend>
        <?php
            echo $this->Form->input('idPromotor');
            echo $this->Form->input('nombre');
            echo $this->Form->input('fecha');
            echo $this->Form->input('participantes');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
