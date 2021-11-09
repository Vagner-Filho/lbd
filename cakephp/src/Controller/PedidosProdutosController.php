<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PedidosProdutos Controller
 *
 * @property \App\Model\Table\PedidosProdutosTable $PedidosProdutos
 *
 * @method \App\Model\Entity\PedidosProduto[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PedidosProdutosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Pedidos', 'Produtos'],
        ];
        $pedidosProdutos = $this->paginate($this->PedidosProdutos);

        $this->set(compact('pedidosProdutos'));
    }

    /**
     * View method
     *
     * @param string|null $id Pedidos Produto id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $pedidosProduto = $this->PedidosProdutos->get($id, [
            'contain' => ['Pedidos', 'Produtos'],
        ]);

        $this->set('pedidosProduto', $pedidosProduto);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $pedidosProduto = $this->PedidosProdutos->newEntity();
        if ($this->request->is('post')) {
            $pedidosProduto = $this->PedidosProdutos->patchEntity($pedidosProduto, $this->request->getData());
            if ($this->PedidosProdutos->save($pedidosProduto)) {
                $this->Flash->success(__('The pedidos produto has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pedidos produto could not be saved. Please, try again.'));
        }
        $pedidos = $this->PedidosProdutos->Pedidos->find('list', ['limit' => 200]);
        $produtos = $this->PedidosProdutos->Produtos->find('list', ['limit' => 200]);
        $this->set(compact('pedidosProduto', 'pedidos', 'produtos'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Pedidos Produto id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $pedidosProduto = $this->PedidosProdutos->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pedidosProduto = $this->PedidosProdutos->patchEntity($pedidosProduto, $this->request->getData());
            if ($this->PedidosProdutos->save($pedidosProduto)) {
                $this->Flash->success(__('The pedidos produto has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pedidos produto could not be saved. Please, try again.'));
        }
        $pedidos = $this->PedidosProdutos->Pedidos->find('list', ['limit' => 200]);
        $produtos = $this->PedidosProdutos->Produtos->find('list', ['limit' => 200]);
        $this->set(compact('pedidosProduto', 'pedidos', 'produtos'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Pedidos Produto id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $pedidosProduto = $this->PedidosProdutos->get($id);
        if ($this->PedidosProdutos->delete($pedidosProduto)) {
            $this->Flash->success(__('The pedidos produto has been deleted.'));
        } else {
            $this->Flash->error(__('The pedidos produto could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
