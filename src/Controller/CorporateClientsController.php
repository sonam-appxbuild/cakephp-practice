<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * CorporateClients Controller
 *
 * @property \App\Model\Table\CorporateClientsTable $CorporateClients
 * @method \App\Model\Entity\CorporateClient[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CorporateClientsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $corporateClients = $this->paginate($this->CorporateClients);

        $this->set(compact('corporateClients'));
    }

    /**
     * View method
     *
     * @param string|null $id Corporate Client id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $corporateClient = $this->CorporateClients->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('corporateClient'));
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $corporateClient = $this->CorporateClients->newEmptyEntity();
        if ($this->request->is('post')) {
            $corporateClient = $this->CorporateClients->patchEntity($corporateClient, $this->request->getData());
            if ($this->CorporateClients->save($corporateClient)) {
                $this->Flash->success(__('The {0} has been saved.', 'Corporate Client'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Corporate Client'));
        }
        $this->set(compact('corporateClient'));
    }


    /**
     * Edit method
     *
     * @param string|null $id Corporate Client id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $corporateClient = $this->CorporateClients->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $corporateClient = $this->CorporateClients->patchEntity($corporateClient, $this->request->getData());
            if ($this->CorporateClients->save($corporateClient)) {
                $this->Flash->success(__('The {0} has been saved.', 'Corporate Client'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Corporate Client'));
        }
        $this->set(compact('corporateClient'));
    }


    /**
     * Delete method
     *
     * @param string|null $id Corporate Client id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $corporateClient = $this->CorporateClients->get($id);
        if ($this->CorporateClients->delete($corporateClient)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Corporate Client'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Corporate Client'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
