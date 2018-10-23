<?php include_once "../configuration.php"; 
if(!isset($_SESSION["a"])){
	header("location: " . $pathAPP . "logout.php");
}

?>
<!doctype html>
<html class="no-js" lang="en" dir="ltr">
<head>
	<?php include_once "../template/head.php"; ?>
</head>
<body style="background-image: none;">
	<?php include_once "../template/sidebar.php" ?>
	<div class="grid-container full">
		<div class="grid-x align-center">
			<div class="cell large-10">
				<div id="main">
                    <div class="grid-x">
                        <div class="cell medium-12">
                            <div id="container" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
                        </div>
                    </div>
					<div class="grid-x win-rate">
                        <div class="cell medium-4">
                            <div id="container2" style="min-width: 150px; height: 200px; max-width: 600px; margin: 0 auto"></div>
                        </div>
                        <div class="cell medium-4">
                            <div id="container3" style="min-width: 150px; height: 200px; max-width: 600px; margin: 0 auto"></div>
                        </div>
                        <div class="cell medium-4">
                            <div id="container4" style="min-width: 150px; height: 200px; max-width: 600px; margin: 0 auto"></div>
                        </div>
                    </div>
                    <div class="grid-x gd-rate">
                        <div class="cell medium-6">
                            <div id="container5" style="min-width: 150px; height: 200px; max-width: 600px; margin: 0 auto"></div>
                        </div>
                        <div class="cell medium-6">
                            <div id="container6" style="min-width: 150px; height: 200px; max-width: 600px; margin: 0 auto"></div>
                        </div>
                        
                    </div>
				</div>
			</div>
		</div>
	</div> 
	
	<?php include_once "../template/scripts.php"; ?>
	<script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script>
      Highcharts.chart('container', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Broj bodova'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.y}</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.y}',
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                }
            }
        },
        series: [{
            name: 'Broj bodova',
            colorByPoint: true,
            data: 
              <?php 
                
                $query = $connect->prepare("
     
                select naziv as name, 
                brojbodova as y
                from klub
                group by naziv
     ");
     $query->execute();
     $result = $query->fetchAll(PDO::FETCH_OBJ);
                echo json_encode($result, JSON_NUMERIC_CHECK);
                ?>
             
        }]
    });
    </script>

    <script>
      Highcharts.chart('container2', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Pobjeda'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.y}</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.y}',
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                }
            }
        },
        series: [{
            name: 'Pobjeda',
            colorByPoint: true,
            data: 
              <?php 
                
                $query = $connect->prepare("
     
                select naziv as name, 
                pobjeda as y
                from klub
                group by naziv
     ");
     $query->execute();
     $result = $query->fetchAll(PDO::FETCH_OBJ);
                echo json_encode($result, JSON_NUMERIC_CHECK);
                ?>
             
        }]
    });
    </script>

    <script>
      Highcharts.chart('container3', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Neriješenih'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.y}</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.y}',
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                }
            }
        },
        series: [{
            name: 'Neriješenih',
            colorByPoint: true,
            data: 
              <?php 
                
                $query = $connect->prepare("
     
                select naziv as name, 
                nerijesenih as y
                from klub
                group by naziv
     ");
     $query->execute();
     $result = $query->fetchAll(PDO::FETCH_OBJ);
                echo json_encode($result, JSON_NUMERIC_CHECK);
                ?>
             
        }]
    });
    </script>

    <script>
      Highcharts.chart('container4', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Poraza'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.y}</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.y}',
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                }
            }
        },
        series: [{
            name: 'Poraza',
            colorByPoint: true,
            data: 
              <?php 
                
                $query = $connect->prepare("
     
                select naziv as name, 
                izgubljenih as y
                from klub
                group by naziv
     ");
     $query->execute();
     $result = $query->fetchAll(PDO::FETCH_OBJ);
                echo json_encode($result, JSON_NUMERIC_CHECK);
                ?>
             
        }]
    });
    </script>

    <script>
      Highcharts.chart('container5', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Zabijenih golova'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.y}</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.y}',
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                }
            }
        },
        series: [{
            name: 'Zabijenih golova',
            colorByPoint: true,
            data: 
              <?php 
                
                $query = $connect->prepare("
     
                select naziv as name, 
                zabijenihgolova as y
                from klub
                group by naziv
     ");
     $query->execute();
     $result = $query->fetchAll(PDO::FETCH_OBJ);
                echo json_encode($result, JSON_NUMERIC_CHECK);
                ?>
             
        }]
    });
    </script>

    <script>
      Highcharts.chart('container6', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Primljenih golova'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.y}</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.y}',
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                }
            }
        },
        series: [{
            name: 'Primljenih golova',
            colorByPoint: true,
            data: 
              <?php 
                
                $query = $connect->prepare("
     
                select naziv as name, 
                primljenihgolova as y
                from klub
                group by naziv
     ");
     $query->execute();
     $result = $query->fetchAll(PDO::FETCH_OBJ);
                echo json_encode($result, JSON_NUMERIC_CHECK);
                ?>
             
        }]
    });
    </script>
</body>
</html>
