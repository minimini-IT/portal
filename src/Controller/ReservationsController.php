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
    public function add($datetime = null)
    {
        $reservation = $this->Reservations->newEntity();
        //post->reservationsとreservationDatetime両方saveする
        //if ($this->request->is('post')) {
            //セッション開始
            //$session = $this->request->session();

            //$this->loadModels(["ReservationDatetimes"]);
            //$data = $this->request->getData();

            //menuいらない
            //unset($data["menu"]);

            //patchEntity用に整形
            //$datetime_entity = ["reservation_datetime" => $data["reservation_datetime"]];
            //unset($data["reservation_datetime"]);
            /*
            $datetime_entity = [
              "name" => $session->read("Reservation.name"),
              "menu_id" => $session->read("Reservation.menu_id"),
              "tel" => $session->read("Reservation.tel"),
              "mail" => $session->read("Reservation.mail"),
              "reservation_datetimes_id" => $session->read()
            )];

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
             */

        // \DateTime \入れないとエラー出る
        $datetime = new \DateTime($datetime);

        //sessionに格納
        $session = $this->request->session();
        $session->write("Reservation.datetime", $datetime);

        $menus = $this->Reservations->Menus->find('list', ['limit' => 200]);
        $this->set(compact('reservation', 'menus', "datetime"));
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
            //$reservation_confirmation["menu"] = $this->Reservations->Menus->find('list', ['limit' => 1])
            $reservation_menu = $this->Reservations->Menus->find('list', ['limit' => 1])
              ->select(["menu"])
              ->where(["menus_id" => $reservation_confirmation["menus_id"]])
              ->first();
            //セッション格納
            $session = $this->request->session();
            $session->write([
              "Reservation.name" => $reservation_confirmation["name"],
              "Reservation.menu" => $reservation_menu,
              "Reservation.menus_id" => $reservation_confirmation["menus_id"],
              "Reservation.tel" => $reservation_confirmation["tel"],
              "Reservation.mail" => $reservation_confirmation["mail"]
            ]);
            //確認用予約予定時間
            //$datetime = ["reservation_datetime" => $session->read("Reservation.datetime")];
            $datetime = $session->read("Reservation.datetime");


            $this->set(compact('reservation_confirmation', "reservation_menu", "datetime"));
        }
    }

    public function reservation($id = null)
    {
      if(isset($id)){
          $reservation = $this->Reservations->newEntity();
          //セッション開始
          $session = $this->request->session();
          $reservation_entity = [
            "name" => $session->read("Reservation.name"),
            "menus_id" => $session->read("Reservation.menus_id"),
            "tel" => $session->read("Reservation.tel"),
            "mail" => $session->read("Reservation.mail"),
            "reservation_datetimes_id" => $id
          ];
          $reservation = $this->Reservations->patchEntity($reservation, $reservation_entity);
          if ($this->Reservations->save($reservation)) {
              $this->Flash->success(__('The reservation has been saved.'));
              $session->destroy();
              return $this->redirect(["controller" => "ReservationDatetimes", 'action' => 'index']);
          }
          
          $this->Flash->error(__('The reservation could not be saved. Please, try again.'));
          $session->destroy();
      }
    }
}
