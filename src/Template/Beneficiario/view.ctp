<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Opciones') ?></li>
        <li><?= $this->Html->link(__('Editar Beneficiario'), ['action' => 'edit', $beneficiario->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Eliminar Beneficiario'), ['action' => 'delete', $beneficiario->id], ['confirm' => __('Are you sure you want to delete # {0}?', $beneficiario->id)]) ?> </li>
        <li><?= $this->Html->link(__('Listar Beneficiarios'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Nuevo Beneficiario'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="beneficiario view large-9 medium-8 columns content">
    <h3><?= h($beneficiario->Nombre)." ". h($beneficiario->Apellido) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Nombre') ?></th>
            <td><?= h($beneficiario->Nombre) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Apellido') ?></th>
            <td><?= h($beneficiario->Apellido) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Curp') ?></th>
            <td><?= h($beneficiario->curp) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sexo') ?></th>
            <td><?= h($beneficiario->sexo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Promotor') ?></th>
            <td><?= h($beneficiario->Promotor) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Estado') ?></th>
            <td><?= h($beneficiario->Estado) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Municipio') ?></th>
            <td><?= h($beneficiario->Municipio) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Comunidad') ?></th>
            <td><?= h($beneficiario->Comunidad) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fecha Nacimiento') ?></th>
            <td><?= h($beneficiario->fecha_nacimiento) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Edad') ?></th>
            <td><?= h($beneficiario->edad)." años" ?></td>
        </tr>

    </table>
    <br>
    <h4>Traspatios</h4>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Número de traspatios '.$year) ?></th>
            <td><?= h($beneficiario->traspatios)?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Número de traspatios '.($year-1)) ?></th>
            <td><?= h($beneficiario->traspatios1)?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Número de traspatios '.($year-2)) ?></th>
            <td><?= h($beneficiario->traspatios2)?></td>
        </tr>
    </table>
</div>
