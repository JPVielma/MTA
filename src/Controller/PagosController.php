<?php
namespace App\Controller;

use App\Controller\AppController;
use \Datetime;

/**
 * Pagos Controller
 *
 * @property \App\Model\Table\PagosTable $Pagos
 */
class PagosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $pagos = $this->paginate($this->Pagos);
        $this->loadModel('Promotores');
        $currentYear=date('Y');

        foreach ($pagos as $pago){
            $id=$pago->idPromotor;
            $promotor=$this->Promotores->get($id);
            $nombre=$promotor->nombre.' '.$promotor->apellido;
            $pago->idPromotor= $nombre;
        }

        for($i=0; $i<3; $i++){
            $pagosAnuales[$i]=0;
            for($j=1; $j<13; $j++){
                $totalPagos[$i][$j]=0;
                foreach ($pagos as $pago) {
                    $month=date_format($pago->fecha,"n");
                    $year=date_format($pago->fecha,"Y");
                    if($year==$currentYear-$i){
                        $pagosAnuales[$i]+=$pago->monto;
                        if($month==$j){
                            $totalPagos[$i][$j]+=$pago->monto;
                        }
                    }
                }
            }
            $pagosAnuales[$i]=$pagosAnuales[$i]/12;
        }

        $iva=1.16;

        $this->set('iva', $iva);
        $this->set('totalPagos', $totalPagos);
        $this->set('year', $currentYear);
        $this->set('pagosAnuales', $pagosAnuales);
        $this->set(compact('pagos'));
        $this->set('_serialize', ['pagos']);
    }

    /**
     * View method
     *
     * @param string|null $id Pago id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $pago = $this->Pagos->get($id, [
            'contain' => []
        ]);

        $this->set('pago', $pago);
        $this->set('_serialize', ['pago']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->loadModel('Promotores');
        $options = $this->Promotores->find('list', array(
        'fields' => array('Promotores.nombre', 'Promotores.id')
        ));
        $this->set(compact('options'));
        $pago = $this->Pagos->newEntity();
        if ($this->request->is('post')) {
            $pago = $this->Pagos->patchEntity($pago, $this->request->data);
            echo $pago;
            if ($this->Pagos->save($pago)) {
                $this->Flash->success(__('El pago ha sido registrado exitosamente.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('El pago no pudo ser registrado. Intente de nuevo mas tarde.'.$pago));
        }



        $this->set(compact('pago'));
        $this->set('_serialize', ['pago']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Pago id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {

        $this->loadModel('Promotores');
        $options = $this->Promotores->find('list', array(
        'fields' => array('Promotores.id', 'Promotores.nombre')
        ));
        $this->set(compact('options'));
        $pago = $this->Pagos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pago = $this->Pagos->patchEntity($pago, $this->request->data);
            if ($this->Pagos->save($pago)) {
                $this->Flash->success(__('The pago has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pago could not be saved. Please, try again.'));
        }
        $this->set(compact('pago'));
        $this->set('_serialize', ['pago']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Pago id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $pago = $this->Pagos->get($id);
        if ($this->Pagos->delete($pago)) {
            $this->Flash->success(__('The pago has been deleted.'));
        } else {
            $this->Flash->error(__('The pago could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
