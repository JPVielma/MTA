<?php
namespace App\Controller;

use App\Controller\AppController;
use \Datetime;

/**
 * Promotores Controller
 *
 * @property \App\Model\Table\PromotoresTable $Promotores
 */
class PromotoresController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $promotores = $this->paginate($this->Promotores);
        $today=new DateTime('today');

        $this->loadModel('Traspatios');
        $this->loadModel('Beneficiario');

        foreach($promotores as $promotor){
            $promotor->traspatios=0;
            $fechaN=$promotor->fechaNacimiento;
            $promotor->edad=$today->diff($fechaN)->y;
            $beneficiarios = $this->Beneficiario->find('all', [
            'conditions' => ['Beneficiario.idPromotor' => $promotor->id]
            ]);
            $beneficiariosTotales=$beneficiarios->count();
            $promotor->beneficiarios=$beneficiariosTotales;
            foreach ($beneficiarios as $beneficiario) {
                $traspatios = $this->Traspatios->find('all', [
                'conditions' => ['Traspatios.idBeneficiario' => $beneficiario->id]
                ]);

                $traspatiosTotales=$traspatios->count();
                $promotor->traspatios+=$traspatiosTotales;
            }
        }

         


        $this->set(compact('promotores'));
        $this->set('_serialize', ['promotores']);
    }

    /**
     * View method
     *
     * @param string|null $id Promotore id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->loadModel('Pagos');
        $this->loadModel('Beneficiario');
        $this->loadModel('Comunidades');
        $this->loadModel('Traspatios');

        $today=new DateTime('today');

        $promotore = $this->Promotores->get($id, [
            'contain' => []
        ]);
        $fechaN=$promotore->fechaNacimiento;
            $promotore->edad=$today->diff($fechaN)->y;

        $pagos = $this->paginate($this->Pagos->find('all', [
            'conditions' => ['Pagos.idPromotor' => $id]
            ]));

        $beneficiario = $this->paginate($this->Beneficiario->find('all', [
            'conditions' => ['Beneficiario.idPromotor' => $id]
            ]));
        $traspatiosTotales=0;
        $traspatiosTotales1=0;
        $traspatiosTotales2=0;
        $currentYear=date('Y');

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

        foreach($beneficiario as $b){
            $b->comunidad=$this->Comunidades->get($b->idComunidad)->Nombre;

            $fechaN=$b->fecha_nacimiento;
            $b->edad=$today->diff($fechaN)->y;

            $traspatios = $this->Traspatios->find('all', [
                'conditions' => ['Traspatios.idBeneficiario' => $b->id,
                                'YEAR(Traspatios.fecha)' => $currentYear]
            ]);
            $b->traspatios=$traspatios->count();
            $traspatiosTotales+=$traspatios->count();

            $traspatios1 = $this->Traspatios->find('all', [
                'conditions' => ['Traspatios.idBeneficiario' => $b->id,
                                'YEAR(Traspatios.fecha)' => $currentYear-1]
            ]);
            $b->traspatios1=$traspatios1->count();
            $traspatiosTotales1+=$traspatios1->count();

            $traspatios2 = $this->Traspatios->find('all', [
                'conditions' => ['Traspatios.idBeneficiario' => $b->id,
                                'YEAR(Traspatios.fecha)' => $currentYear-2]
            ]);
            $traspatiosTotales2+=$traspatios2->count();
        }

        $promotore->traspatios=$traspatiosTotales;
        $promotore->traspatios1=$traspatiosTotales1;
        $promotore->traspatios2=$traspatiosTotales2;

        $promotore->beneficiarios=$beneficiario->count();
        $this->set('promotore', $promotore);
        $this->set('_serialize', ['promotore']);


        $sexo='-';
        if(($promotore->sexo)==0){
            $sexo='Masculino';
        }
        else if(($promotore->sexo)==1){
                $sexo='Femenino';
        }     

        $iva=1.16;

        $this->set('iva', $iva);
        $this->set('totalPagos', $totalPagos);
        $this->set('pagosAnuales', $pagosAnuales);
        $this->set('year', $currentYear);
        $this->set("sexo", $sexo);   
        $this->set(compact('pagos'));
        $this->set('_serialize', ['pagos']);
        $this->set(compact('beneficiario'));
        $this->set('_serialize', ['beneficiario']);

    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        // $this->loadModel('Comunidad');
        // $options = $this->Comunidad->find('list', array(
        // 'fields' => array('Comunidad.id', 'Comunidad.nombre')
        // ));
        // $this->set(compact('options'));
        $promotore = $this->Promotores->newEntity();
        if ($this->request->is('post')) {
            $promotore = $this->Promotores->patchEntity($promotore, $this->request->data);
            if ($this->Promotores->save($promotore)) {
                $this->Flash->success(__('El Promotor ha sido guardado en la base de datos.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Error. Porfavor intente más tarde'));
        }

        $this->set(compact('promotore'));
        $this->set('_serialize', ['promotore']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Promotore id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {

        // $this->loadModel('Comunidad');
        // $options = $this->Comunidad->find('list', array(
        // 'fields' => array('Comunidad.id', 'Comunidad.nombre')
        // ));
        // $this->set(compact('options'));
        $promotore = $this->Promotores->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $promotore = $this->Promotores->patchEntity($promotore, $this->request->data);
            if ($this->Promotores->save($promotore)) {
                $this->Flash->success(__('The promotore has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The promotore could not be saved. Please, try again.'));
        }
        $this->set(compact('promotore'));
        $this->set('_serialize', ['promotore']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Promotore id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $promotore = $this->Promotores->get($id);
        if ($this->Promotores->delete($promotore)) {
            $this->Flash->success(__('The promotore has been deleted.'));
        } else {
            $this->Flash->error(__('The promotore could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
