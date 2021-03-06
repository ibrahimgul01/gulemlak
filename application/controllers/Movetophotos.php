<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Movetophotos extends CI_Controller{


  public function __construct()
  {
    parent::__construct();
    $this->load->model("firmalar");
    $this->load->library("image_lib");
  }

  function index()
  {
    set_time_limit(5000);
    ini_set('error_reporting', E_ALL);
    $ilanlar=$this->firmalar->gets();
    //echo $ilanlar;
    //die();
    foreach ($ilanlar as $ilan) {
      for ($i=1; $i < 16; $i++) {
      //$i=1;
        $resim="resim".$i;
        //if ($ilanlar[0]->$resim!="" && $ilanlar[0]->$resim!=null && file_exists(FCPATH.$ilanlar[0]->$resim)) {
        if ($ilan->$resim!="" && $ilan->$resim!=null && file_exists(FCPATH.$ilan->$resim)) {
          $source_file=FCPATH.$ilan->$resim;
          $destination_path=FCPATH."photos/big/";
          /*$parcala=explode("/",$ilanlar[0]->$resim);
          $name=$parcala[1];*/
          $name=pathinfo($source_file, PATHINFO_BASENAME);
          $destination_file=$destination_path . $name;

          $tasi=rename($source_file, $destination_file);
          if ($tasi) {
            $config['image_library'] = 'gd2';
            $config['source_image'] = $destination_file;
            $config['maintain_ratio'] = false;
            $config['width'] = 890;
            $config['height'] = 550;


            $this->image_lib->initialize($config);

            if ( ! $this->image_lib->resize())
            {
              echo "hata";
              //$this->session->set_flashdata('error', $this->image_lib->display_errors('error', 'İkinci boyutlandırma Yapılamadı'));
            }
            $this->image_lib->clear();

            $config1['image_library'] = 'gd2';
            $config1['source_image'] = 'assets/images/deneme1.jpg';
            $config1['new_image'] = $destination_file;
            $config1['wm_type'] = 'overlay';
            $config1['wm_overlay_path'] = $destination_file;
            $config1['wm_opacity'] = '100';
            $config1['wm_vrt_alignment'] = 'middle';
            $config1['wm_hor_alignment'] = 'center';


            $this->image_lib->initialize($config1);
            if (!$this->image_lib->watermark()) {
              $this->session->set_flashdata('error', $this->image_lib->display_errors('error', 'Watermak işlemi Yapılamadı'));
            }

            $this->image_lib->clear();

            $config1['image_library'] = 'gd2';
            $config1['source_image'] = $destination_file;
            $config1['new_image'] = FCPATH."photos/crop/".$name;
            $config1['maintain_ratio'] = TRUE;
            $config1['width'] = 445;
            $config1['height'] = 275;

            $this->image_lib->initialize($config1);

            if ( ! $this->image_lib->resize())
            {
              echo "hata";
              //$this->session->set_flashdata('error', $this->image_lib->display_errors('error', 'İkinci boyutlandırma Yapılamadı'));
            }
            $this->image_lib->clear();



            $config2['image_library'] = 'gd2';
            $config2['source_image'] = $destination_file;
            $config2['new_image'] = FCPATH."photos/thumbnail/".$name;
            $config2['maintain_ratio'] = TRUE;
            $config2['width'] = 178;
            $config2['height'] = 110;



            $this->image_lib->initialize($config2);

            if ( ! $this->image_lib->resize())
            {
              echo "hata";
              //$this->session->set_flashdata('error', $this->image_lib->display_errors('error', 'İkinci boyutlandırma Yapılamadı'));
            }
            $this->image_lib->clear();
            $data = array(
                "ilanId" => $ilan->Id,
                "name" => $name
            );

            $insert = $this->db->insert("pictures", $data);
            // if ($insert) {
            //   echo "dosya Kaydedildi";
            // }
          }
        }
      }
    }
    echo "bitti";
  }
}
