<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * EnderecosPedidos Controller
 *
 * @property \App\Model\Table\EnderecosPedidosTable $EnderecosPedidos
 *
 * @method \App\Model\Entity\EnderecosPedido[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EnderecosPedidosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $enderecosPedidos = $this->paginate($this->EnderecosPedidos);

        $this->set(compact('enderecosPedidos'));
    }

    /**
     * View method
     *
     * @param string|null $id Enderecos Pedido id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $enderecosPedido = $this->EnderecosPedidos->get($id, [
            'contain' => [],
        ]);

        $this->set('enderecosPedido', $enderecosPedido);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $enderecosPedido = $this->EnderecosPedidos->newEntity();
        if ($this->request->is('post')) {
            $enderecosPedido = $this->EnderecosPedidos->patchEntity($enderecosPedido, $this->request->getData());
            if ($this->EnderecosPedidos->save($enderecosPedido)) {
                $this->Flash->success(__('The enderecos pedido has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The enderecos pedido could not be saved. Please, try again.'));
        }
        $this->set(compact('enderecosPedido'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Enderecos Pedido id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $enderecosPedido = $this->EnderecosPedidos->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $enderecosPedido = $this->EnderecosPedidos->patchEntity($enderecosPedido, $this->request->getData());
            if ($this->EnderecosPedidos->save($enderecosPedido)) {
                $this->Flash->success(__('The enderecos pedido has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The enderecos pedido could not be saved. Please, try again.'));
        }
        $this->set(compact('enderecosPedido'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Enderecos Pedido id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $enderecosPedido = $this->EnderecosPedidos->get($id);
        if ($this->EnderecosPedidos->delete($enderecosPedido)) {
            $this->Flash->success(__('The enderecos pedido has been deleted.'));
        } else {
            $this->Flash->error(__('The enderecos pedido could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
