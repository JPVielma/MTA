<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Atributos Controller
 *
 * @property \App\Model\Table\AtributosTable $Atributos
 */
class AtributosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $atributos = $this->paginate($this->Atributos);

        $this->set(compact('atributos'));
        $this->set('_serialize', ['atributos']);
    }

    /**
     * View method
     *
     * @param string|null $id Atributo id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $atributo = $this->Atributos->get($id, [
            'contain' => []
        ]);

        $this->set('atributo', $atributo);
        $this->set('_serialize', ['atributo']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $atributo = $this->Atributos->newEntity();
        if ($this->request->is('post')) {
            $atributo = $this->Atributos->patchEntity($atributo, $this->request->data);
            if ($this->Atributos->save($atributo)) {
                $this->Flash->success(__('The atributo has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The atributo could not be saved. Please, try again.'));
        }
        $this->set(compact('atributo'));
        $this->set('_serialize', ['atributo']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Atributo id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $atributo = $this->Atributos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $atributo = $this->Atributos->patchEntity($atributo, $this->request->data);
            if ($this->Atributos->save($atributo)) {
                $this->Flash->success(__('The atributo has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The atributo could not be saved. Please, try again.'));
        }
        $this->set(compact('atributo'));
        $this->set('_serialize', ['atributo']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Atributo id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $atributo = $this->Atributos->get($id);
        if ($this->Atributos->delete($atributo)) {
            $this->Flash->success(__('The atributo has been deleted.'));
        } else {
            $this->Flash->error(__('The atributo could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
