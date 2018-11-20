<!DOCTYPE html>
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="tr">
<!--<![endif]-->
<head>
  <title><?php echo $title; ?></title>
  <?php $this->load->view('layout/metas');?>
  <meta name="description" content="<?php echo $description; ?>">
  <!-- CSS
  ================================================== -->
  <?php $this->load->view('layout/styles');?>
  <link rel="stylesheet" type="text/css" href="http://localhost/assets/css/custom/front.css">
  <style type="text/css">

    .pagination a, .pagination strong{

      padding: 5px;
      border: 1px solid #ccc;
      margin-left: 5px;
      text-decoration: none;
      box-shadow: 0px 0px 8px rgba(5,5,5,0.3);

    }
    .pagination strong{
      background-color: #35a5f2;

    }
  </style>
  <script>
    function show(a){
      $("#div"+a).slideDown("slow");
      $("#xdiv"+a).html('<a class="submenu_text" href="javascript:hide(\''+a+'\');">Gizle</a>');
    }
    function hide(a){
      $("#div"+a).slideUp("slow");
      $("#xdiv"+a).html('<a class="submenu_text" href="javascript:show(\''+a+'\');">Tümünü Göster</a>');
    }
  </script>
</head>
<body class="color_bg1">
  <div class="se-pre-con"></div>
  <div class="main">
    <!-- HEADER START -->
    <?php $this->load->view('layout/header');?>
    <div class="container">
      <div class="row mt-60 mb-60" >
        <div class="col-md-3">
          <div class="sidebar-block">
            <div class="sidebar-box listing-box mb-40">
              <span class="opener plus"></span>
              <div class="sidebar-title">
                <h3><span>Arama Fİltresİ</span></h3>
              </div>
              <div class="sidebar-contant" style="display: none;">
                <div class="categoryheader cathead3"><?php echo $kategori->kategori_adi;?></div>
              <div>
              <div>
                <div class="row">
                  <div class="col-12">
                    <!-- Kategori Liste başlangıç.....................................................-->
                    <script src="<?php echo base_url(); ?>js/autoNumeric.js" defer></script>
                    <script>
                      $(document).ready(function(){
                          $(".price_format").autoNumeric('init',{vMax:'99999999',aPad:false,aSep: '.',aDec:','});
                      });
                    </script>
                    <div class="kategori_listele" style="margin-bottom:10px">
                      <div style="margin-left:10px;">
                        <a href="<?php echo base_url(); ?>" class="cat_text font-weight-bold"> Tüm Kategoriler</a>
                      </div>
                      <?php
                      for ($i=1; $i < 9 ; $i++) {
                        if(isset($kategorys[$i-1])){
                          $yeni="kat".$i;
                          $$yeni=$kategorys[$i-1]->Id;
                        }else {
                          $yeni="kat".$i;
                          $$yeni="";
                        }
                      }
                      ?>
                      <div style="margin-left:10px;">
                        <a href="<?php echo base_url(); ?><?php echo $kategorys[0]->seo; ?>/<?php echo encode($kategorys[0]->Id); ?>" class="cat_text"><?php echo $kategorys[0]->kategori_adi; ?></a>
                      </div>
                      <?php if($kat1==$kategori->Id){?>
                        <?php if ($altKategoriler!=""): ?>
                          <div>
                            <?php foreach ($altKategoriler as $kate2){
                              $say2=ilansay(array("kategori2" => $kate2->Id, "onay" => "1"));
                              ?>
                              <div style="margin-left:17px;margin-top:5px;">
                                <a href="<?php echo base_url();?><?php echo $kategorys[0]->seo; ?>/<?php echo $kate2->seo;?>/<?php echo encode($kate2->Id); ?>" class="incat_submenu_text">
                                  <?php echo $kate2->kategori_adi; ?>
                                </a> (<?php echo $say2;?>)
                              </div>
                            <?php } ?>
                          </div>
                        <?php endif; ?>
                      <?php
                      }else{
                        $say2=ilansay(array("kategori2" => $kategorys[1]->Id, "onay" => "1"));
                        ?>
                        <div style="margin-left:17px;margin-top:5px;">
                          <a href="<?php echo base_url();?><?php echo $kategorys[0]->seo; ?>/<?php echo $kategorys[1]->seo; ?>/<?php echo encode($kategorys[1]->Id); ?>" class="incat_submenu_text"><?php echo $kategorys[1]->kategori_adi; ?></a>
                          <?php if($kat2 == $kategori->Id){?> (<?php echo $say2;?>)<?php }?>
                        </div>
                        <?php
                        if($kat2==$kategori->Id){
                          ?>
                          <?php if ($altKategoriler!=""): ?>
                            <div>
                              <?php foreach ($altKategoriler as $kate3){
                                $say3=ilansay(array("kategori3" => $kate3->Id, "onay" => "1"));
                                ?>
                                <div style="margin-left:25px;margin-top:5px;">
                                  <a href="<?php echo base_url();?><?php echo $kategorys[0]->seo; ?>/<?php echo $kategorys[1]->seo; ?>/<?php echo $kate3->seo;?>/<?php echo encode($kate3->Id); ?>" class="incat_submenu_text">
                                    <?php echo $kate3->kategori_adi; ?>
                                  </a> (<?php echo $say3;?>)
                                </div>
                              <?php } ?>
                            </div>
                          <?php endif; ?>
                        <?php }else{
                          $say3=ilansay(array("kategori3" => $kategorys[2]->Id, "onay" => "1"));
                          ?>
                          <div style="margin-left:25px;margin-top:5px;">
                            <a href="<?php echo base_url();?><?php echo $kategorys[0]->seo; ?>/<?php echo $kategorys[1]->seo; ?>/<?php echo $kategorys[2]->seo; ?>/<?php echo encode($kategorys[2]->Id); ?>" class="incat_submenu_text"><?php echo $kategorys[2]->kategori_adi; ?></a>
                            <?php if($kat3 == $kategori->Id){?> (<?php echo $say3;?>)<?php }?>
                          </div>
                          <?php
                          if($kat3==$kategori->Id){
                            ?>
                            <?php if ($altKategoriler!=""): ?>
                              <div style="overflow:auto;;width:200px;max-height:200px;">
                                <?php foreach ($altKategoriler as $kate4){
                                  $say4=ilansay(array("kategori4" => $kate4->Id, "onay" => "1"));
                                  ?>
                                  <div style="margin-left:32px;margin-top:5px;">
                                    <a href="<?php echo base_url();?><?php echo $kategorys[0]->seo; ?>/<?php echo $kategorys[1]->seo; ?>/<?php echo $kategorys[2]->seo; ?>/<?php echo $kate4->seo;?>/<?php echo encode($kate4->Id); ?>" class="incat_submenu_text"><?php echo $kate4->kategori_adi; ?></a>
                                    (<?php echo $say4;?>)
                                  </div>
                                <?php } ?>
                              </div>
                            <?php endif; ?>
                          <?php }else{
                            $say4=ilansay(array("kategori4" => $kategorys[3]->Id, "onay" => "1"));
                            ?>
                            <div style="margin-left:32px;margin-top:5px;">
                              <a href="<?php echo base_url();?><?php echo $kategorys[0]->seo; ?>/<?php echo $kategorys[1]->seo; ?>/<?php echo $kategorys[2]->seo; ?>/<?php echo $kategorys[3]->seo; ?>/<?php echo encode($kategorys[3]->Id); ?>" class="incat_submenu_text"><?php echo $kategorys[3]->kategori_adi; ?></a>
                              <?php if($kat4 == $kategori->Id){?> (<?php echo $say4;?>)<?php }?>
                            </div>
                            <?php
                            if($kat4==$kategori->Id){
                              ?>
                              <?php if ($altKategoriler!=""): ?>
                                <div style="overflow:auto;;width:200px;max-height:200px;">
                                  <?php foreach ($altKategoriler as $kate5){
                                    $say5=ilansay(array("kategori5" => $kate5->Id, "onay" => "1"));
                                    ?>
                                    <div style="margin-left:40px;margin-top:5px;">
                                      <a href="<?php echo base_url();?><?php echo $kategorys[0]->seo; ?>/<?php echo $kategorys[1]->seo; ?>/<?php echo $kategorys[2]->seo; ?>/<?php echo $kategorys[3]->seo; ?>/<?php echo $kate5->seo;?>/<?php echo encode($kate5->Id); ?>" class="incat_submenu_text"><?php echo $kate5->kategori_adi; ?></a>
                                      (<?php echo $say5;?>)
                                    </div>
                                  <?php } ?>
                                </div>
                              <?php endif; ?>
                            <?php }else{
                              $say5=ilansay(array("kategori5" => $kategorys[4]->Id, "onay" => "1"));
                              ?>
                              <div style="margin-left:40px;margin-top:5px;">
                                <a href="<?php echo base_url();?><?php echo $kategorys[0]->seo; ?>/<?php echo $kategorys[1]->seo; ?>/<?php echo $kategorys[2]->seo; ?>/<?php echo $kategorys[3]->seo; ?>/<?php echo $kategorys[4]->seo; ?>/<?php echo encode($kategorys[4]->Id); ?>" class="incat_submenu_text"><?php echo $kategorys[4]->kategori_adi; ?></a>
                                <?php if($kat5 == $kategori->Id){?> (<?php echo $say5;?>)<?php }?>
                              </div>
                              <?php
                              if($kat5==$kategori->Id){
                                ?>
                                <?php if ($altKategoriler!=""): ?>
                                  <div style="overflow:auto;;width:200px;max-height:200px;">
                                    <?php foreach ($altKategoriler as $kate6){
                                      $say6=ilansay(array("kategori6" => $kate6->Id, "onay" => "1"));
                                      ?>
                                      <div style="margin-left:50px;margin-top:5px;">
                                        <a href="<?php echo base_url();?><?php echo $kategorys[0]->seo; ?>/<?php echo $kategorys[1]->seo; ?>/<?php echo $kategorys[2]->seo; ?>/<?php echo $kategorys[3]->seo; ?>/<?php echo $kategorys[4]->seo; ?>/<?php echo $kate6->seo;?>/<?php echo encode($kate6->Id); ?>" class="incat_submenu_text"><?php echo $kate6->kategori_adi; ?></a>
                                        (<?php echo $say6;?>)
                                      </div>
                                    <?php } ?>
                                  </div>
                                <?php endif; ?>
                              <?php }else{
                                $say6=ilansay(array("kategori6" => $kategorys[5]->Id, "onay" => "1"));
                                ?>
                                <div style="margin-left:50px;margin-top:5px;">
                                  <a href="<?php echo base_url();?><?php echo $kategorys[0]->seo; ?>/<?php echo $kategorys[1]->seo; ?>/<?php echo $kategorys[2]->seo; ?>/<?php echo $kategorys[3]->seo; ?>/<?php echo $kategorys[4]->seo; ?>/<?php echo $kategorys[5]->seo; ?>/<?php echo encode($kategorys[5]->Id); ?>" class="incat_submenu_text"><?php echo $kategorys[5]->kategori_adi; ?></a>
                                  <?php if($kat6 == $kategori->Id){?> (<?php echo $say6;?>)<?php }?>
                                </div>
                                <?php
                              }
                            }
                          }
                        }
                      }
                      ?>
                    </div>
                  </div>
                  <div class=" col-12 searchSeperator"></div>
                  <div class="col-12">
                    <form name="AdvancedSearchForm" id="AdvancedSearchForm" action="" method="post" >
                      <div class="row" >
                        <div class="col-12 font-weight-bold" onclick="aramaGoster('1','<?php echo $kat1;?>');">
                          Konum
                        </div>
                        <div class="col-12 mt-2">
                          <select name="sehir" onchange="ilcegetir(this.options[selectedIndex].value);">
                            <option value="">Seçiniz</option>
                            <?php
                            foreach($iller as $bolge){
                              ?>
                              <option value="<?php echo $bolge->il_id;?>"<?php if(isset($sehir) && $bolge->il_id==$sehir){?> selected<?php }?>><?php echo $bolge->il_ad;?></option>
                            <?php }?>
                          </select>
                        </div>
                        <div class="col-12 mt-2">
                          <select name="ilce" id="ilce" onchange="mahallegetir(this.options[selectedIndex].value);">
                              <option value="">Seçiniz</option>
                              <?php if (isset($ilceler)): ?>
                                <?php foreach ($ilceler as $item): ?>
                                  <option value="<?php echo $item->ilce_id;?>"<?php if(isset($ilce) && $item->ilce_id==$ilce){?> selected<?php }?>><?php echo $item->ilce_ad;?></option>
                                <?php endforeach; ?>
                              <?php endif; ?>
                          </select>
                        </div>
                        <div class="col-12 mt-2">
                          <select name="mahalle" id="mahalle">
                              <option value="">Seçiniz</option>
                              <?php if (isset($mahalleler)): ?>
                                <?php foreach ($mahalleler as $item): ?>
                                  <option value="<?php echo $item->mahalle_id;?>"<?php if(isset($mahalle) && $item->mahalle_id==$mahalle){?> selected<?php }?>><?php echo $item->mahalle_ad;?></option>
                                <?php endforeach; ?>
                              <?php endif; ?>
                          </select>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-12 mt-2">
                          <label for="exampleFormControlSelect1">Fiyat</label>
                        </div>
                        <div class="col-6">
                          <input  type="text" placeholder="En az" name="fiyat_1" class="price_format" style="width:100%" value="<?php if(isset($fiyat_1)){echo $fiyat_1;}?>">
                        </div>
                        <div class="col-6">
                          <input type="text"  placeholder="En çok" name="fiyat_2" class="price_format" style="width:100% " value="<?php if(isset($fiyat_2)){echo $fiyat_2;} ?>">
                        </div>
                      </div>
                      <div class="row">
                        <?php // fields baslangıç ?>
                        <?php
                        foreach ($fields as $field) {
                          if($field->arama=='1'){
                          ?>
                            <div class="col-12 mt-3 font-weight-bold" onclick="aramaGoster('<?php echo md5($field->name);?>');" class="category_fieldName mt-2">
                              <?php echo $field->name;?>
                            </div>
                            <div class="col-12 " id="field_<?php echo md5($field->name);?>" class="category_openField">
                              <?php
                              if($field->type=='text'){
                                if($field->aralik=='1'){
                                  ?>
                                  <div class="row">
                                    <div class="col-6">
                                      <input type="text" name="<?php echo $field->seo_name;?>_1" style="width:100%" placeholder="En az" value="<?php if (isset($field_posted_data[$field->seo_name.'_1'])) {echo $field_posted_data[$field->seo_name.'_1'];} ?>">
                                    </div>
                                    <div class="col-6">
                                      <input type="text" name="<?php echo $field->seo_name;?>_2" value="<?php if (isset($field_posted_data[$field->seo_name.'_2'])) {echo $field_posted_data[$field->seo_name.'_2'];} ?>" placeholder="En çok" style="width:100%">
                                    </div>
                                  </div>
                                  <?php
                                }else{
                                  ?>
                                  <input type="text" name="<?php echo $field->seo_name;?>" value="<?php if (isset($field_posted_data[$field->seo_name])) {echo $field_posted_data[$field->seo_name];}?>">
                                <?php } ?>
                                <?php
                              }elseif($field->type=='select' or $field->type=='radio'){
                                if (isset($field_posted_data[$field->seo_name])) {
                                  if($field->multiple==1){
                                    if(count($field_posted_data[$field->seo_name])==0){
                                      $all_selected=1;
                                    }
                                  }
                                }
                                ?>
                                <select class="form-control" name="<?php echo $field->seo_name;?><?php if($field->multiple==1){ ?>[]" onchange="select_check('<?php echo $field->seo_name; ?>')"<?php }else{ echo "\"";} ?>>
                                  <option value=""<?php if(isset($all_selected) && $all_selected==1){ ?> selected<?php }?>>
                                    Hepsi
                                  </option>
                                  <?php
                                  $new_values=explode("||",$field->field_values);
                                  for ($i = 0; $i <= count($new_values)-1; $i++) {
                                    ?>
                                    <option value="<?php echo str_replace('==','',base64_encode($new_values[$i]));?>"<?php if(isset($field_posted_data[$field->seo_name]) && in_array(str_replace('==','',base64_encode($new_values[$i])),$field_posted_data[$field->seo_name])){ ?> selected<?php }?>>
                                      <?php echo $new_values[$i];?>
                                    </option>
                                  <?php } ?>
                                </select>
                                <?php
                              }elseif($field->type=='multiple_select'){
                                if (isset($field_posted_data[$field->multiple_field_seo_name])) {
                                  if($field->multiple==1){
                                    if ($field_posted_data[$field->multiple_field_seo_name]) {
                                      $posted_values[$field->multiple_field_seo_name]=implode(",",$field_posted_data[$field->multiple_field_seo_name]);
                                    }
                                  }else{
                                    if ($field_posted_data[$field->multiple_field_seo_name]) {
                                      $posted_values[$field->multiple_field_seo_name]=$field_posted_data[$field->multiple_field_seo_name];
                                    }
                                  }
                                }
                                ?>
                                <script>
                                  $(document).ready(function(){
                                    multiple_field_values('<?php echo $field->seo_name;?>','<?php echo $field->Id;?>','<?php echo sha1($field->multiple_field_name);?>','<?php if (isset($posted_values[$field->multiple_field_seo_name])) {echo $posted_values[$field->multiple_field_seo_name];} ?>','Hepsi','../../');
                                  });
                                </script>
                                <select class="form-control" name="<?php $field->seo_name;?>" onchange="multiple_field_values('<?php echo $field->seo_name;?>','<?php echo $field->Id;?>','<?php echo sha1($field->multiple_field_name);?>','','Hepsi','../../');">
                                  <option value="">Hepsi</option>
                                  <?php
                                  if (isset($field_posted_data[$field->seo_name])) {
                                    $field_current_date=$field_posted_data[$field->seo_name];
                                  }
                                  $new_values=explode("||",$field->field_values);
                                  for ($i = 0; $i <= count($new_values)-1; $i++) {
                                    ?>
                                    <option value="<?php echo str_replace('==','',base64_encode($new_values[$i]));?>"<?php if(isset($field_current_date) && str_replace('==','',base64_encode($new_values[$i]))==$field_current_date){echo " selected"; }?>><?php echo $new_values[$i];?></option>
                                    <?php
                                  }
                                  ?>
                                </select>
                              </div>
                              <div class="category_fieldSep"></div>
                              <div onclick="aramaGoster('<?php echo md5($field->multiple_field_name);?>');" class="category_fieldName">
                                <?php echo $field->multiple_field_name;?>
                                <span style="float:right;" id="field_i_<?php echo md5($field->multiple_field_name);?>">
                                  <img src="<?php echo base_url(); ?>assets/images/close_field.png" width="16" height="15" title="Göster" alt="Göster">
                                </span>
                              </div>
                              <div id="field_<?php echo md5($field->multiple_field_name);?>" class="category_openField">
                                <select id="<?php echo sha1($field->multiple_field_name);?>" name="<?php echo $field->multiple_field_seo_name;?><?php if($field->multiple==1){?>[]" size="5" onchange="select_check('<?php echo $field->multiple_field_seo_name;?>[]');" multiple<?php }else{ echo "\"";} ?>>
                                  <option value="">Hepsi</option>
                                </select>
                              <?php } ?>
                              </div>
                              <div class="category_fieldSep"></div>
                              <?php
                            }
                          }
                          ?>
                        </div>
                        <div class="row">
                        <div class="col-12 font-weight-bold mt-3" onclick="aramaGoster('adDate','<?php echo $kategori->Id; ?>');" class="category_fieldName">
                          İlan Tarihi
                        </div>
                        <div id="field_adDate" class="col-12  category_openField">
                          <select name="ilan_tarihi" size="1">
                            <option value="">Hepsi</option>
                            <option value="<?php echo base64_encode('Son 24 Saat');?>"<?php if($ilan_tarihi=='Son 24 Saat'){?> selected<?php }?>>Son 24 Saat</option>
                            <option value="<?php echo base64_encode('Son 3 Gün');?>"<?php if($ilan_tarihi=='Son 3 Gün'){?> selected<?php }?>>Son 3 Gün</option>
                            <option value="<?php echo base64_encode('Son 7 Gün');?>"<?php if($ilan_tarihi=='Son 7 Gün'){?> selected<?php }?>>Son 7 Gün</option>
                            <option value="<?php echo base64_encode('Son 15 Gün');?>"<?php if($ilan_tarihi=='Son 15 Gün'){?> selected<?php }?>>Son 15 Gün</option>
                            <option value="<?php echo base64_encode('Son 30 Gün');?>"<?php if($ilan_tarihi=='Son 30 Gün'){?> selected<?php }?>>Son 30 Gün</option>
                          </select>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-12 mt-3 category_fieldSep"></div>
                        <div class="col-12">
                          <div class="form-group">
                            <div class="form-group">
                              <div class="form-check">
                                <!-- Default unchecked -->
                                <div class="custom-control custom-checkbox">
                                  <input name="remember_me" type="checkbox" class="custom-control-input" id="defaultUnchecked" <?php echo (isset($member)) ? "checked" : ""; ?>>
                                  <label class="custom-control-label" for="defaultUnchecked">Sadece Haritalı İlanlar</label>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-12">
                          <div class="form-group">
                            <div class="form-group">
                              <div class="form-check">
                                <!-- Default unchecked -->
                                <div class="custom-control custom-checkbox">
                                  <input name="remember_me" type="checkbox" class="custom-control-input" id="OnlyPhoto" <?php echo (isset($member)) ? "checked" : ""; ?>>
                                  <label class="custom-control-label" for="OnlyPhoto">Sadece Fotoğraflı İlanlar</label>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-12">
                        <button type="submit" class="btn color_bg3 text-light" style="width: 100%">Ara</button>
                      </div>
                    </form>
                  </div>
                </div>
              <!-- Kategori Liste bitiş ........................................................-->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-9">
      <?php
      $list_field_title = array();
      $list_field_value = array();
      foreach ($fields as $field) {
        if($field->showlist==1){
          $list_field_title[]='<td style="background:#E9E9E9;height:35px;font-weight:bold;text-align:center;">'.$field->name.'</td>';
          $list_field_value[]=$field->seo_name;
        }
      } ?>
      <?php
      $i=1;
      foreach ($ilanlar as $a){
        $firma_adi = html_entity_decode($a->firma_adi);
        $uzunluk=strlen($firma_adi);
        if($uzunluk>40){
            $firma_adi = mb_substr($firma_adi,0,40,'UTF-8').'...';
        }else{
            $firma_adi=$firma_adi;
        }
        $seolink2 = $a->seo_url;
        $il=$this->db->query("select * from tbl_il where il_id='".$a->il."'")->row();
        $ilce=$this->db->query("select * from tbl_ilce where ilce_id='".$a->ilce."'")->row();
        $ilan_no=$a->Id;
        $mahalle=$this->db->query("select * from tbl_mahalle where mahalle_id='".$a->mahalle."'")->row();
        ?>
        <div class="row mt-1 border-bottom<?php if($i%2==0){ ?> color_bg-1<?php }else{ ?> color_bg-2<?php } ?>" onclick="window.location='<?php echo base_url();?><?php echo $seolink2;?>/<?php echo encode($ilan_no);?>';">
          <div class="col-md-3">
            <?php if($a->kucuk_fotograf==1 and ilk_resim($a->Id)!='' and file_exists('photos/thumbnail/'.ilk_resim($a->Id))){?>
              <img src = "<?php echo base_url();?>photos/thumbnail/<?php echo ilk_resim($a->Id);?>" height = "110" width="178" border = "0" alt="<?php echo $a->firma_adi;?>" title="<?php echo $a->firma_adi;?>">
            <?php }else{?>
              <img src = "<?php echo base_url();?>assets/images/yok_thumbnail.png" height = "110" width="178" border = "0" alt="<?php echo $a->firma_adi;?>" title="<?php echo $a->firma_adi;?>">
            <?php }?>
          </div>
          <div class="col-md-6">
            <div class="row">
              <div class="col-12"></div>
              <a href="javascript:void(0);"><?php echo $firma_adi;?></a>
              <br/>
              <div class="col-6" style="font-size: 12px;">
                İlan Tarihi:<?php yeni_tarih2($a->kayit_tarihi);?>
              </div>
              <div class="col-6 color_text4">
                <b><?php echo number_format($a->fiyat,0, ',', '.').' '.$a->birim; ?></b>
              </div>
            </div>
            <div class="row">
              <?php
              $t=0;
              foreach ($list_field_value as $list_field_val) {
                echo '<div class="col-md-4">'. $list_field_title[$t].':'.get_ad_cat_show_detail($list_field_val,$ilan_no).'</div>';
                $t++;
              }
              ?>
            </div>
          </div>
          <div class="col-md-3 ">
            <div class="col-12 font-weight-bold " style="font-size:12px;font-family: "Raleway", sans-serif">
              <i class="fas fa-map-marker-alt"></i>
              <?php if ($il) { echo $il->il_ad;}?>
              <br/>
              <?php if($mahalle){echo $mahalle->mahalle_ad;}?>
            </div>
          </div>
        </div>
        <?php
        $i++;
      }
      ?>
      <p class="pagination"><?php echo $links; ?></p>
    </div>
  </div>
