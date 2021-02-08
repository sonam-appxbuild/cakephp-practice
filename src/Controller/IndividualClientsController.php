<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * IndividualClients Controller
 *
 * @property \App\Model\Table\IndividualClientsTable $IndividualClients
 * @method \App\Model\Entity\IndividualClient[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class IndividualClientsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $individualClients = $this->paginate($this->IndividualClients);

        $this->set(compact('individualClients'));
    }

    /**
     * View method
     *
     * @param string|null $id Individual Client id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $individualClient = $this->IndividualClients->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('individualClient'));
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $individualClient = $this->IndividualClients->newEmptyEntity();
        if ($this->request->is('post')) {
            $individualClient = $this->IndividualClients->patchEntity($individualClient, $this->request->getData());
            if ($this->IndividualClients->save($individualClient)) {
                $this->Flash->success(__('The {0} has been saved.', 'Individual Client'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Individual Client'));
        }
        $this->set(compact('individualClient'));
    }


    /**
     * Edit method
     *
     * @param string|null $id Individual Client id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $individualClient = $this->IndividualClients->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $individualClient = $this->IndividualClients->patchEntity($individualClient, $this->request->getData());
            if ($this->IndividualClients->save($individualClient)) {
                $this->Flash->success(__('The {0} has been saved.', 'Individual Client'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Individual Client'));
        }
        $this->set(compact('individualClient'));
    }


    /**
     * Delete method
     *
     * @param string|null $id Individual Client id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $individualClient = $this->IndividualClients->get($id);
        if ($this->IndividualClients->delete($individualClient)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Individual Client'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Individual Client'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
