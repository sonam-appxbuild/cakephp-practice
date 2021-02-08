<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * ListOfSchools Controller
 *
 * @property \App\Model\Table\ListOfSchoolsTable $ListOfSchools
 * @method \App\Model\Entity\ListOfSchool[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ListOfSchoolsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $listOfSchools = $this->paginate($this->ListOfSchools);

        $this->set(compact('listOfSchools'));
    }

    /**
     * View method
     *
     * @param string|null $id List Of School id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $listOfSchool = $this->ListOfSchools->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('listOfSchool'));
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $listOfSchool = $this->ListOfSchools->newEmptyEntity();
        if ($this->request->is('post')) {
            $listOfSchool = $this->ListOfSchools->patchEntity($listOfSchool, $this->request->getData());
            if ($this->ListOfSchools->save($listOfSchool)) {
                $this->Flash->success(__('The {0} has been saved.', 'List Of School'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'List Of School'));
        }
        $this->set(compact('listOfSchool'));
    }


    /**
     * Edit method
     *
     * @param string|null $id List Of School id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $listOfSchool = $this->ListOfSchools->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $listOfSchool = $this->ListOfSchools->patchEntity($listOfSchool, $this->request->getData());
            if ($this->ListOfSchools->save($listOfSchool)) {
                $this->Flash->success(__('The {0} has been saved.', 'List Of School'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'List Of School'));
        }
        $this->set(compact('listOfSchool'));
    }


    /**
     * Delete method
     *
     * @param string|null $id List Of School id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $listOfSchool = $this->ListOfSchools->get($id);
        if ($this->ListOfSchools->delete($listOfSchool)) {
            $this->Flash->success(__('The {0} has been deleted.', 'List Of School'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'List Of School'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
