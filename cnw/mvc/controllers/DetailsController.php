<?php
require_once ROOT . DS . 'mvc' . DS . 'controllers' . DS . 'Controller.php';
require_once ROOT . DS . 'mvc' . DS . 'controllers' . DS . 'DefaultController.php';

class DetailsController extends DefaultController implements Controller {
		private $id; 					// int

		public function __construct($id){
				$this->id = $id;
		}

		public function __render(){
        self::rendernewsdetail($this->id);
    }

    public function rendernewsdetail($product_id) {
        require_once ROOT . DS . 'mvc' . DS . 'models' . DS . 'products' . DS . 'Type.php';
        require_once ROOT . DS . 'application' . DS . 'products' . DS . 'LaptopApplication.php';
        require_once ROOT . DS . 'application' . DS . 'products' . DS . 'MouseProductsApplication.php';
        require_once ROOT . DS . 'application' . DS . 'TypeProductsApplication.php';
        require_once ROOT . DS . 'mvc' . DS . 'models' . DS . 'products' . DS . 'Laptop.php';
        require_once ROOT . DS . 'mvc' . DS . 'models'.  DS . 'products' . DS . 'PC.php';
        require_once ROOT . DS . 'mvc' . DS . 'models'.  DS . 'products' . DS . 'MouseProducts.php';

        $check = TypeProductsApplication::checkType($product_id);
				$service = new LaptopApplication();

        if($check == Type::LAP) {
            $service = new LaptopApplication();
        }
        else {
            $service = new MouseProductsApplication();
        }

				$product = $service->get($product_id);
				include ROOT . DS . 'mvc' . DS . 'views' . DS . 'detail.php';
    }
}
