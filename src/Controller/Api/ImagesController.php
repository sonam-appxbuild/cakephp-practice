<?php
namespace App\Controller\Api;

use App\Controller\Api\AppController;
//use App\Controller\Api\AppController;

class ImagesController extends AppController
{
    public $paginate = [
        'page' => 1,
        'limit' => 500,
        'maxLimit' => 500,
        'sortWhitelist' => [
            'id', 'name'
        ]
    ];
    public function initialize() {
        parent::initialize();
        $this->Auth->allow(['upload','uploadProductImage']);
        $this->Auth->deny(['index','add','edit','view','delete']);
    }

    public function testImage(){
        $filename = WWW_ROOT."img/croppie.jpg";
        $this->log($filename, 'info');
        $newFilename = $this->newFileName($filename);

        $imageSize = getimagesize($filename);  //getting file size
        $currentWidth = $imageSize[0];
        $currentHeight = $imageSize[1];

        $left =  180;           //left is from image position property like in css from top left
        $top = 120;            //top is the image position property like in css from top left

        $cropWidth = 920;      // if the above size is 100 and 100 so the cropping point starts from there to 800px
        $cropHeight = 720;     //if the above size is 100 and 100 so the cropping point starts from there to 500px

        $canvas = imagecreatetruecolor($cropWidth, $cropHeight);
        $currentImage = $this->imagecreatefromfile($filename);

        imagecopy($canvas,$currentImage,0,0,$left,$top,$currentWidth,$currentHeight);

        // 1 value which is defined here should be ranging from 0-9
        $this->getimage($filename,$canvas,$newFilename);
        echo 'Image Cropped Successfully';
        exit;
    }

    public function upload()
    {
        $data = $this->request->getData();
        $this->log('-------------->>', 'info');
        $this->log( $data, 'info');
        if (!empty($data['image']['name'])) {
            $file_name = $data['image']['name'];
            $tableModel = $this->Images;
            $entity = $this->Images->newEntity();
            $table_name = 'images';
            $input_name = 'image';
            $this->uploadFile($file_name, $entity, $tableModel, $table_name, $data, $input_name);
//            $this->uploadThumbnailFile($file_name, $entity, $tableModel, $table_name, $data, $input_name);
        }
    }

    public function uploadProductImage()
    {
        $data = $this->request->getData();
        $this->log('-------------->>', 'info');
        $this->log( $data, 'info');
        $fileinfo = @getimagesize($data["image"]["tmp_name"]);
        $width = $fileinfo[0];
        $height = $fileinfo[1];
        $this->log('width ='.$width,'info');
        $this->log('height ='.$height,'info');

        if($width != PRODUCT_IMAGE_WIDTH && $height != PRODUCT_IMAGE_HEIGHT){
            $this->set([
                'success' => false,
                'data' => ['error_code'=>1001,'error_message'=>'Please upload file with 1289x980 dimension']
            ]);
            $this->set('_serialize', ['success', 'data']);
            return;
        }


        if (!empty($data['image']['name'])) {
            $file_name = $data['image']['name'];
            $tableModel = $this->Images;
            $entity = $this->Images->newEntity();
            $table_name = 'images';
            $input_name = 'image';
            $this->uploadFile($file_name, $entity, $tableModel, $table_name, $data, $input_name);
//            $this->uploadThumbnailFile($file_name, $entity, $tableModel, $table_name, $data, $input_name);
        }
    }

