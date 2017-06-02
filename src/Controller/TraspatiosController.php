<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Traspatios Controller
 *
 * @property \App\Model\Table\TraspatiosTable $Traspatios
 */
class TraspatiosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $traspatios = $this->paginate($this->Traspatios);

        $this->set(compact('traspatios'));
        $this->set('_serialize', ['traspatios']);
    }

    /**
     * View method
     *
     * @param string|null $id Traspatio id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $traspatio = $this->Traspatios->get($id, [
            'contain' => []
        ]);

        $this->set('traspatio', $traspatio);
        $this->set('_serialize', ['traspatio']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->loadModel('Beneficiario');
        $options = $this->Beneficiario->find('list', array(
        'fields' => array('Beneficiario.id', 'Beneficiario.nombre')
        ));
        $this->set(compact('options'));
        $traspatio = $this->Traspatios->newEntity();
        if ($this->request->is('post')) {
            $traspatio = $this->Traspatios->patchEntity($traspatio, $this->request->data);
            if ($this->Traspatios->save($traspatio)) {
                $this->Flash->success(__('The traspatio has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The traspatio could not be saved. Please, try again.'));
        }
        $this->set(compact('traspatio'));
        $this->set('_serialize', ['traspatio']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Traspatio id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->loadModel('Beneficiario');
        $options = $this->Beneficiario->find('list', array(
        'fields' => array('Beneficiario.id', 'Beneficiario.nombre')
        ));
        $this->set(compact('options'));
        $traspatio = $this->Traspatios->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $traspatio = $this->Traspatios->patchEntity($traspatio, $this->request->data);
            if ($this->Traspatios->save($traspatio)) {
                $this->Flash->success(__('The traspatio has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The traspatio could not be saved. Please, try again.'));
        }
        $this->set(compact('traspatio'));
        $this->set('_serialize', ['traspatio']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Traspatio id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $traspatio = $this->Traspatios->get($id);
        if ($this->Traspatios->delete($traspatio)) {
            $this->Flash->success(__('The traspatio has been deleted.'));
        } else {
            $this->Flash->error(__('The traspatio could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
