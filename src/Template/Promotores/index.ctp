<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('MENÚ') ?></li>
        <li><?= $this->Html->link(__('Agregar Promotor'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Beneficiarios'), ['controller' => 'Beneficiario', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Promotores'), ['controller' => 'Promotores', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Pagos'), ['controller' => 'Pagos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Municipios'), ['controller' => 'Municipios', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Comunidades'), ['controller' => 'Comunidades', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Traspatios'), ['controller' => 'Traspatios', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Reuniones'), ['controller' => 'Reuniones', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Preguntas'), ['controller' => 'Preguntas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Medallas'), ['controller' => 'Medallas', 'action' => 'index']) ?></li>
    </ul>
</nav>
<div class="promotores index large-9 medium-8 columns content">
    <h3><?= __('Promotores') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('nombre') ?></th>
                <th scope="col"><?= $this->Paginator->sort('edad') ?></th>
                <th scope="col"><?= $this->Paginator->sort('beneficiarios') ?></th>
                <th scope="col"><?= $this->Paginator->sort('traspatios') ?></th>
                <th scope="col" class="actions"><?= __('MENÚ') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($promotores as $promotore): ?>
            <tr>
                <td><?= h($promotore->nombre)." ".h($promotore->apellido) ?></td>
                <td><?= h($promotore->edad) ?></td>
                <td><?= h($promotore->beneficiarios) ?></td>
                <td><?= h($promotore->traspatios) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Ver'), ['action' => 'view', $promotore->id]) ?>
                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $promotore->id]) ?>
                    <?= $this->Form->postLink(__('Eliminar'), ['action' => 'delete', $promotore->id], ['confirm' => __('Are you sure you want to delete # {0}?', $promotore->id)]) ?>
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
