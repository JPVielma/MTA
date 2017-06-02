<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Atributo'), ['action' => 'edit', $atributo->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Atributo'), ['action' => 'delete', $atributo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $atributo->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Atributos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Atributo'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="atributos view large-9 medium-8 columns content">
    <h3><?= h($atributo->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Nombre') ?></th>
            <td><?= h($atributo->nombre) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($atributo->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('CriterioAceptacion') ?></th>
            <td><?= $this->Number->format($atributo->criterioAceptacion) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('IdMedalla') ?></th>
            <td><?= $this->Number->format($atributo->idMedalla) ?></td>
        </tr>
    </table>
</div>
