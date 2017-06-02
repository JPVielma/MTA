<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Respuesta'), ['action' => 'edit', $respuesta->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Respuesta'), ['action' => 'delete', $respuesta->id], ['confirm' => __('Are you sure you want to delete # {0}?', $respuesta->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Respuestas'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Respuesta'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="respuestas view large-9 medium-8 columns content">
    <h3><?= h($respuesta->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Respuesta') ?></th>
            <td><?= h($respuesta->respuesta) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($respuesta->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('IdPregunta') ?></th>
            <td><?= $this->Number->format($respuesta->idPregunta) ?></td>
        </tr>
    </table>
</div>
