<?php
namespace App\Controller;

use App\Controller\AppController;
use \Datetime;

/**
 * Comunidades Controller
 *
 * @property \App\Model\Table\ComunidadesTable $Comunidades
 */
class ComunidadesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $comunidades = $this->paginate($this->Comunidades);

        $this->loadModel('Estados');
        $this->loadModel('Municipios');

        foreach($comunidades as $comunidad){
            $idMunicipio=$comunidad->idMunicipio;
            $municipio=$this->Municipios->get($idMunicipio);
            $comunidad->Municipio=$municipio->Nombre;

            $idEstado=$municipio->idEstado;
            $estado=$this->Estados->get($idEstado);
            $comunidad->idEstado=$estado->nombre;
        }

        $this->set(compact('comunidades'));
        $this->set('_serialize', ['comunidades']);
    }

    /**
     * View method
     *
     * @param string|null $id Comunidade id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->loadModel('Beneficiario');
        $this->loadModel('Promotores');
        $this->loadModel('Traspatios');
        $this->loadModel('Municipios');
        $this->loadModel('Estados');

        $comunidade = $this->Comunidades->get($id, [
            'contain' => []
        ]);

        $beneficiario = $this->paginate($this->Beneficiario->find('all', [
            'conditions' => ['Beneficiario.idComunidad' => $id]
            ]));

        $comunidade->beneficiarios=$beneficiario->count();

        $municipio=$this->Municipios->get($comunidade->idMunicipio);
        $comunidade->municipio=$municipio->Nombre;

        $estado=$this->Estados->get($municipio->idEstado);
        $comunidade->estado=$estado->nombre;

        $comunidade->beneficiarios=$beneficiario->count();
        $currentYear=date('Y');
        $today=new DateTime('today');

        $traspatiosTotales=0;
        $traspatiosTotales1=0;
        $traspatiosTotales2=0;

        foreach ($beneficiario as $b) {

            $idPromotor=$b->idPromotor;
            $promotor=$this->Promotores->get($idPromotor);
            $b->idPromotor=$promotor->nombre." ".$promotor->apellido;


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
        
        $comunidade->traspatios=$traspatiosTotales;
        $comunidade->traspatios1=$traspatiosTotales1;
        $comunidade->traspatios2=$traspatiosTotales2;

        $this->set('year', $currentYear);
        $this->set('comunidade', $comunidade);
        $this->set('_serialize', ['comunidade']);
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
        $comunidade = $this->Comunidades->newEntity();

        $this->loadModel('Municipios');
        $options = $this->Municipios->find('list', array(
        'fields' => array('Municipios.id', 'Municipios.nombre')
        ));
        $this->set(compact('options'));

        if ($this->request->is('post')) {
            $comunidade = $this->Comunidades->patchEntity($comunidade, $this->request->data);
            if ($this->Comunidades->save($comunidade)) {
                $this->Flash->success(__('The comunidade has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The comunidade could not be saved. Please, try again.'));
        }
        $this->set(compact('comunidade'));
        $this->set('_serialize', ['comunidade']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Comunidade id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->loadModel('Municipios');
        $options = $this->Municipios->find('list', array(
        'fields' => array('Municipios.id', 'Municipios.nombre')
        ));
        $this->set(compact('options'));

        $comunidade = $this->Comunidades->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $comunidade = $this->Comunidades->patchEntity($comunidade, $this->request->data);
            if ($this->Comunidades->save($comunidade)) {
                $this->Flash->success(__('The comunidade has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The comunidade could not be saved. Please, try again.'));
        }
        $this->set(compact('comunidade'));
        $this->set('_serialize', ['comunidade']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Comunidade id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $comunidade = $this->Comunidades->get($id);
        if ($this->Comunidades->delete($comunidade)) {
            $this->Flash->success(__('The comunidade has been deleted.'));
        } else {
            $this->Flash->error(__('The comunidade could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
