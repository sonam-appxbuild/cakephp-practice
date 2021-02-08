<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * SubCategories Controller
 *
 * @property \App\Model\Table\SubCategoriesTable $SubCategories
 * @method \App\Model\Entity\SubCategory[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SubCategoriesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Categories'],
        ];
        $subCategories = $this->paginate($this->SubCategories);

        $this->set(compact('subCategories'));
    }

    /**
     * View method
     *
     * @param string|null $id Sub Category id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $subCategory = $this->SubCategories->get($id, [
            'contain' => ['Categories', 'Products'],
        ]);

        $this->set(compact('subCategory'));
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $subCategory = $this->SubCategories->newEmptyEntity();
        if ($this->request->is('post')) {
            $subCategory = $this->SubCategories->patchEntity($subCategory, $this->request->getData());
            if ($this->SubCategories->save($subCategory)) {
                $this->Flash->success(__('The {0} has been saved.', 'Sub Category'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Sub Category'));
        }
        $categories = $this->SubCategories->Categories->find('list', ['limit' => 200]);
        $this->set(compact('subCategory', 'categories'));
    }


    /**
     * Edit method
     *
     * @param string|null $id Sub Category id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $subCategory = $this->SubCategories->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $subCategory = $this->SubCategories->patchEntity($subCategory, $this->request->getData());
            if ($this->SubCategories->save($subCategory)) {
                $this->Flash->success(__('The {0} has been saved.', 'Sub Category'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Sub Category'));
        }
        $categories = $this->SubCategories->Categories->find('list', ['limit' => 200]);
        $this->set(compact('subCategory', 'categories'));
    }


    /**
     * Delete method
     *
     * @param string|null $id Sub Category id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $subCategory = $this->SubCategories->get($id);
        if ($this->SubCategories->delete($subCategory)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Sub Category'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Sub Category'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
