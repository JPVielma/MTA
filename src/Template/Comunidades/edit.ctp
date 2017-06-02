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
                ['action' => 'delete', $comunidade->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $comunidade->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Comunidades'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="comunidades form large-9 medium-8 columns content">
    <?= $this->Form->create($comunidade) ?>
    <fieldset>
        <legend><?= __('Edit Comunidade') ?></legend>
        <?php
            echo $this->Form->input('idMunicipio', array(
                'label' => 'Municipio',
                'options' => $options
            ));
            echo $this->Form->input('Nombre');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
