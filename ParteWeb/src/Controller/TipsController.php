<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Tips Controller
 *
 * @property \App\Model\Table\TipsTable $Tips
 */
class TipsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Tips->find();
        $tips = $this->paginate($query);

        $this->set(compact('tips'));
    }

    /**
     * View method
     *
     * @param string|null $id Tip id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tip = $this->Tips->get($id, contain: []);
        $this->set(compact('tip'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tip = $this->Tips->newEmptyEntity();
        if ($this->request->is('post')) {
            $tip = $this->Tips->patchEntity($tip, $this->request->getData());
            if ($this->Tips->save($tip)) {
                $this->Flash->success(__('The tip has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tip could not be saved. Please, try again.'));
        }
        $this->set(compact('tip'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Tip id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tip = $this->Tips->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tip = $this->Tips->patchEntity($tip, $this->request->getData());
            if ($this->Tips->save($tip)) {
                $this->Flash->success(__('The tip has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tip could not be saved. Please, try again.'));
        }
        $this->set(compact('tip'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Tip id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tip = $this->Tips->get($id);
        if ($this->Tips->delete($tip)) {
            $this->Flash->success(__('The tip has been deleted.'));
        } else {
            $this->Flash->error(__('The tip could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
