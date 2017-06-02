<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Pregunta'), ['action' => 'add']) ?></li>
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
<div class="preguntas index large-9 medium-8 columns content">
    <h3><?= __('Preguntas') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('pregunta') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($preguntas as $pregunta): ?>
            <tr>
                <td><?= h($pregunta->pregunta) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $pregunta->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $pregunta->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $pregunta->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pregunta->id)]) ?>
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
