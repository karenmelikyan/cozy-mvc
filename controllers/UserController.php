<?php

use mvc\app\Controller;

class UserController extends Controller
{
     public function actionIndex()
     {
         $this->render('userView');
     }

     public function actionAdmin()
     {
         /** show all data from database */
         $this->render('adminView',[
             'dbData' => (new DBModel('users'))->getAll()
         ]);
     }

     public function actionSignup()
     {
         /** signup logic is delegated to UserModel class*/
         $message = (new UserModel())->signUp($_POST);

         /** show all data from database */
         $this->render('adminView',[
             'dbData' => (new DBModel('users'))->getAll()
         ]);
     }

}


