<?php
include"koneksi.php";
    $username = $_GET['opt5'];
    $id = abs((int)$_GET['id']);
    $categories = Array();
    $jumlah = Array();
    if($id == ""){
        
    }
    else{
		$q=mysql_query("Select * from kategori where id='$id'");
		$tt=mysql_fetch_array($q);
         $c = mysql_query("select * from subkategori where kategori='$id' order by namasub asc");
       
        while($d = mysql_fetch_array($c)){
            $categories[]=$d['namasub'];
            
            $s0 = mysql_query("select count(*) as jml from tbl_informasi where jenis = '$d[id]' and desa like'$username%'") or die(mysql_error());
            
               $d0 = mysql_fetch_array($s0);
            $jumlah[]=$d0['jml'];
        }   
    }

?>

<script type='text/javascript'>

$(function () {
    $('#container').highcharts({
        chart: {
            type: 'bar'
        },
        title: {
            text: '<?php echo "<h2>Grafik Sebaran $tt[namasub]</h2>"; ?>'

        },
        subtitle: {
            text: 'Kabupaten/Kota'
        },
        xAxis: {
            categories: [<?php for($i = 0;$i<sizeof($categories);$i++){echo "'".$categories[$i]."',";} ?>],
            title: {
                text: null
            }
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Jumlah Unit',
                align: 'high'
            },
            labels: {
                overflow: 'justify'
            }
        },
        tooltip: {
            valueSuffix: ' buah'
        },
        plotOptions: {
            bar: {
                dataLabels: {
                    enabled: true
                }
            }
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'top',
            x: 0,
            y: 0,
            floating: true,
            borderWidth: 1,
            backgroundColor: ((Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'),
            shadow: true
        },
        credits: {
            enabled: false
        },
        series: [{
            showInLegend:false,
            name:'Jumlah ',
            data: [<?php for($i = 0;$i<sizeof($jumlah);$i++){echo $jumlah[$i].',';} ?>]
        }]
    });
});

</script>
<div id='container' style='height:700px;'></div>
<style>
.highcharts-container{
    width:100%;
}
</style>