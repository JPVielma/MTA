<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Municipio'), ['action' => 'edit', $municipio->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Municipio'), ['action' => 'delete', $municipio->id], ['confirm' => __('Are you sure you want to delete # {0}?', $municipio->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Municipios'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Municipio'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="municipios view large-9 medium-8 columns content">
    <h3><?= h($municipio->Nombre) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Nombre') ?></th>
            <td><?= h($municipio->Nombre) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Estado') ?></th>
            <td><?= h($municipio->estado) ?></td>
        </tr>
    </table>
    <h4><?= __('Comunidades') ?></h4>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('Nombre') ?></th>
                <th scope="col" class="actions"><?= __('Opciones') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($comunidades as $comunidade): ?>
            <tr>
                <td><?= h($comunidade->Nombre) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Ver'), ['controller' => 'Comunidades','action' => 'view', $comunidade->id]) ?>
                    <?= $this->Html->link(__('Editar'), ['controller' => 'Comunidades','action' => 'edit', $comunidade->id]) ?>
                    <?= $this->Form->postLink(__('Eliminar'), ['controller' => 'Comunidades','action' => 'delete', $comunidade->id], ['confirm' => __('Are you sure you want to delete # {0}?', $comunidade->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
