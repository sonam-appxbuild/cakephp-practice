<?php

namespace App\Controller\Api;

use App\Controller\Api\AppController;
//use App\Controller\Api\AppController;
use App\Shell\RESTfulAPI;
use Cake\Event\Event;
use Cake\Network\Exception\UnauthorizedException;
use Cake\Utility\Security;
use Firebase\JWT\JWT;
use Cake\Core\Configure;
use Cake\Routing\Router;
use Cake\Mailer\Email;
use Cake\Mailer\TransportFactory;
use Cake\Auth\DefaultPasswordHasher;
use Dompdf\Dompdf;
use Dompdf\Options;
use Spipu\Html2Pdf\Html2Pdf;


class ImageTemplateController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        //TODO : below code should be commented before going live
        $this->Auth->allow(['view']);
    }

    public function view() {
        $product_id = $this->getRequest()->getQueryParams()['product_id'];
        $isOffer = $this->getRequest()->getQueryParams()['offer'];
        // $url = $this->getRequest()->getQueryParams()['url'];
        $name=null;
        $brand=null;
        $code=null;
        $img_url=null;
        $this->loadModel('Products');
        if (isset($product_id)) {
            $products = $this->Products->find('all')
                ->contain('Images')
                ->where(['Products.id' => $product_id])
                ->first();

            $this->log($products, 'info');

            $url = 'http://api-acmesafety.o2t2.com/api/PDFTemplate/view.pdf?product_id='.$product_id . '&offer='.$isOffer;

//
            $milliseconds = round(microtime(true) * 1000);
            $file_name =  $milliseconds . '_'.$product_id .'.'. 'pdf';;
            file_put_contents(WWW_ROOT . 'uploads/'.$file_name, fopen($url, 'r'));

            $im = new \Imagick();
            // $im->setResolution(350, 350);
            $im->setResolution(300, 300);
            $im->readImage(WWW_ROOT . 'uploads/'.$file_name);
            $im->setImageFormat("jpeg");
            $img_name = 'Safewell - '.$code . '.jpeg';
            $im->setImageCompression(\Imagick::COMPRESSION_JPEG);
            $im->setImageCompressionQuality(100);
            $im->writeImage(WWW_ROOT . 'uploads/' . $img_name);
            $im->clear();
            $im->destroy();

            // Send file as response
            $this->response->file(
                WWW_ROOT . 'uploads/' . $img_name,
                array(
                    'download' => true,
                    'name' => $img_name
                )
            );

            return $this->response;
        }
    }
}