    public function uploadThumbnailFile($file_name, $entity, $tableModel, $table_name, $data, $input_name){

        $this->log('-------inside uploadThumbnailFile------->>', 'info');
        $this->log('-------inside uploadThumbnailFile------->>', 'info');
//        $filename = "croppie.jpg";

        $tableModel="thumbnails";
        $input_name = 'thumbnail';
        $newFilename = $this->newFileName($file_name);

        $this->log('-------inside $newFilename------->>', 'info');
        $this->log($newFilename, 'info');


        $imageSize = getimagesize($file_name);  //getting file size
        $this->log('-------getimagesize------->>', 'info');
        $this->log($imageSize, 'info');

        $currentWidth = $imageSize[0];
        $currentHeight = $imageSize[1];

        $this->log('-------$imageSize------->>', 'info');
        $this->log($imageSize, 'info');

        $left =  PRODUCT_IMAGE_CROP_START_X;           //left is from image position property like in css from top left
        $top = PRODUCT_IMAGE_CROP_START_Y;            //top is the image position property like in css from top left

        $cropWidth = PRODUCT_IMAGE_CROP_WIDTH;      // if the above size is 100 and 100 so the cropping point starts from there to 800px
        $cropHeight = PRODUCT_IMAGE_CROP_HEIGHT;     //if the above size is 100 and 100 so the cropping point starts from there to 500px

        $canvas = imagecreatetruecolor(PRODUCT_IMAGE_CROP_WIDTH, PRODUCT_IMAGE_CROP_HEIGHT);
        $this->log('-------$canvas------->>', 'info');
        $this->log($canvas, 'info');

        $currentImage = $this->imagecreatefromfile($file_name);

        $this->log('-------inside imagecreatefromfile------->>', 'info');
        $this->log($newFilename, 'info');

        $size= $data['image']['size'];

        imagecopy($canvas,$currentImage,0,0,PRODUCT_IMAGE_CROP_START_X,PRODUCT_IMAGE_CROP_START_Y,$size[0],$size[0]);

        // 1 value which is defined here should be ranging from 0-9
        $cropped_image= $this->getimage($file_name,$canvas,$newFilename);
        var_dump($cropped_image);
//        $this->uploadFile($file_name, $entity, $tableModel, $table_name, $data, $input_name);

        $this->set([
            'success' => true,
            'data' => [
                'info'=>'The '.$table_name.' has been saved.',
                'id'=>$entity->id,
            ]
        ]);

        $this->set('_serialize', ['success', 'data']);
    }


    function getimage($filename, $canvas,$newFilename ) {
        if (!file_exists($filename)) {
            throw new \InvalidArgumentException('File "'.$filename.'" not found.');
        }
        switch ( strtolower( pathinfo( $filename, PATHINFO_EXTENSION ))) {
            case 'jpeg':
            case 'jpg':
                return imagejpeg($canvas,$newFilename);
                break;

            case 'png':
                return imagepng($canvas,$newFilename);
                break;

            case 'gif':
                return imagegif($canvas,$newFilename);
                break;

            default:
                throw new InvalidArgumentException('File "'.$filename.'" is not valid jpg, png or gif image.');
                break;
        }

    }

    function newFileName( $filename ) {
        if (!file_exists($filename)) {
            throw new \InvalidArgumentException('File "'.$filename.'" not found.');
        }
        switch ( strtolower( pathinfo( $filename, PATHINFO_EXTENSION ))) {
            case 'jpeg':
            case 'jpg':
                return   WWW_ROOT."img/new" . "." . "jpeg" ;
                break;

            case 'png':
                return WWW_ROOT."img/new" . "." . "png" ;
                break;

            case 'gif':
                return WWW_ROOT."img/new" . "." . "gif" ;
                break;

            default:
                throw new \InvalidArgumentException('File "'.$filename.'" is not valid jpg, png or gif image.');
                break;
        }
    }


    function imagecreatefromfile( $filename ) {
        if (!file_exists($filename)) {
            throw new \InvalidArgumentException('File "'.$filename.'" not found.');
        }
        switch ( strtolower( pathinfo( $filename, PATHINFO_EXTENSION ))) {
            case 'jpeg':
            case 'jpg':
                return imagecreatefromjpeg($filename);
                break;

            case 'png':
                return imagecreatefrompng($filename);
                break;

            case 'gif':
                return imagecreatefromgif($filename);
                break;

            default:
                throw new \InvalidArgumentException('File "'.$filename.'" is not valid jpg, png or gif image.');
                break;
        }
    }

}
