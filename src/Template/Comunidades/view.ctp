<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Menú') ?></li>
        <li><?= $this->Html->link(__('Editar Comunidad'), ['action' => 'edit', $comunidade->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Eliminar Comunidad'), ['action' => 'delete', $comunidade->id], ['confirm' => __('Are you sure you want to delete # {0}?', $comunidade->id)]) ?> </li>
        <li><?= $this->Html->link(__('Listar Comunidades'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Agregar Comunidad'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="comunidades view large-9 medium-8 columns content">
    <h3><?= h($comunidade->Nombre) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Nombre') ?></th>
            <td><?= h($comunidade->Nombre) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Municipio') ?></th>
            <td><?= h($comunidade->municipio) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Estado') ?></th>
            <td><?= h($comunidade->estado) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Número de Beneficiarios') ?></th>
            <td><?= h($comunidade->beneficiarios) ?></td>
        </tr>
    </table>
    <br>
    <h4>Traspatios</h4>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Número de traspatios '.$year) ?></th>
            <td><?= h($comunidade->traspatios)?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Número de traspatios '.($year-1)) ?></th>
            <td><?= h($comunidade->traspatios1)?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Número de traspatios '.($year-2)) ?></th>
            <td><?= h($comunidade->traspatios2)?></td>
        </tr>
    </table>
    <br>
    <h4><?= __('Beneficiarios') ?></h4>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('Nombre') ?></th>
                <th scope="col"><?= $this->Paginator->sort('edad') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Promotor') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Traspatios '.$year) ?></th>
                <th scope="col" class="actions"><?= __('Opciones') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($beneficiario as $beneficiario): ?>
            <tr>
                <td><?= h($beneficiario->Nombre)." ".h($beneficiario->Apellido) ?></td>
                <td><?= h($beneficiario->edad." años") ?></td>
                <td><?= h($beneficiario->idPromotor)?></td>
                <td><?= h($beneficiario->traspatios)?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Ver'), ['controller' => 'Beneficiario', 'action' => 'view', $beneficiario->id]) ?>
                    <?= $this->Html->link(__('Editar'), ['controller' => 'Beneficiario', 'action'  => 'edit', $beneficiario->id]) ?>
                    <?= $this->Form->postLink(__('Eliminar'), ['controller' => 'Beneficiario', 'action'  => 'delete', $beneficiario->id], ['confirm' => __('Esta seguro de eliminat la comunidad # {0}?', $beneficiario->id)]) ?>
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
