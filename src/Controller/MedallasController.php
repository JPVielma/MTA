<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Medallas Controller
 *
 * @property \App\Model\Table\MedallasTable $Medallas
 */
class MedallasController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $medallas = $this->paginate($this->Medallas);

        $this->set(compact('medallas'));
        $this->set('_serialize', ['medallas']);
    }

    /**
     * View method
     *
     * @param string|null $id Medalla id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $medalla = $this->Medallas->get($id, [
            'contain' => []
        ]);

        $this->set('medalla', $medalla);
        $this->set('_serialize', ['medalla']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $medalla = $this->Medallas->newEntity();
        if ($this->request->is('post')) {
            $medalla = $this->Medallas->patchEntity($medalla, $this->request->data);
            if ($this->Medallas->save($medalla)) {
                $this->Flash->success(__('The medalla has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The medalla could not be saved. Please, try again.'));
        }
        $this->set(compact('medalla'));
        $this->set('_serialize', ['medalla']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Medalla id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $medalla = $this->Medallas->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $medalla = $this->Medallas->patchEntity($medalla, $this->request->data);
            if ($this->Medallas->save($medalla)) {
                $this->Flash->success(__('The medalla has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The medalla could not be saved. Please, try again.'));
        }
        $this->set(compact('medalla'));
        $this->set('_serialize', ['medalla']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Medalla id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $medalla = $this->Medallas->get($id);
        if ($this->Medallas->delete($medalla)) {
            $this->Flash->success(__('The medalla has been deleted.'));
        } else {
            $this->Flash->error(__('The medalla could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
