<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Fornecedors Controller
 *
 * @property \App\Model\Table\FornecedorsTable $Fornecedors
 *
 * @method \App\Model\Entity\Fornecedor[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FornecedorsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $fornecedors = $this->paginate($this->Fornecedors);

        $this->set(compact('fornecedors'));
    }

    /**
     * View method
     *
     * @param string|null $id Fornecedor id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $fornecedor = $this->Fornecedors->get($id, [
            'contain' => ['Produtos'],
        ]);

        $this->set('fornecedor', $fornecedor);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $fornecedor = $this->Fornecedors->newEntity();
        if ($this->request->is('post')) {
            $fornecedor = $this->Fornecedors->patchEntity($fornecedor, $this->request->getData());
            if ($this->Fornecedors->save($fornecedor)) {
                $this->Flash->success(__('The fornecedor has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The fornecedor could not be saved. Please, try again.'));
        }
        $this->set(compact('fornecedor'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Fornecedor id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $fornecedor = $this->Fornecedors->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $fornecedor = $this->Fornecedors->patchEntity($fornecedor, $this->request->getData());
            if ($this->Fornecedors->save($fornecedor)) {
                $this->Flash->success(__('The fornecedor has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The fornecedor could not be saved. Please, try again.'));
        }
        $this->set(compact('fornecedor'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Fornecedor id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $fornecedor = $this->Fornecedors->get($id);
        if ($this->Fornecedors->delete($fornecedor)) {
            $this->Flash->success(__('The fornecedor has been deleted.'));
        } else {
            $this->Flash->error(__('The fornecedor could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
