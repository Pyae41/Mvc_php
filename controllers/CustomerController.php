<?php

namespace app\controllers;

use app\core\Controller;
use app\core\Request;
use app\models\Customer;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = new Customer();

        return $this->view('customers', [
            'customers' => $customers->all()
        ]);
    }
    public function getCreateForm()
    {
        return $this->view('create_customer');
    }

    public function saveCustomer(Request $request)
    {
        $data = $request->getAll();

        $customer = new Customer();

        $result = $customer->save($data);

        if ($result) {
            return $this->redirect("customers");
        }
    }
    public function editCustomer(Request $request)
    {

        $id = $request->getQuery("id");
        $customer = new Customer();
        $data = $customer->select($id);

        return $this->view('edit_customer', [
            'customer' => $data
        ]);
    }

    public function updateCustomer(Request $request){

        $data = $request->getAll();
        $id = $request->getQuery("id");

        $customer = new Customer();

        $result = $customer->update($id,$data);

        if($result){
            return $this->redirect("customers");
        }
    }
    public function deleteCustomer(Request $request)
    {

        $id = $request->getQuery("id");
        $customers = new Customer();

        $result = $customers->delete($id);

        if ($result) {
            return $this->redirect("customers");
        }
    }
}
