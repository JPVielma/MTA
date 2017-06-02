<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Traspatio'), ['action' => 'edit', $traspatio->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Traspatio'), ['action' => 'delete', $traspatio->id], ['confirm' => __('Are you sure you want to delete # {0}?', $traspatio->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Traspatios'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Traspatio'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="traspatios view large-9 medium-8 columns content">
    <h3><?= h($traspatio->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($traspatio->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('IdBeneficiario') ?></th>
            <td><?= $this->Number->format($traspatio->idBeneficiario) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Mts') ?></th>
            <td><?= $this->Number->format($traspatio->mts) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fecha') ?></th>
            <td><?= h($traspatio->fecha) ?></td>
        </tr>
    </table>
</div>
