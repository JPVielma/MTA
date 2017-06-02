<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Reuniones Controller
 *
 * @property \App\Model\Table\ReunionesTable $Reuniones
 */
class ReunionesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $reuniones = $this->paginate($this->Reuniones);

        $this->set(compact('reuniones'));
        $this->set('_serialize', ['reuniones']);
    }

    /**
     * View method
     *
     * @param string|null $id Reunione id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $reunione = $this->Reuniones->get($id, [
            'contain' => []
        ]);

        $this->set('reunione', $reunione);
        $this->set('_serialize', ['reunione']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $reunione = $this->Reuniones->newEntity();
        if ($this->request->is('post')) {
            $reunione = $this->Reuniones->patchEntity($reunione, $this->request->data);
            if ($this->Reuniones->save($reunione)) {
                $this->Flash->success(__('The reunione has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The reunione could not be saved. Please, try again.'));
        }
        $this->set(compact('reunione'));
        $this->set('_serialize', ['reunione']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Reunione id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $reunione = $this->Reuniones->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $reunione = $this->Reuniones->patchEntity($reunione, $this->request->data);
            if ($this->Reuniones->save($reunione)) {
                $this->Flash->success(__('The reunione has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The reunione could not be saved. Please, try again.'));
        }
        $this->set(compact('reunione'));
        $this->set('_serialize', ['reunione']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Reunione id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $reunione = $this->Reuniones->get($id);
        if ($this->Reuniones->delete($reunione)) {
            $this->Flash->success(__('The reunione has been deleted.'));
        } else {
            $this->Flash->error(__('The reunione could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
