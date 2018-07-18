    <script type="text/javascript" src="<?php echo base_url();?>assets/line-labels/jquery.min.js"></script>
    <!-- datatables -->
    <script type="text/javascript" language="javascript" src="<?php echo base_url();?>assets/media/js/jquery-1.12.4.js">
    </script>
    
<script type="text/javascript" language="javascript" class="init">
    $(document).ready(function() {
        $('#tabel-harga').DataTable();
    } );
    </script>

<?php
function week_of_today()
{
    $month     = date('m');
    $month     = str_pad($month,2,'0',STR_PAD_LEFT);
    $today     = date('Y-m-d');
    $minggu    = 0;
    $week_end  = 0;
    $last_date =  last_date_ofthe_month();

    for($i = 1; $i<=$last_date; $i++)
    {
        $i = str_pad($i,2,'0',STR_PAD_LEFT);
        $date =  date("Y-{$month}-{$i}");
        $day  =  date('D', strtotime($date));

        if($day == 'Sat')
        {
            $minggu = $minggu + 1;
        }
        if($date == $today)
        {
            $minggu = $minggu + 1;
            break;
        }
    }
    return $minggu;
}

function last_date_ofthe_month($month="", $year="")
{
    if(!$year)   $year   = date('Y');
    if(!$month)  $month  = date('m');
    $date = $year.'-'.$month.'-01';

    $next_month = strtotime('+ 1 month', strtotime($date));

    $last_date  = date("d", strtotime("-1 minutes",  $next_month));
    return $last_date;
}



$bln                =date("m");
$bulan              = bulan($bln);
$id_jenisbahanpokok = $this->uri->segment(3);
?>

<script>
  
  function printContent(el){
    var restorepage = document.body.innerHTML;
    var printcontent = document.getElementById(el).innerHTML;
    document.body.innerHTML = printcontent;
    window.print();
    document.body.innerHTML = restorepage;
}
 </script>

