<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * EnderecosClientes Controller
 *
 * @property \App\Model\Table\EnderecosClientesTable $EnderecosClientes
 *
 * @method \App\Model\Entity\EnderecosCliente[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EnderecosClientesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Clientes'],
        ];
        $enderecosClientes = $this->paginate($this->EnderecosClientes);

        $this->set(compact('enderecosClientes'));
    }

    /**
     * View method
     *
     * @param string|null $id Enderecos Cliente id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $enderecosCliente = $this->EnderecosClientes->get($id, [
            'contain' => ['Clientes'],
        ]);

        $this->set('enderecosCliente', $enderecosCliente);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $enderecosCliente = $this->EnderecosClientes->newEntity();
        if ($this->request->is('post')) {
            $enderecosCliente = $this->EnderecosClientes->patchEntity($enderecosCliente, $this->request->getData());
            if ($this->EnderecosClientes->save($enderecosCliente)) {
                $this->Flash->success(__('The enderecos cliente has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The enderecos cliente could not be saved. Please, try again.'));
        }
        $clientes = $this->EnderecosClientes->Clientes->find('list', ['limit' => 200]);
        $this->set(compact('enderecosCliente', 'clientes'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Enderecos Cliente id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $enderecosCliente = $this->EnderecosClientes->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $enderecosCliente = $this->EnderecosClientes->patchEntity($enderecosCliente, $this->request->getData());
            if ($this->EnderecosClientes->save($enderecosCliente)) {
                $this->Flash->success(__('The enderecos cliente has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The enderecos cliente could not be saved. Please, try again.'));
        }
        $clientes = $this->EnderecosClientes->Clientes->find('list', ['limit' => 200]);
        $this->set(compact('enderecosCliente', 'clientes'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Enderecos Cliente id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $enderecosCliente = $this->EnderecosClientes->get($id);
        if ($this->EnderecosClientes->delete($enderecosCliente)) {
            $this->Flash->success(__('The enderecos cliente has been deleted.'));
        } else {
            $this->Flash->error(__('The enderecos cliente could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
