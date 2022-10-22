<?php

namespace app\components;

class FileUpload
{
    /**
     * @var $files
     */
    public $files;

    /**
     * FileUpload constructor.
     * @param $files
     */
    public function __construct($files)
    {
        $this->files = $files;
    }

    /**
     * @param $modelName
     * @return array
     */
    public function fileUpload($modelName)
    {
        $uploadOk = 1;
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($this->files[$modelName]['name']['image']);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        $check = getimagesize($this->files[$modelName]['tmp_name']['image']);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            $uploadOk = 0;
            return ['isUploaded' => $uploadOk, 'error' => "Sorry, something went wrong!"];
        }

        if (file_exists($target_file)) {
            return ['isUploaded' => $uploadOk, 'file_name' => $this->files[$modelName]['name']['image']];
        }

        if ($_FILES["fileToUpload"]["size"] > 500000) {
            $uploadOk = 0;
            return ['isUploaded' => $uploadOk, 'error' => "Sorry, your file is too large."];
        }

        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif") {
            $uploadOk = 0;
            return ['isUploaded' => $uploadOk, 'error' => "Sorry, only JPG, JPEG, PNG & GIF files are allowed."];
        }

        if (move_uploaded_file($this->files[$modelName]['tmp_name']['image'], $target_file)) {
            return ['isUploaded' => $uploadOk, 'file_name' => $this->files[$modelName]['name']['image']];
        } else {
            $uploadOk = 0;
            return ['isUploaded' => $uploadOk, 'error' => "Sorry, file can`t upload"];
        }
    }
}