<?php
include '../../../baseAdmin.php';

//$garageController2 = new GarageController();
//$userController = new UserController();

$reservations = $garageController->getAllReservation();
$services     = $garageController->getServices();
$array        = [];
$arrayStatus  = [];

$var1 = array(
	'label' => "wait",
	'value' => 0
);
$var2 = array(
	'label' => "accepted",
	'value' => 0
);
$var3 = array(
	'label' => "refused",
	'value' => 0
);
array_push( $arrayStatus, $var1 );
array_push( $arrayStatus, $var2 );
array_push( $arrayStatus, $var3 );

foreach ( $services as $service ) {
	$var = array(
		"id"      => $service["id"],
		'service' => $service["name"],
		'value'   => 0
	);
	array_push( $array, $var );
}

foreach ( $reservations as $reservation ) {
	foreach ( $array as &$val ) {
		if ( $val["id"] == $reservation["id_service"] ) {
			$val["value"] ++;
		}
	};
	foreach($arrayStatus as &$val){
		if ( $val["label"] == $reservation["status"] ) {
			$val["value"] ++;
		}
    }
}

//var_dump( $arrayStatus );

?>


<?php startblock( "main" ); ?>
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Statistiques</h3>
        </div>

        <div class="title_right">
            <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                </div>
            </div>
        </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-2"></div>
        <!-- bar chart -->
        <div class="col-md-8">
            <div class="x_panel">
                <div class="x_title">
                    <h2>#Reservation par service
                        <small>Sessions</small>
                    </h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-expanded="false"><i class="fa fa-wrench"></i></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Settings 1</a>
                                </li>
                                <li><a href="#">Settings 2</a>
                                </li>
                            </ul>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div id="graph_bar" style="width:100%; height:280px;"></div>
                </div>
            </div>
        </div>
        <!-- /bar charts -->
        <div class="col-md-2"></div>

    </div>
    <div class="row">
        <div class="col-md-2"></div>
        <!-- bar chart -->
        <div class="col-md-8">
            <!-- pie chart -->
            <div class="x_panel">
                <div class="x_title">
                    <h2>Status des reservations
                        <small>Pourcentage</small>
                    </h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-expanded="false"><i class="fa fa-wrench"></i></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Settings 1</a>
                                </li>
                                <li><a href="#">Settings 2</a>
                                </li>
                            </ul>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content2">
                    <div id="graph_donut" style="width:100%; height:300px;"></div>
                </div>
            </div>
            <!-- /Pie chart -->
        </div>
        <!-- /bar charts -->
        <div class="col-md-2"></div>

    </div>
</div>
<?php endblock(); ?>

