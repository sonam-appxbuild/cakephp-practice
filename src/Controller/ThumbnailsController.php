<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Thumbnails Controller
 *
 * @property \App\Model\Table\ThumbnailsTable $Thumbnails
 * @method \App\Model\Entity\Thumbnail[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ThumbnailsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $thumbnails = $this->paginate($this->Thumbnails);

        $this->set(compact('thumbnails'));
    }

    /**
     * View method
     *
     * @param string|null $id Thumbnail id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $thumbnail = $this->Thumbnails->get($id, [
            'contain' => ['Products'],
        ]);

        $this->set(compact('thumbnail'));
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $thumbnail = $this->Thumbnails->newEmptyEntity();
        if ($this->request->is('post')) {
            $thumbnail = $this->Thumbnails->patchEntity($thumbnail, $this->request->getData());
            if ($this->Thumbnails->save($thumbnail)) {
                $this->Flash->success(__('The {0} has been saved.', 'Thumbnail'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Thumbnail'));
        }
        $this->set(compact('thumbnail'));
    }


    /**
     * Edit method
     *
     * @param string|null $id Thumbnail id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $thumbnail = $this->Thumbnails->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $thumbnail = $this->Thumbnails->patchEntity($thumbnail, $this->request->getData());
            if ($this->Thumbnails->save($thumbnail)) {
                $this->Flash->success(__('The {0} has been saved.', 'Thumbnail'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Thumbnail'));
        }
        $this->set(compact('thumbnail'));
    }


    /**
     * Delete method
     *
     * @param string|null $id Thumbnail id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $thumbnail = $this->Thumbnails->get($id);
        if ($this->Thumbnails->delete($thumbnail)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Thumbnail'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Thumbnail'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
