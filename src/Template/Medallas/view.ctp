<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Medalla'), ['action' => 'edit', $medalla->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Medalla'), ['action' => 'delete', $medalla->id], ['confirm' => __('Are you sure you want to delete # {0}?', $medalla->id)]) ?> </li>
        <li><?= $this->Html->link(__('Agregar Atributo'), ['controller' => 'Atributos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Ver Atributos'), ['controller' => 'Atributos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Medallas'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Medalla'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="medallas view large-9 medium-8 columns content">
    <h3><?= h($medalla->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Nombre') ?></th>
            <td><?= h($medalla->nombre) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($medalla->id) ?></td>
        </tr>
    </table>
</div>
