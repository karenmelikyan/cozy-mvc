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
         $this->render('adminView',[
             'dbData' => (new DBModel('users'))->getAll()
         ]);
     }

     public function actionSignup()
     {
         /** signup logic is delegated to UserModel class*/
         $message = (new UserModel())->signUp($_POST);

         /** if anything wrong `$message` isn't empty */
         /** show to user the message about mistake */
         $this->render('adminView',[
             'dbData' => (new DBModel('users'))->getAll()
         ]);
     }

}


