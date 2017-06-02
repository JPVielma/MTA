<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Atributo'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="atributos index large-9 medium-8 columns content">
    <h3><?= __('Atributos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nombre') ?></th>
                <th scope="col"><?= $this->Paginator->sort('criterioAceptacion') ?></th>
                <th scope="col"><?= $this->Paginator->sort('idMedalla') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($atributos as $atributo): ?>
            <tr>
                <td><?= $this->Number->format($atributo->id) ?></td>
                <td><?= h($atributo->nombre) ?></td>
                <td><?= $this->Number->format($atributo->criterioAceptacion) ?></td>
                <td><?= $this->Number->format($atributo->idMedalla) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $atributo->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $atributo->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $atributo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $atributo->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
