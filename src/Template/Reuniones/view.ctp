<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Reunione'), ['action' => 'edit', $reunione->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Reunione'), ['action' => 'delete', $reunione->id], ['confirm' => __('Are you sure you want to delete # {0}?', $reunione->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Reuniones'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Reunione'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="reuniones view large-9 medium-8 columns content">
    <h3><?= h($reunione->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Nombre') ?></th>
            <td><?= h($reunione->nombre) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($reunione->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('IdPromotor') ?></th>
            <td><?= $this->Number->format($reunione->idPromotor) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Participantes') ?></th>
            <td><?= $this->Number->format($reunione->participantes) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fecha') ?></th>
            <td><?= h($reunione->fecha) ?></td>
        </tr>
    </table>
</div>
