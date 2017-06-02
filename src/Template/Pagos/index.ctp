<?php
/**
  * @var \App\View\AppView $this
  */
?>
<?= $this->Html->script('//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js', array('inline' => false)) ?>
<?= $this->Html->script('//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js', array('inline' => false))?>
<?= $this->Html->css('//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css', array('inline' => false));?>

<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Agregar Pago'), ['action' => 'add']) ?></li>
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
<div class="pagos index large-9 medium-8 columns content">
    <h3><?= __('Pagos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('Promotor') ?></th>
                <th scope="col"><?= $this->Paginator->sort('monto') ?></th>
                <th scope="col"><?= $this->Paginator->sort('monto +Iva') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fecha') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pagos as $pago): ?>
            <tr>
                <td><?= $pago->idPromotor ?></td>
                <td><?= "$".$this->Number->format($pago->monto) ?></td>
                <td><?= "$".$this->Number->format($pago->monto)*$iva ?></td>
                <td><?= h($pago->fecha) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Ver'), ['action' => 'view', $pago->id]) ?>
                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $pago->id]) ?>
                    <?= $this->Form->postLink(__('Eliminar'), ['action' => 'delete', $pago->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pago->id)]) ?>
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
    <h4>Registros Anuales</h4>
    <table class="vertical-table">
        <tr>
            <th scope="row"><a data-toggle="modal" data-target="#myModal"><?= __($year) ?></a></th>
            <td>$<?= h($pagosAnuales[0])?></td>
        </tr>
        <tr>

        <tr>
            <th scope="row"><a data-toggle="modal" data-target="#myModal1"><?= __($year-1) ?></a></th>
            <td>$<?= h($pagosAnuales[1])?></td>
        </tr>
        <tr>
            <th scope="row"><a data-toggle="modal" data-target="#myModal2"><?= __($year-2) ?></a></th>
            <td>$<?= h($pagosAnuales[2])?></td>
        </tr>
    </table>

    <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Pagos <?= h($year)?></h4>
        </div>
        <div class="modal-body">
          <table cellpadding="0" cellspacing="0">
          <thead>
            <tr>
                <th scope="col">Mes</th>
                <th scope="col">Monto Total</th>
                <th scope="col">        Monto +IVA</th>
                
            </tr>
        </thead>
        <tbody>
            
            <tr>
                <td>Enero</td>
                <td>$<?= h($totalPagos[0][1])?></td>
                <td>$<?= h($totalPagos[0][1]*$iva)?></td>
            </tr>
            <tr>
            <tr>
                <td scope="row">Febrero</td>
                <td>$<?= h($totalPagos[0][2])?></td>
                <td>$<?= h($totalPagos[0][2]*$iva)?></td>
            </tr>
            <tr>
            <tr>
                <td scope="row">Marzo</td>
                <td>$<?= h($totalPagos[0][3])?></td>
                <td>$<?= h($totalPagos[0][3]*$iva)?></td>
            </tr>
            <tr>
            <tr>
                <td scope="row">Abril</td>
                <td>$<?= h($totalPagos[0][4])?></td>
                <td>$<?= h($totalPagos[0][4]*$iva)?></td>
            </tr>
            <tr>
            <tr>
                <td scope="row">Mayo</td>
                <td>$<?= h($totalPagos[0][5])?></td>
                <td>$<?= h($totalPagos[0][5]*$iva)?></td>
            </tr>
            <tr>
            <tr>
                <td scope="row">Junio</td>
                <td>$<?= h($totalPagos[0][6])?></td>
                <td>$<?= h($totalPagos[0][6]*$iva)?></td>
            </tr>
            <tr>
            <tr>
                <td scope="row">Julio</td>
                <td>$<?= h($totalPagos[0][7])?></td>
                <td>$<?= h($totalPagos[0][7]*$iva)?></td>
            </tr>
            <tr>
            <tr>
                <td scope="row">Agosto</td>
                <td>$<?= h($totalPagos[0][8])?></td>
                <td>$<?= h($totalPagos[0][8]*$iva)?></td>
            </tr>
            <tr>
            <tr>
                <td scope="row">Septiembre</td>
                <td>$<?= h($totalPagos[0][9])?></td>
                <td>$<?= h($totalPagos[0][9]*$iva)?></td>
            </tr>
            <tr>
            <tr>
                <td scope="row">Octubre</td>
                <td>$<?= h($totalPagos[0][10])?></td>
                <td>$<?= h($totalPagos[0][10]*$iva)?></td>
            </tr>
            <tr>
            <tr>
                <td scope="row">Noviembre</td>
                <td>$<?= h($totalPagos[0][11])?></td>
                <td>$<?= h($totalPagos[0][11]*$iva)?></td>
            </tr>
            <tr>
            <tr>
                <td scope="row">Diciembre</td>
                <td>$<?= h($totalPagos[0][12])?></td>
                <td>$<?= h($totalPagos[0][12]*$iva)?></td>
            </tr>
            <tr>
            </tbody>

    </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
      
    </div>
  </div>
    <div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Pagos <?= h($year-1)?></h4>
        </div>
        <div class="modal-body">
          <table class="vertical-table">
               <tr>
                <th scope="row">Mes</th>
                <th>        Monto Total</th>
                <th scope="row">        Monto +IVA</th>
                
            </tr>
            <tr>
                <th scope="row">Enero</th>
                <td>$<?= h($totalPagos[1][1])?></td>
                <td>$<?= h($totalPagos[1][1]*$iva)?></td>
            </tr>
            <tr>
            <tr>
                <th scope="row">Febrero</th>
                <td>$<?= h($totalPagos[1][2])?></td>
                <td>$<?= h($totalPagos[1][2]*$iva)?></td>
            </tr>
            <tr>
            <tr>
                <th scope="row">Marzo</th>
                <td>$<?= h($totalPagos[1][3])?></td>
                <td>$<?= h($totalPagos[1][3]*$iva)?></td>
            </tr>
            <tr>
            <tr>
                <th scope="row">Abril</th>
                <td>$<?= h($totalPagos[1][4])?></td>
                <td>$<?= h($totalPagos[1][4]*$iva)?></td>
            </tr>
            <tr>
            <tr>
                <th scope="row">Mayo</th>
                <td>$<?= h($totalPagos[1][5])?></td>
                <td>$<?= h($totalPagos[1][5]*$iva)?></td>
            </tr>
            <tr>
            <tr>
                <th scope="row">Junio</th>
                <td>$<?= h($totalPagos[1][6])?></td>
                <td>$<?= h($totalPagos[1][6]*$iva)?></td>
            </tr>
            <tr>
            <tr>
                <th scope="row">Julio</th>
                <td>$<?= h($totalPagos[1][7])?></td>
                <td>$<?= h($totalPagos[1][7]*$iva)?></td>
            </tr>
            <tr>
            <tr>
                <th scope="row">Agosto</th>
                <td>$<?= h($totalPagos[1][8])?></td>
                <td>$<?= h($totalPagos[1][8]*$iva)?></td>
            </tr>
            <tr>
            <tr>
                <th scope="row">Septiembre</th>
                <td>$<?= h($totalPagos[1][9])?></td>
                <td>$<?= h($totalPagos[1][9]*$iva)?></td>
            </tr>
            <tr>
            <tr>
                <th scope="row">Octubre</th>
                <td>$<?= h($totalPagos[1][10])?></td>
                <td>$<?= h($totalPagos[1][10]*$iva)?></td>
            </tr>
            <tr>
            <tr>
                <th scope="row">Noviembre</th>
                <td>$<?= h($totalPagos[1][11])?></td>
                <td>$<?= h($totalPagos[1][11]*$iva)?></td>
            </tr>
            <tr>
            <tr>
                <th scope="row">Diciembre</th>
                <td>$<?= h($totalPagos[1][12])?></td>
                <td>$<?= h($totalPagos[1][12]*$iva)?></td>
            </tr>
            <tr>
    </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
      
    </div>
  </div>
    <div class="modal fade" id="myModal2" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Pagos <?= h($year-2)?></h4>
        </div>
        <div class="modal-body">
          <table class="vertical-table">
                        <tr>
                <th scope="row">Mes</th>
                <th>        Monto Total</th>
                <th scope="row">        Monto +IVA</th>
                
            </tr>
            <tr>
                <th scope="row">Enero</th>
                <td>$<?= h($totalPagos[2][1])?></td>
                <td>$<?= h($totalPagos[2][1]*$iva)?></td>
            </tr>
            <tr>
            <tr>
                <th scope="row">Febrero</th>
                <td>$<?= h($totalPagos[2][2])?></td>
                <td>$<?= h($totalPagos[2][2]*$iva)?></td>
            </tr>
            <tr>
            <tr>
                <th scope="row">Marzo</th>
                <td>$<?= h($totalPagos[2][3])?></td>
                <td>$<?= h($totalPagos[2][3]*$iva)?></td>
            </tr>
            <tr>
            <tr>
                <th scope="row">Abril</th>
                <td>$<?= h($totalPagos[2][4])?></td>
                <td>$<?= h($totalPagos[2][4]*$iva)?></td>
            </tr>
            <tr>
            <tr>
                <th scope="row">Mayo</th>
                <td>$<?= h($totalPagos[2][5])?></td>
                <td>$<?= h($totalPagos[2][5]*$iva)?></td>
            </tr>
            <tr>
            <tr>
                <th scope="row">Junio</th>
                <td>$<?= h($totalPagos[2][6])?></td>
                <td>$<?= h($totalPagos[2][6]*$iva)?></td>
            </tr>
            <tr>
            <tr>
                <th scope="row">Julio</th>
                <td>$<?= h($totalPagos[2][7])?></td>
                <td>$<?= h($totalPagos[2][7]*$iva)?></td>
            </tr>
            <tr>
            <tr>
                <th scope="row">Agosto</th>
                <td>$<?= h($totalPagos[2][8])?></td>
                <td>$<?= h($totalPagos[2][8]*$iva)?></td>
            </tr>
            <tr>
            <tr>
                <th scope="row">Septiembre</th>
                <td>$<?= h($totalPagos[2][9])?></td>
                <td>$<?= h($totalPagos[2][9]*$iva)?></td>
            </tr>
            <tr>
            <tr>
                <th scope="row">Octubre</th>
                <td>$<?= h($totalPagos[2][10])?></td>
                <td>$<?= h($totalPagos[2][10]*$iva)?></td>
            </tr>
            <tr>
            <tr>
                <th scope="row">Noviembre</th>
                <td>$<?= h($totalPagos[2][11])?></td>
                <td>$<?= h($totalPagos[2][11]*$iva)?></td>
            </tr>
            <tr>
            <tr>
                <th scope="row">Diciembre</th>
                <td>$<?= h($totalPagos[2][12])?></td>
                <td>$<?= h($totalPagos[2][12]*$iva)?></td>
            </tr>
            <tr>
    </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
      
    </div>
  </div>
</div>
