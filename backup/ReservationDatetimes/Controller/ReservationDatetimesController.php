<?php
namespace App\Controller;

use App\Controller\AppController;
/*
use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;
use Cake\Controller\Component\getDaysOfMonth;
 */

/**
 * ReservationDatetimes Controller
 *
 * @property \App\Model\Table\ReservationDatetimesTable $ReservationDatetimes
 *
 * @method \App\Model\Entity\ReservationDatetime[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ReservationDatetimesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
      /*
      CarendarComponentのgatDaysOfMonth呼び出し
      $addMonth = 0;
      $this->Carendar = $this->loadComponent("Carendar");
      $daysOfMonth = $this->Carendar->getDaysOfMonth(0);
      $this->set(compact('daysOfMonth'));
       */
        $reservationDatetimes = $this->paginate($this->ReservationDatetimes);
        $this->set(compact('reservationDatetimes'));
    }

    /**
     * View method
     *
     * @param string|null $id Reservation Datetime id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $reservationDatetime = $this->ReservationDatetimes->get($id, [
            'contain' => []
        ]);

        $this->set('reservationDatetime', $reservationDatetime);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $reservationDatetime = $this->ReservationDatetimes->newEntity();
        if ($this->request->is('post')) {
            $reservationDatetime = $this->ReservationDatetimes->patchEntity($reservationDatetime, $this->request->getData());
            if ($this->ReservationDatetimes->save($reservationDatetime)) {
                $this->Flash->success(__('The reservation datetime has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The reservation datetime could not be saved. Please, try again.'));
        }
        $this->set(compact('reservationDatetime'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Reservation Datetime id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $reservationDatetime = $this->ReservationDatetimes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $reservationDatetime = $this->ReservationDatetimes->patchEntity($reservationDatetime, $this->request->getData());
            if ($this->ReservationDatetimes->save($reservationDatetime)) {
                $this->Flash->success(__('The reservation datetime has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The reservation datetime could not be saved. Please, try again.'));
        }
        $this->set(compact('reservationDatetime'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Reservation Datetime id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $reservationDatetime = $this->ReservationDatetimes->get($id);
        if ($this->ReservationDatetimes->delete($reservationDatetime)) {
            $this->Flash->success(__('The reservation datetime has been deleted.'));
        } else {
            $this->Flash->error(__('The reservation datetime could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