<? startblock( "javascripts" ) ?>
<script>
    var dataStatus = [
	    <?php
	    for ( $i = 0; $i < count( $arrayStatus ); $i ++ ) {
		    echo '{ label :"' . $arrayStatus[ $i ]["label"] . '", value : "' . $arrayStatus[ $i ]["value"] . '" },';
	    }
	    ?>
    ];
    var barGraphData = [
		<?php
		for ( $i = 0; $i < count( $array ); $i ++ ) {
			echo '{ service :"' . $array[ $i ]["service"] . '", reservations : "' . $array[ $i ]["value"] . '" },';
		}
		?>
    ];

    $(document).ready(function () {
        init_morris_charts();
    });


    function init_morris_charts() {
        "undefined" != typeof Morris && (console.log("init_morris_charts"), $("#graph_bar").length && Morris.Bar({
            element: "graph_bar",
            data: barGraphData,
            xkey: "service",
            ykeys: ["reservations"],
            labels: ["Reservations"],
            barRatio: .4,
            barColors: ["#26B99A", "#34495E", "#ACADAC", "#3498DB"],
            xLabelAngle: 35,
            hideHover: "auto",
            resize: !0
        }), $("#graph_bar_group").length && Morris.Bar({
            element: "graph_bar_group",
            data: [
                {
                period: "2016-10-01",
                licensed: 807,
                sorned: 660
            }, {
                period: "2016-09-30",
                licensed: 1251,
                sorned: 729
            }, {
                period: "2016-09-29",
                licensed: 1769,
                sorned: 1018
            }, {
                period: "2016-09-20",
                licensed: 2246,
                sorned: 1461
            }, {
                period: "2016-09-19",
                licensed: 2657,
                sorned: 1967
            }, {
                period: "2016-09-18",
                licensed: 3148,
                sorned: 2627
            }, {
                period: "2016-09-17",
                licensed: 3471,
                sorned: 3740
            }, {
                period: "2016-09-16",
                licensed: 2871,
                sorned: 2216
            }, {
                period: "2016-09-15",
                licensed: 2401,
                sorned: 1656
            }, {
                period: "2016-09-10",
                licensed: 2115,
                sorned: 1022
            }],
            xkey: "period",
            barColors: ["#26B99A", "#34495E", "#ACADAC", "#3498DB"],
            ykeys: ["licensed", "sorned"],
            labels: ["Licensed", "SORN"],
            hideHover: "auto",
            xLabelAngle: 60,
            resize: !0
        }), $("#graphx").length && Morris.Bar({
            element: "graphx",
            data: [
                {
                x: "2015 Q1",
                y: 2,
                z: 3,
                a: 4
            }, {
                x: "2015 Q2",
                y: 3,
                z: 5,
                a: 6
            }, {
                x: "2015 Q3",
                y: 4,
                z: 3,
                a: 2
            }, {
                x: "2015 Q4",
                y: 2,
                z: 4,
                a: 5
            }],
            xkey: "x",
            ykeys: ["y", "z", "a"],
            barColors: ["#26B99A", "#34495E", "#ACADAC", "#3498DB"],
            hideHover: "auto",
            labels: ["Y", "Z", "A"],
            resize: !0
        }).on("click", function (a, b) {
            console.log(a, b)
        }), $("#graph_area").length && Morris.Area({
            element: "graph_area",
            data: [
                {
                period: "2014 Q1",
                iphone: 2666,
                ipad: null,
                itouch: 2647
            }, {
                period: "2014 Q2",
                iphone: 2778,
                ipad: 2294,
                itouch: 2441
            }, {
                period: "2014 Q3",
                iphone: 4912,
                ipad: 1969,
                itouch: 2501
            }, {
                period: "2014 Q4",
                iphone: 3767,
                ipad: 3597,
                itouch: 5689
            }, {
                period: "2015 Q1",
                iphone: 6810,
                ipad: 1914,
                itouch: 2293
            }, {
                period: "2015 Q2",
                iphone: 5670,
                ipad: 4293,
                itouch: 1881
            }, {
                period: "2015 Q3",
                iphone: 4820,
                ipad: 3795,
                itouch: 1588
            }, {
                period: "2015 Q4",
                iphone: 15073,
                ipad: 5967,
                itouch: 5175
            }, {
                period: "2016 Q1",
                iphone: 10687,
                ipad: 4460,
                itouch: 2028
            }, {
                period: "2016 Q2",
                iphone: 8432,
                ipad: 5713,
                itouch: 1791
            }],
            xkey: "period",
            ykeys: ["iphone", "ipad", "itouch"],
            lineColors: ["#26B99A", "#34495E", "#ACADAC", "#3498DB"],
            labels: ["iPhone", "iPad", "iPod Touch"],
            pointSize: 2,
            hideHover: "auto",
            resize: !0
        }), $("#graph_donut").length && Morris.Donut({
            element: "graph_donut",
            data: dataStatus,
            colors: ["#26B99A", "#42f459", "#f44141", "#3498DB"],
            formatter: function (a) {
                return a + ""
            },
            resize: !0
        }), $("#graph_line").length && (Morris.Line({
            element: "graph_line",
            xkey: "year",
            ykeys: ["value"],
            labels: ["Value"],
            hideHover: "auto",
            lineColors: ["#26B99A", "#34495E", "#ACADAC", "#3498DB"],
            data: [
                {
                year: "2012",
                value: 20
            }, {
                year: "2013",
                value: 10
            }, {
                year: "2014",
                value: 5
            }, {
                year: "2015",
                value: 5
            }, {
                year: "2016",
                value: 20
            }],
            resize: !0
        }), $MENU_TOGGLE.on("click", function () {
            $(window).resize()
        })))
    }

</script>
<?php endblock(); ?>

