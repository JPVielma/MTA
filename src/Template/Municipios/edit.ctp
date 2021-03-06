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
                ['action' => 'delete', $municipio->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $municipio->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Municipios'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="municipios form large-9 medium-8 columns content">
    <?= $this->Form->create($municipio) ?>
    <fieldset>
        <legend><?= __('Edit Municipio') ?></legend>
        <?php
            echo $this->Form->input('Nombre');
            echo $this->Form->input('idEstado', array(
                'options' => $options
            ));
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
