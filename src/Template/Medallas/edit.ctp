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
                ['action' => 'delete', $medalla->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $medalla->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Medallas'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="medallas form large-9 medium-8 columns content">
    <?= $this->Form->create($medalla) ?>
    <fieldset>
        <legend><?= __('Edit Medalla') ?></legend>
        <?php
            echo $this->Form->input('nombre');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
