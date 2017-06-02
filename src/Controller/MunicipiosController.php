<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Municipios Controller
 *
 * @property \App\Model\Table\MunicipiosTable $Municipios
 */
class MunicipiosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $municipios = $this->paginate($this->Municipios);
        $this->loadModel('Estados');

        foreach($municipios as $municipio){
            $id=$municipio->idEstado;
            $estado=$this->Estados->get($id);
            $municipio->idEstado=$estado->nombre;
        }

        $this->set(compact('municipios'));
        $this->set('_serialize', ['municipios']);
    }

    /**
     * View method
     *
     * @param string|null $id Municipio id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $municipio = $this->Municipios->get($id, [
            'contain' => []
        ]);
        $this->loadModel('Estados');
        $this->loadModel('Comunidades');

        $estado=$this->Estados->get($municipio->idEstado);
        $municipio->estado=$estado->nombre;

        $comunidades = $this->paginate($this->Comunidades->find('all', [
            'conditions' => ['Comunidades.idMunicipio' => $id]
            ]));

        $this->set('comunidades', $comunidades);
        $this->set('municipio', $municipio);
        $this->set('_serialize', ['municipio']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->loadModel('Estados');
        $options = $this->Estados->find('list', array(
        'fields' => array('Estados.id', 'Estados.nombre')
        ));
        $this->set(compact('options'));
        $municipio = $this->Municipios->newEntity();
        if ($this->request->is('post')) {
            $municipio = $this->Municipios->patchEntity($municipio, $this->request->data);
            if ($this->Municipios->save($municipio)) {
                $this->Flash->success(__('El municipio ha sido guardado exitosamente.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('No se pudo guardar el municipio exitosamente. Intentelo más tarde.'));
        }
        $this->set(compact('municipio'));
        $this->set('_serialize', ['municipio']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Municipio id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->loadModel('Estados');
        $options = $this->Estados->find('list', array(
        'fields' => array('Estados.id', 'Estados.nombre')
        ));
        $this->set(compact('options'));
        $municipio = $this->Municipios->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $municipio = $this->Municipios->patchEntity($municipio, $this->request->data);
            if ($this->Municipios->save($municipio)) {
                $this->Flash->success(__('El municipio ha sido guardado exitosamente.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('No se pudo guardar el municipio exitosamente. Intentelo más tarde.'));
        }
        $this->set(compact('municipio'));
        $this->set('_serialize', ['municipio']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Municipio id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $municipio = $this->Municipios->get($id);
        if ($this->Municipios->delete($municipio)) {
            $this->Flash->success(__('El municipio ha sido eliminado.'));
        } else {
            $this->Flash->error(__('No se pudo eliminar el municipio en estos momentos.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
