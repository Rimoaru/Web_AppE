<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class Api extends RestController {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
    }

    public function buku_get()
    {
        $kode = $this->get('id');

        if ($kode == '' || $kode == NULL) {
            $buku = $this->buku_model->apiAllData();
            if ( $buku ){
                // Set the response and exit
                $this->response( $buku, 200 );
            }else{
                // Set the response and exit
                $this->response( [
                    'status' => false,
                    'message' => 'Tidak ada buku yang ditemukan!'
                ], 404 );
            }
        }else {
            $buku = $this->buku_model->apiSingleData($kode);
            
            if ( count($buku) != 0 )
            {
                $this->response( $buku, 200 );
            }
            else
            {
                $this->response( [
                    'status' => false,
                    'message' => 'buku tersebut tidak ada!'
                ], 404 );
            }
        }
        $this->response($buku, 200);
    }

}