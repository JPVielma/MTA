<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Pago'), ['action' => 'edit', $pago->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Pago'), ['action' => 'delete', $pago->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pago->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Pagos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pago'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="pagos view large-9 medium-8 columns content">
    <h3><?= h($pago->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($pago->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('IdPromotor') ?></th>
            <td><?= $this->Number->format($pago->idPromotor) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Monto') ?></th>
            <td><?= $this->Number->format($pago->monto) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fecha') ?></th>
            <td><?= h($pago->fecha) ?></td>
        </tr>
    </table>
</div>
