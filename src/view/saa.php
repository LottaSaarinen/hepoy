<?php $this->layout('template', ['title' => 'saa']) ?>


<?php



$cache_file = 'data.json';
if(file_exists($cache_file)){
  $data = json_decode(file_get_contents($cache_file));
}else{
 $url = "https://opendata.fmi.fi/wfs?request=getFeature&storedquery_id=fmi::observations::weather::simple&starttime=2023-08-01T00:00:00Z&endtime=2023-08-01T23:59:59Z&fmisid=101004&parameters=temperature&application/json"
;
  $data = file_get_contents($api_url);
  file_put_contents($cache_file, $data);
  $data = json_decode($data);
}

$current = $data->results->current[0];
$forecast = $data->results->seven_day_forecast;

?>

<?php
  function convert2cen($value,$unit){
    if($unit=='C'){
      return $value;
    }else if($unit=='F'){
      $cen = ($value - 32) / 1.8;
        return round($cen,2);
      }
  }
?>

  <br>

  <div class="row">
    <h3 class="title text-center bordered">Sää tiedot <?php echo $current->city.' ('.$current->country.')';?></h3>
    <div class="col-md-12" style="padding-left:0px;padding-right:0px;">
      <div class="single bordered" style="padding-bottom:25px;background:url('back.jpg') no-repeat ;border-top:0px;background-size: cover;">
        <div class="row">
          <div class="col-sm-9" style="font-size:20px;text-align:left;padding-left:70px;">
            <p class="aqi-value"><?php echo convert2cen($current->temp,$current->temp_unit);?> °C</p>
            <p class="weather-icon">
              <img style="margin-left:-10px;" src="<?php echo $current->image;?>">
              <?php echo $current->description;?>
            </p>
            <div class="weather-icon">
              <p><strong>Tuuli : </strong><?php echo $current->windspeed;?> <?php echo $current->windspeed_unit;?></p>
              <p><strong>Pressue : </strong><?php echo $current->pressure;?> <?php echo $current->pressure_unit;?></p>
              <p><strong>Visibility : </strong><?php echo $current->visibility;?> <?php echo $current->visibility_unit;?></p>
            </div>
          </div>
        </div>
          </div>
    </div>
  </div>
  <br><br>
  <div class="row">
    <h3 class="title text-center bordered">Viiden päivän sää <?php echo $current->city.' ('.$current->country.')';?></h3>
    <?php $loop=0; foreach($forecast as $f){ $loop++;?>
      <div class="single forecast-block bordered">
        <h3><?php echo $f->day;?></h3>
        <p style="font-size:1em;" class="aqi-value"><?php echo convert2cen($f->low,$f->low_unit);?> °C - <?php echo convert2cen($f->high,$f->high_unit);?> °C</p>
        <hr style="border-bottom:1px solid #fff;">
      
        <p><?php echo $f->phrase;?></p>
      </div>
    <?php } ?>
  </div>
</div>

<?php
/*?>

<h1>saa</h1>

<?php

$ch = curl_init();

$url = "https://opendata.fmi.fi/wfs?service=WFS&version=2.0.0&request=getFeature&storedquery_id=fmi::forecast::harmonie::surface::point::multipointcoverage&place=helsinki&";

curl_setop($ch, CURLOPT_URL, $url);
curl_setop($ch, CURLOPT_RETURNTRANSER, true);

$resp = curl_exec($ch);

if($e = curl_error($ch)){
    echo $e;

}
else {
    $decoded = json_decode($resp, true);
    print_r($decoded);
}

curl_close($ch);

?>