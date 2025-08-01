<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Detections Controller
 *
 * @property \App\Model\Table\DetectionsTable $Detections
 */
class DetectionsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Detections->find()
            ->contain(['Users', 'Locations']);
        $detections = $this->paginate($query);

        $this->set(compact('detections'));
    }

    /**
     * View method
     *
     * @param string|null $id Detection id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $detection = $this->Detections->get($id, contain: ['Users', 'Locations']);
        $this->set(compact('detection'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $detection = $this->Detections->newEmptyEntity();
        if ($this->request->is('post')) {
            $detection = $this->Detections->patchEntity($detection, $this->request->getData());
            if ($this->Detections->save($detection)) {
                $this->Flash->success(__('The detection has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The detection could not be saved. Please, try again.'));
        }
        $users = $this->Detections->Users->find('list', limit: 200)->all();
        $locations = $this->Detections->Locations->find('list', limit: 200)->all();
        $this->set(compact('detection', 'users', 'locations'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Detection id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $detection = $this->Detections->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $detection = $this->Detections->patchEntity($detection, $this->request->getData());
            if ($this->Detections->save($detection)) {
                $this->Flash->success(__('The detection has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The detection could not be saved. Please, try again.'));
        }
        $users = $this->Detections->Users->find('list', limit: 200)->all();
        $locations = $this->Detections->Locations->find('list', limit: 200)->all();
        $this->set(compact('detection', 'users', 'locations'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Detection id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $detection = $this->Detections->get($id);
        if ($this->Detections->delete($detection)) {
            $this->Flash->success(__('The detection has been deleted.'));
        } else {
            $this->Flash->error(__('The detection could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
