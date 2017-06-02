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
                ['action' => 'delete', $pregunta->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $pregunta->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Preguntas'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="preguntas form large-9 medium-8 columns content">
    <?= $this->Form->create($pregunta) ?>
    <fieldset>
        <legend><?= __('Edit Pregunta') ?></legend>
        <?php
            echo $this->Form->input('pregunta');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
