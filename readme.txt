

URLs rules:
      domain/ - controller & action for home page, defined in header index.php file
      domain/index.php?r=controller/action&id=parameter


Rules of controllers:

      use mvc\app\Controller;
      class NameController extends Controller
      {
      }

Rules of actions:

      public function actionName($id)
      {
      }



