<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * RecyclingCenters Controller
 *
 * @property \App\Model\Table\RecyclingCentersTable $RecyclingCenters
 */
class RecyclingCentersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->RecyclingCenters->find();
        $recyclingCenters = $this->paginate($query);

        $this->set(compact('recyclingCenters'));
    }

    /**
     * View method
     *
     * @param string|null $id Recycling Center id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $recyclingCenter = $this->RecyclingCenters->get($id, contain: []);
        $this->set(compact('recyclingCenter'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $recyclingCenter = $this->RecyclingCenters->newEmptyEntity();
        if ($this->request->is('post')) {
            $recyclingCenter = $this->RecyclingCenters->patchEntity($recyclingCenter, $this->request->getData());
            if ($this->RecyclingCenters->save($recyclingCenter)) {
                $this->Flash->success(__('The recycling center has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The recycling center could not be saved. Please, try again.'));
        }
        $this->set(compact('recyclingCenter'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Recycling Center id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $recyclingCenter = $this->RecyclingCenters->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $recyclingCenter = $this->RecyclingCenters->patchEntity($recyclingCenter, $this->request->getData());
            if ($this->RecyclingCenters->save($recyclingCenter)) {
                $this->Flash->success(__('The recycling center has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The recycling center could not be saved. Please, try again.'));
        }
        $this->set(compact('recyclingCenter'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Recycling Center id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $recyclingCenter = $this->RecyclingCenters->get($id);
        if ($this->RecyclingCenters->delete($recyclingCenter)) {
            $this->Flash->success(__('The recycling center has been deleted.'));
        } else {
            $this->Flash->error(__('The recycling center could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
