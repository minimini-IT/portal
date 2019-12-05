<?php
namespace App\Controller;

use App\Controller\AppController;

//$this->log(, LOG_DEBUG);

/**
 * Reservations Controller
 *
 * @property \App\Model\Table\ReservationsTable $Reservations
 *
 * @method \App\Model\Entity\Reservation[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ReservationsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Menus']
        ];
        $reservations = $this->paginate($this->Reservations);

        $this->set(compact('reservations'));
    }

    /**
     * View method
     *
     * @param string|null $id Reservation id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $reservation = $this->Reservations->get($id, [
            'contain' => ['Menus']
        ]);

        $this->set('reservation', $reservation);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($reservation_datetime = null)
    {
        $reservation = $this->Reservations->newEntity();
        //post->reservationsとreservationDatetime両方saveする
        if ($this->request->is('post')) {
            $this->loadModels(["ReservationDatetimes"]);
            $data = $this->request->getData();

            //menuいらない
            unset($data["menu"]);

            //patchEntity用に整形
            $datetime_entity = ["reservation_datetime" => $data["reservation_datetime"]];
            unset($data["reservation_datetime"]);

            $reservationDatetime = $this->ReservationDatetimes->newEntity();
            $reservationDatetime = $this->ReservationDatetimes->patchEntity($reservationDatetime, $datetime_entity);
            $reservation = $this->Reservations->patchEntity($reservation, $data);

            //reservationsはreservation_datetime_idが必要なので先にreservationDatetimeをsave
            if ($this->ReservationDatetime->save($reservationDatetime)) {
              if ($this->Reservations->save($reservation)) {
                  $this->Flash->success(__('The reservation has been saved.'));
                  return $this->redirect(['action' => 'index']);
              }
            }
            $this->Flash->error(__('The reservation could not be saved. Please, try again.'));
        }

        // \DateTime \入れないとエラー出る
        $reservation_datetime = new \DateTime($reservation_datetime);
        $menus = $this->Reservations->Menus->find('list', ['limit' => 200]);
        $this->set(compact('reservation', 'menus', "reservation_datetime"));
    }

    /**
     * Edit method
     *
     * @param string|null $id Reservation id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $reservation = $this->Reservations->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $reservation = $this->Reservations->patchEntity($reservation, $this->request->getData());
            if ($this->Reservations->save($reservation)) {
                $this->Flash->success(__('The reservation has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The reservation could not be saved. Please, try again.'));
        }
        $menus = $this->Reservations->Menus->find('list', ['limit' => 200]);
        $this->set(compact('reservation', 'menus'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Reservation id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $reservation = $this->Reservations->get($id);
        if ($this->Reservations->delete($reservation)) {
            $this->Flash->success(__('The reservation has been deleted.'));
        } else {
            $this->Flash->error(__('The reservation could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    //予約情報の確認
    public function confirmation(){
        if ($this->request->is('post')) {
            $reservation_confirmation = $this->request->getData();
            //$reservation_confirmation["menus_id"] = $this->Reservations->Menus->find('list', ['limit' => 1])
            $reservation_confirmation["menu"] = $this->Reservations->Menus->find('list', ['limit' => 1])
              ->select(["menu"])
              ->where(["menus_id" => $reservation_confirmation["menus_id"]])
              ->first();
            $this->set(compact('reservation_confirmation'));
        }
    }
}
