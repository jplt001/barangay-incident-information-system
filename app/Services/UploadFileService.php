<?php
namespace App\Services;

use Illuminate\Support\Facades\Storage;
use Kreait\Firebase\Factory;



class UploadFileService {
    protected $storage;
    protected $factory;
    function __construct()
    {
        $this->factory = (new Factory)->withServiceAccount(storage_path("app/config/barangayincidentms-firebase.json"));
        $this->storage = $this->factory->createStorage();
    }

    public function uploadToProfilePictures() {
        // $client = $this->storage->getBucket();

        $bucket = $this->storage->getBucket();

        $file = asset('assets/img/logo.png');
        $bucket->upload(fopen($file, 'r'),[
            'predefinedAcl' => 'publicRead'
        ]);
    }
}