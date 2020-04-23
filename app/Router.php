<?php

    /**
    * Router of framework
    * The class is parsing url request, & invoke 
	* necessary action of necessary controller
	*/
class Router
{
    private string $controllerByDefault;
    private string $actionByDefault;
	private string $controller;
	private string $action;
	private array  $params;
	private array  $route;

	public final function __construct($controllerByDefault, $actionByDefault)
	{
        if (isset($_GET)) {
            $this->params = $_GET;
            $this->controllerByDefault = $controllerByDefault;
            $this->actionByDefault = $actionByDefault;
            $this->controller = $this->getController();
            $this->action = $this->getAction();
        }
	}
	
	public final function run()
    {
        $c = new $this->controller();

        if (!method_exists($c, $this->action)) {
            throw new \Exception('Method doesn\'t exist');
        }

        $needleClass = new ReflectionClass($this->controller);
        $needleMethod = $needleClass->getMethod($this->action);
        $methodParams = $needleMethod->getParameters();
        $numRequiredParams = $needleMethod->getNumberOfRequiredParameters();
        $args = [];

        //if url contents arguments for action
        if (count($this->params) > 1){ 
            foreach ($methodParams as $param) {
				//filling 'args' array with  parameters from url
                $args[$param->getName()] = $this->params[$param->getName()]; 
            }
        }

        if (count($args) !== $numRequiredParams) {
            throw new \Exception('Error with arguments in url');
        }else {
            call_user_func_array([$c, $this->action], $args);
        }
    }
	
	private function getController(): string
	{
	    if(isset($this->params['r'])) {
            if (strpos($this->params['r'], '/')) {
                $this->route = explode('/', $this->params['r']);
                return ucfirst($this->route[0]) . 'Controller';
            } else {
                return ucfirst($this->params['r']) . 'Controller';
            }
        }
		
		return $this->controllerByDefault;
	}
	
	private function getAction(): string
	{
        if(isset($this->route) && $this->route[1] != null){
            return 'action' . ucfirst($this->route[1]);
        }

        return $this->actionByDefault;
	}


}


	 
	 





