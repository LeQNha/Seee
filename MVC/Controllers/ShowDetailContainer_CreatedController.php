<?php
   class ShowDetailContainer_CreatedController extends BaseController
   {
        private $imageModel;
        function __construct()
        {
            $this->LoadModel('ImageModel');
            $this->imageModel = new ImageModel();

        }

        function RemoveImage(){
            if(isset($_POST['pid'])){
                $pid = $_POST['pid'];

                $this->imageModel->RemoveImage($pid);

                echo 'remove success';
            }
        }

        function UpdateImage(){
            if(isset($_GET['pid'])){
                $pid = $_GET['pid'];
                $detailTitleCreated = $_POST['detailTitleCreated'];
                $descriptionCreated = $_POST['descriptionCreated'];

                // if(empty($detailTitleCreated) || empty($descriptionCreated)){
                //     echo 'Không được để trống';
                // }

                $this->imageModel->UpdateImage($pid, $detailTitleCreated, $descriptionCreated);

                echo 'update success';
            }else{
                echo 'ko nhận';
            }

        }
   }
?>