</div>
  <?php $this->load->view('layout/footer2');?>
</div>
    <script>
      function mesaj_gonder (uyeid,ilanid){alert('Mesaj gönderebilmek için giriş yapmalısınız.');}
      function favori (){alert('İlanı favorilerinize eklemeniz için üye girişi yapmanız gerekmektedir.');}
      function favorisil (){alert('İlanı favorilerden silebilmek için üye girişi yapmanız gerekmektedir.');}
    </script>
    <script type="text/javascript">
    function ilcegetir(parametre) {
      if (parametre > 0){
        var il_id = parametre;
        //ajax işlemi post ile yapılıyor
        $.post('<?php echo base_url(); ?>ajax/get_ilceler', {il_id : il_id}, function(result){
          //gelen cevapta hata yoksa listeleme yapılıyor..
          if ( result && result.status != 'error' )
          {
            var ilceler = result.data;
            var select = '<option value="">Seçiniz..</option>';
            for( var i = 0; i < ilceler.length; i++)
            {
              select += '<option value="'+ ilceler[i].ilce_id +'">'+ ilceler[i].ilce_ad +'</option>';
            }
            select += '</select>';
            $('#ilce').empty().html(select);
          }
          else
          {
            alert('Hata : ' + result.message );
          }
        });
      }
    }

    function mahallegetir(parametre) {
      if (parametre>0){
        var ilce_id = parametre;
        //ajax işlemi post ile yapılıyor
      $.post('<?php echo base_url(); ?>ajax/get_mahalleler', {ilce_id : ilce_id}, function(result){
          //gelen cevapta hata yoksa listeleme yapılıyor..
          if ( result && result.status != 'error' )
          {
            var mahalleler = result.data;
            var select = '<option value="">Seçiniz..</option>';
            for( var i = 0; i < mahalleler.length; i++)
            {
              select += '<option value="'+ mahalleler[i].mahalle_id +'">'+ mahalleler[i].mahalle_ad +'</option>';
            }
            select += '</select>';

            $('#mahalle').empty().html(select);
          }
          else
          {
            alert('Hata : ' + result.message );
          }
        });
      }
    }
    function order_by() {
      $("#sort").submit();
    }
    </script>
  <?php $this->load->view('layout/scripts');?>
</body>
</html>
