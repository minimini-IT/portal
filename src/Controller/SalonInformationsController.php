<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * SalonInformations Controller
 *
 * @property \App\Model\Table\SalonInformationsTable $SalonInformations
 *
 * @method \App\Model\Entity\SalonInformation[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SalonInformationsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        if($this->request->is("post"))
        {
            $data = $this->request->getData();
            $query = $this->SalonInformations->find()
                ->where(function($exp) use ($data)
                {
                    return $exp->in("SalonInformations.municipalities_id", $data);
                });
        }else
        {
            $query = $this->SalonInformations;
        }
        $this->paginate = [
            'contain' => ['Municipalities'],
            "limit" => 20
        ];
        
        $salonInformations = $this->paginate($query);

        //municipalities検索用
        $this->loadModels(["Municipalities"]);
        $municipalities = $this->Municipalities->find("all")
          ->select([
            "municipalities_id",
            "name"
          ]);

        $this->set(compact('salonInformations', "municipalities"));
    }

    /**
     * View method
     *
     * @param string|null $id Salon Information id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $salonInformation = $this->SalonInformations->get($id, [
            'contain' => ['Municipalities']
        ]);

        $this->set('salonInformation', $salonInformation);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $salonInformation = $this->SalonInformations->newEntity();
        if ($this->request->is('post')) {
            $salonInformation = $this->SalonInformations->patchEntity($salonInformation, $this->request->getData());
            if ($this->SalonInformations->save($salonInformation)) {
                $this->Flash->success(__('The salon information has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The salon information could not be saved. Please, try again.'));
        }
        $municipalities = $this->SalonInformations->Municipalities->find('list', ['limit' => 200]);
        $this->set(compact('salonInformation', 'municipalities'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Salon Information id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $salonInformation = $this->SalonInformations->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $salonInformation = $this->SalonInformations->patchEntity($salonInformation, $this->request->getData());
            if ($this->SalonInformations->save($salonInformation)) {
                $this->Flash->success(__('The salon information has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The salon information could not be saved. Please, try again.'));
        }
        $municipalities = $this->SalonInformations->Municipalities->find('list', ['limit' => 200]);
        $this->set(compact('salonInformation', 'municipalities'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Salon Information id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $salonInformation = $this->SalonInformations->get($id);
        if ($this->SalonInformations->delete($salonInformation)) {
            $this->Flash->success(__('The salon information has been deleted.'));
        } else {
            $this->Flash->error(__('The salon information could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
