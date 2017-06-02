<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Respuestas Controller
 *
 * @property \App\Model\Table\RespuestasTable $Respuestas
 */
class RespuestasController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $respuestas = $this->paginate($this->Respuestas);

        $this->set(compact('respuestas'));
        $this->set('_serialize', ['respuestas']);
    }

    /**
     * View method
     *
     * @param string|null $id Respuesta id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $respuesta = $this->Respuestas->get($id, [
            'contain' => []
        ]);

        $this->set('respuesta', $respuesta);
        $this->set('_serialize', ['respuesta']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $respuesta = $this->Respuestas->newEntity();
        if ($this->request->is('post')) {
            $respuesta = $this->Respuestas->patchEntity($respuesta, $this->request->data);
            if ($this->Respuestas->save($respuesta)) {
                $this->Flash->success(__('The respuesta has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The respuesta could not be saved. Please, try again.'));
        }
        $this->set(compact('respuesta'));
        $this->set('_serialize', ['respuesta']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Respuesta id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $respuesta = $this->Respuestas->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $respuesta = $this->Respuestas->patchEntity($respuesta, $this->request->data);
            if ($this->Respuestas->save($respuesta)) {
                $this->Flash->success(__('The respuesta has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The respuesta could not be saved. Please, try again.'));
        }
        $this->set(compact('respuesta'));
        $this->set('_serialize', ['respuesta']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Respuesta id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $respuesta = $this->Respuestas->get($id);
        if ($this->Respuestas->delete($respuesta)) {
            $this->Flash->success(__('The respuesta has been deleted.'));
        } else {
            $this->Flash->error(__('The respuesta could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
