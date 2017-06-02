<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Agregar Municipio'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="municipios index large-9 medium-8 columns content">
    <h3><?= __('Municipios') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('Nombre') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Estado') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($municipios as $municipio): ?>
            <tr>
                <td><?= h($municipio->Nombre) ?></td>
                <td><?= h($municipio->idEstado) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Ver'), ['action' => 'view', $municipio->id]) ?>
                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $municipio->id]) ?>
                    <?= $this->Form->postLink(__('Eliminar'), ['action' => 'delete', $municipio->id], ['confirm' => __('Esta seguro que quiere eliminar # {0}?', $municipio->nombre)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('primer')) ?>
            <?= $this->Paginator->prev('< ' . __('anterior')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('siguiente') . ' >') ?>
            <?= $this->Paginator->last(__('último') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Página {{page}} de {{pages}}, mostrando {{current}} registro(s) de {{count}} totales')]) ?></p>
    </div>
</div>
