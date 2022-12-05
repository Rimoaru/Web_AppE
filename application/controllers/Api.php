<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class Api extends RestController {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
    }

    public function surah_get()
    {
        $kode = $this->get('id');

        if ($kode == '' || $kode == NULL) {
            $surah = $this->db->get('surah')->result();
            // Replace data file agar menjadi Link
            foreach ( $surah as $s){
                $s->file = base_url('assets/files/').$s->file;
            }
            if ( $surah ){
                // Set the response and exit
                $this->response( $surah, 200 );
            }else{
                // Set the response and exit
                $this->response( [
                    'status' => false,
                    'message' => 'Tidak ada Surah yang ditemukan!'
                ], 404 );
            }
        }else {
            $surah = $this->db->where('id', $kode)->get('surah')->result();
            
            if ( count($surah) != 0 )
            {
                $this->response( $surah, 200 );
            }
            else
            {
                $this->response( [
                    'status' => false,
                    'message' => 'Surah tersebut tidak ada!'
                ], 404 );
            }
        }
        $this->response($surah, 200);
    }

}