<div class="content-block">
    <div class="container cont-pad-t-sm">
        <div class="content-header">
        <br>
            <h1><?php echo $data_komoditas[0]->nama_jenis_bahan_pokok; ?></h1>
        </div>
        <div class="row">
            <div class="col-md-4">
                <img style="min-width:100%;" class="img-responsive img-thumbnail" src="<?php echo base_url('assets/uploads/'.$data_komoditas[0]->foto_jenis_bahan_pokok) ?>">
            </div>
            <div class="col-md-2 text-center">
                <div class="panel panel-danger">
                  <div class="panel-heading">
                    <h3 class="panel-title">Harga Maksimum</h3>
                    <span>Bulan <?php echo $bulan; ?></span>
                  </div>
                  <div class="panel-body">
                    <span class="panel-harga"><?php echo buatrp($data_max->harga_max)."/".$data_max->satuan; ?></span>
                  </div>
                  <div class="panel-footer">
                    <small><?php echo $data_max->nama_pasar; ?></small>
                  </div>
                </div>
            </div>

            <div class="col-md-2 text-center">
                <div class="panel panel-success">
                  <div class="panel-heading">
                    <h3 class="panel-title">Harga Minimum</h3>
                    <span>Bulan <?php echo $bulan; ?></span>
                  </div>
                  <div class="panel-body">
                    <span class="panel-harga"><?php echo buatrp($data_min->harga_min)."/".$data_max->satuan; ?></span>
                  </div>
                  <div class="panel-footer">
                    <small><?php echo $data_min->nama_pasar; ?></small>
                  </div>
                </div>
            </div>

            <div class="col-md-2 text-center">
                <div class="panel panel-info">
                  <div class="panel-heading">
                    <h3 class="panel-title">Harga Rata Rata</h3>
                    <span>Bulan <?php echo $bulan; ?></span>
                  </div>
                  <div class="panel-body">
                    <span class="panel-harga"><?php echo buatrp($data_avg->harga_avg)."/".$data_max->satuan; ?></span>
                  </div>
                  <div class="panel-footer">
                    <small><?php echo $data_min->nama_pasar; ?></small>
                  </div>
                </div>
            </div>
          </div>
        </div>
  <div class="content-block">
    <div class="container cont-pad-t-sm">
        <div class="content-header">
        <br>
        <button onclick="printContent('tab-surat-masuk')" class="btn btn-primary"><i class="fa fa-print" ></i> &nbsp;Cetak Laporan</button>
        <div id="tab-surat-masuk">
             <table class="table table-striped" id="tabel-harga" style="font-family: segoe UI;">
                  <thead>
                    <tr class="info">
                      <th class="text-center">No</th>
                      <th class="text-center">Harga</th>
                      <th class="text-center">Satuan</th>
                      <th class="text-center">Prediksi harga</th>
                      <th class="text-center">Alpha</th>
                      <th class="text-center">Tgl update</th>
                    </tr>
                  </thead>
                  <tbody>

                <?php
                $no = 1;
                foreach($data_komoditi as $index => $data)
                {

                      $alpha=0.9;

                      if($index==0){
                        $s1[$index]=$data->harga;
                      }else{
                        $s1[$index]=$alpha*$data->harga+(1-$alpha)*$s1[$index-1];
                      }

                      $hasil = $s1[$index];

                      if ($hasil > $data->harga) {
                        $style = "danger";
                        $icon = "<i style='color:red;' class='icon-arrow-up'></i> ";
                      }elseif ($hasil < $data->harga) {
                        $style = "success";
                        $icon = "<i style='color:green;' class='icon-arrow-down'></i> ";
                      }elseif ($hasil = $data->harga) {
                        $style = "";
                        $icon = "(Stabil) ";
                      }

                      $a[$index]=$s1[$index];
                      
                          
                      
                ?>
                   <tr>
                      <th class="text-center"><?php echo $no++; ?></th>
                      <td class="text-center"><?php echo buatrp($data->harga); ?></td>
                      <td class="text-center"><?php echo $data->satuan; ?></td>
                      <td class="text-right <?php echo $style; ?>"><?php echo $icon; ?><?php echo buatrp($hasil); ?></td>
                      <td class="text-center"><?php echo $alpha; ?></td>
                      <td class="text-right"><?php echo $data->tgl_update; ?></td>
                     
                    </tr>
                    

                   <?php 
                    } 
                    ?>


                  </tbody>
                </table>
                </div>

          </div>
        </div>
    </div>

    <br/>
    <div class="row">
        <script>


        $(function () {
            Highcharts.chart('container', {
                chart: {
                    type: 'line'
                },
                title: {
                    text: 'Grafik'
                },
                subtitle: {
                    text: 'DISPERINDAG GOWA'
                },
                xAxis: {
                    categories: [<?php 
                    foreach($data_komoditi as $index => $data)
                    { ?>'<?php echo $data->tgl_update; ?>', <?php } 

                    ?>]
                },
                yAxis: {
                    title: {
                        text: 'Harga'
                    }
                },
                plotOptions: {
                    line: {
                        dataLabels: {
                            enabled: true
                        },
                        enableMouseTracking: false
                    }
                },
                series: [{
                        name: 'Harga Sekarang',
                        data: [<?php foreach($data_komoditi as $index => $data) { 
                          $alpha=0.9;

                          if($index==0){
                            $s1[$index]=$data->harga;
                          }else{
                            $s1[$index]=$alpha*$data->harga+(1-$alpha)*$s1[$index-1];
                          }

                          $hasil = $s1[$index];                
                          $a[$index]=$s1[$index];

                          ?><?php echo $data->harga ?>, <?php } ?>]
                    }, {
                        name: 'Harga Prediksi',
                        data: [<?php foreach($data_komoditi as $index => $data) { 
                          $alpha=0.9;

                          if($index==0){
                            $s1[$index]=$data->harga;
                          }else{
                            $s1[$index]=$alpha*$data->harga+(1-$alpha)*$s1[$index-1];
                          }

                          $hasil = $s1[$index];

                
                          $a[$index]=$s1[$index];

                          ?><?php echo $hasil; ?>, <?php } ?>]
                    }]
            });
        });
        </script>    
    </div>

<script src="<?php echo base_url();?>assets/line-labels/highcharts.js"></script>
<script src="<?php echo base_url();?>assets/line-labels/modules/exporting.js"></script>

<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>