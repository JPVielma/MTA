<?php
namespace App\Controller;

use App\Controller\AppController;
use \Datetime;

/**
 * Beneficiario Controller
 *
 * @property \App\Model\Table\BeneficiarioTable $Beneficiario
 */
class BeneficiarioController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $beneficiario = $this->paginate($this->Beneficiario);
        $this->loadModel('Promotores');
        $this->loadModel('Comunidades');

        foreach($beneficiario as $b){
            $idPromotor=$b->idPromotor;
            $promotor=$this->Promotores->get($idPromotor);
            $b->idPromotor=$promotor->nombre." ".$promotor->apellido;

            $idComunidad=$b->idComunidad;
            $comunidad=$this->Comunidades->get($idComunidad);
            $b->idComunidad=$comunidad->Nombre;
        }

        $this->set(compact('beneficiario'));
        $this->set('_serialize', ['beneficiario']);
    }

    /**
     * View method
     *
     * @param string|null $id Beneficiario id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $beneficiario = $this->Beneficiario->get($id, [
            'contain' => []
        ]);

        $this->loadModel('Promotores');
        $this->loadModel('Comunidades');
        $this->loadModel('Estados');
        $this->loadModel('Municipios');
        $this->loadModel('Traspatios');

        $idPromotor=$beneficiario->idPromotor;
        $promotor=$this->Promotores->get($idPromotor);
        $beneficiario->Promotor=$promotor->nombre." ".$promotor->apellido;

        $idComunidad=$beneficiario->idComunidad;
        $comunidad=$this->Comunidades->get($idComunidad);
        $beneficiario->Comunidad=$comunidad->Nombre;

        $idMunicipio=$comunidad->idMunicipio;
        $municipio=$this->Municipios->get($idMunicipio);
        $beneficiario->Municipio=$municipio->Nombre;

        $idEstado=$municipio->idEstado;
        $estado=$this->Estados->get($idEstado);
        $beneficiario->Estado=$estado->nombre;

        $today=new DateTime('today');
        $fechaN=$beneficiario->fecha_nacimiento;
        $beneficiario->edad=$today->diff($fechaN)->y;

        $currentYear=date('Y');

        $traspatios = $this->Traspatios->find('all', [
            'conditions' => ['Traspatios.idBeneficiario' => $beneficiario->id,
                            'YEAR(Traspatios.fecha)' => $currentYear]
        ]);

        $traspatios1 = $this->Traspatios->find('all', [
            'conditions' => ['Traspatios.idBeneficiario' => $beneficiario->id,
                            'YEAR(Traspatios.fecha)' => $currentYear-1]
        ]);

        $traspatios2 = $this->Traspatios->find('all', [
            'conditions' => ['Traspatios.idBeneficiario' => $beneficiario->id,
                            'YEAR(Traspatios.fecha)' => $currentYear-2]
        ]);

        $traspatiosTotales=$traspatios->count();
        $traspatiosTotales1=$traspatios1->count();
        $traspatiosTotales2=$traspatios2->count();

        $beneficiario->traspatios=$traspatiosTotales;
        $beneficiario->traspatios1=$traspatiosTotales1;
        $beneficiario->traspatios2=$traspatiosTotales2;

        if($beneficiario->sexo==0){
            $beneficiario->sexo='Mascunlino';
        }
        else{
            $beneficiario->sexo='Femenino';
        }

        $this->set('year', $currentYear);
        $this->set('beneficiario', $beneficiario);
        $this->set('_serialize', ['beneficiario']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->loadModel('Promotores');
        $optionsPromotores = $this->Promotores->find('list', array(
        'fields' => array('Promotores.id', 'Promotores.nombre')
        ));
        $this->set(compact('optionsPromotores'));

        $this->loadModel('Comunidades');
        $optionsComunidades = $this->Comunidades->find('list', array(
        'fields' => array('Comunidades.id', 'Comunidades.nombre')
        ));
        $this->set(compact('optionsComunidades'));

        $beneficiario = $this->Beneficiario->newEntity();
        if ($this->request->is('post')) {
            $beneficiario = $this->Beneficiario->patchEntity($beneficiario, $this->request->data);
            if ($this->Beneficiario->save($beneficiario)) {
                $this->Flash->success(__('The beneficiario has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The beneficiario could not be saved. Please, try again.'));
        }
        $this->set(compact('beneficiario'));
        $this->set('_serialize', ['beneficiario']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Beneficiario id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->loadModel('Promotores');
        $optionsPromotores = $this->Promotores->find('list', array(
        'fields' => array('Promotores.id', 'Promotores.nombre')
        ));
        $this->set(compact('optionsPromotores'));

        $this->loadModel('Comunidades');
        $optionsComunidades = $this->Comunidades->find('list', array(
        'fields' => array('Comunidades.id', 'Comunidades.nombre')
        ));
        $this->set(compact('optionsComunidades')); 

        $beneficiario = $this->Beneficiario->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $beneficiario = $this->Beneficiario->patchEntity($beneficiario, $this->request->data);
            if ($this->Beneficiario->save($beneficiario)) {
                $this->Flash->success(__('The beneficiario has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The beneficiario could not be saved. Please, try again.'));
        }
        $this->set(compact('beneficiario'));
        $this->set('_serialize', ['beneficiario']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Beneficiario id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $beneficiario = $this->Beneficiario->get($id);
        if ($this->Beneficiario->delete($beneficiario)) {
            $this->Flash->success(__('The beneficiario has been deleted.'));
        } else {
            $this->Flash->error(__('The beneficiario could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
