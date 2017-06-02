<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Comunidad Controller
 *
 * @property \App\Model\Table\ComunidadTable $Comunidad
 */
class ComunidadController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $comunidad = $this->paginate($this->Comunidad);

        $this->set(compact('comunidad'));
        $this->set('_serialize', ['comunidad']);
    }

    /**
     * View method
     *
     * @param string|null $id Comunidad id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->loadModel('Promotores');
        $promotores = $this->paginate($this->Promotores);

        $this->set(compact('promotores'));
        $this->set('_serialize', ['promotores']);

        $comunidad = $this->Comunidad->get($id, [
            'contain' => []
        ]);

        $this->set('comunidad', $comunidad);
        $this->set('_serialize', ['comunidad']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $comunidad = $this->Comunidad->newEntity();
        if ($this->request->is('post')) {
            $comunidad = $this->Comunidad->patchEntity($comunidad, $this->request->data);
            if ($this->Comunidad->save($comunidad)) {
                $this->Flash->success(__('The comunidad has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The comunidad could not be saved. Please, try again.'));
        }
        $this->set(compact('comunidad'));
        $this->set('_serialize', ['comunidad']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Comunidad id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $comunidad = $this->Comunidad->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $comunidad = $this->Comunidad->patchEntity($comunidad, $this->request->data);
            if ($this->Comunidad->save($comunidad)) {
                $this->Flash->success(__('The comunidad has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The comunidad could not be saved. Please, try again.'));
        }
        $this->set(compact('comunidad'));
        $this->set('_serialize', ['comunidad']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Comunidad id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $comunidad = $this->Comunidad->get($id);
        if ($this->Comunidad->delete($comunidad)) {
            $this->Flash->success(__('The comunidad has been deleted.'));
        } else {
            $this->Flash->error(__('The comunidad could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
