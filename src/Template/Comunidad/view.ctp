<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Comunidad'), ['action' => 'edit', $comunidad->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Comunidad'), ['action' => 'delete', $comunidad->id], ['confirm' => __('Are you sure you want to delete # {0}?', $comunidad->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Comunidad'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Comunidad'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="comunidad view large-9 medium-8 columns content">
    <h3><?= h($comunidad->nombre) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Nombre') ?></th>
            <td><?= h($comunidad->nombre) ?></td>
        </tr>
    </table>


    <h3><?= __('Promotores') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('nombre') ?></th>
                <th scope="col"><?= $this->Paginator->sort('correo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fechaNacimiento') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($promotores as $promotore): ?>
            <tr>
                <td><?= h($promotore->nombre)." ".h($promotore->apellido) ?></td>
                <td><?= h($promotore->correo) ?></td>
                <td><?= h($promotore->fechaNacimiento) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $promotore->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $promotore->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $promotore->id], ['confirm' => __('Are you sure you want to delete # {0}?', $promotore->id)]) ?>
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
