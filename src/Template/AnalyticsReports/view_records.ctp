<div id="page-wrapper">
	<div class="container-fluid">
		<!-- Page Heading -->
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">
					Dashboard <small>Statistics Overview</small>
				</h1>
				<ol class="breadcrumb">
					<li class="active">
						<i class="fa fa-dashboard"></i> Dashboard
					</li>
				</ol>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-3 col-md-6">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-3">
								<i class="fa fa-comments fa-5x"></i>
							</div>
							<div class="col-xs-9 text-right">
								<div class="huge"><?php echo $todayCount; ?></div>
								<div>Today Visit!</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-6">
				<div class="panel panel-warning">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-3">
								<i class="fa fa-tasks fa-5x"></i>
							</div>
							<div class="col-xs-9 text-right">
								<div class="huge"><?php echo $weekVisit; ?></div>
								<div>Week Visit!</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-6">
				<div class="panel panel-success">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-3">
								<i class="fa fa-shopping-cart fa-5x"></i>
							</div>
							<div class="col-xs-9 text-right">
								<div class="huge"><?php echo $totalMonthCount; ?></div>
								<div>Month Visit!</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-6">
				<div class="panel panel-danger">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-3">
								<i class="fa fa-support fa-5x"></i>
							</div>
							<div class="col-xs-9 text-right">
								<div class="huge"><?php echo $totalCount; ?></div>
								<div>Total Visit!</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title"><i class="fa fa-bar-chart-o fa-fw"></i> Last 1 week visitors</h3>
					</div>
					<div class="panel-body">
						<div id="week_visitors"></div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title"><i class="fa fa-bar-chart-o fa-fw"></i> Last 6 month visitors</h3>
					</div>
					<div class="panel-body">
						<div id="chart_of_users"></div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title"><i class="fa fa-bar-chart-o fa-fw"></i>Visitor by country</h3>
					</div>
					<div class="panel-body">
						<div id="mapdiv" style=" height:440px;"></div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-4">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title"><i class="fa fa-long-arrow-right fa-fw"></i> Returnning User Ratio</h3>
					</div>
					<div class="panel-body">
						<div id="graph"></div>
					</div>
				</div>
			</div>
			<div class="col-lg-8">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title"><i class="fa fa-clock-o fa-fw"></i>Top Referrer</h3>
					</div>
					<div class="panel-body">
						<div class="list-group" style="height:327px;overflow-y:auto">
							<?php foreach($reffererUser as $ref){ ?>
							<a target="_blank" href="<?php echo $ref->ref; ?>" class="list-group-item">
								<span class="badge"> <?php echo $ref->count; ?></span>								
								<i class="fa fa-fw fa-check"></i><?php echo $ref->ref; ?>
							</a>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php 
echo $this->Html->css(array(
	'https://cdnjs.cloudflare.com/ajax/libs/jqPlot/1.0.9/jquery.jqplot.min.css',
	'https://cdnjs.cloudflare.com/ajax/libs/ammaps/3.13.0/ammap.css'
	),
	array('block' =>'css')); ?>      
	<!-- /#page-wrapper -->
<?php echo $this->Html->script(array(
	'https://cdnjs.cloudflare.com/ajax/libs/jqPlot/1.0.9/jquery.jqplot.min.js', 
	'https://cdnjs.cloudflare.com/ajax/libs/jqPlot/1.0.9/plugins/jqplot.categoryAxisRenderer.min.js',
	'https://cdnjs.cloudflare.com/ajax/libs/jqPlot/1.0.9/plugins/jqplot.pointLabels.min.js',
	'//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js',
	'//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js',
	'https://cdnjs.cloudflare.com/ajax/libs/ammaps/3.13.0/ammap.js',
	'https://cdnjs.cloudflare.com/ajax/libs/ammaps/3.13.0/maps/js/worldLow.js'
	),array('block' =>'custom_script'));
$this->Html->scriptStart(array('inline' => true,'block' => 'custom_script')); ?>
	$(document).ready(function(){
	var barSeriesDefault	=	{
		renderer:$.jqplot.BarRenderer,
		pointLabels: { show: true },
		rendererOptions: {
		barPadding: 8,
		barMargin: 10,
		barWidth: 15,
		barDirection: 'vertical',
		shadowOffset: 2,
		shadowDepth: 5,
		shadowAlpha: 0.8			
		}
	};

	/** USERS  #START **/
		var ticks1 = new Array();
		var var1	=	[];
		<?php 
		if(!empty($userByMonth)){
			$i	=	1;
			foreach($userByMonth as $key => $user){ ?>
				ticks1.push([ "<?php echo $key; ?>"]);
				var1.push([<?php echo $i; ?>, <?php echo $user; ?>]);
		<?php $i++;
			}
		} ?>
		plot2 = $.jqplot('chart_of_users', [var1], {
				seriesDefaults: barSeriesDefault,
				seriesColors:['red'],	// colors of the bar
				series:[
					{label: "No. of User"}
				],
		legend:{
				renderer: $.jqplot.EnhancedLegendRenderer,
				show:true,
				location: 'nw'
			},									
		axes:{
				xaxis: {
					renderer: $.jqplot.CategoryAxisRenderer,
					ticks: ticks1,
					axisLabel: "Months",
					axisLabelUseCanvas: true,
					axisLabelFontSizePixels: 12,
					axisLabelFontFamily: 'Verdana, Arial',
				},
				yaxis: {
					axisLabel: "No. of users",
					axisLabelUseCanvas: true,
					axisLabelFontSizePixels: 12,
					axisLabelFontFamily: 'Verdana, Arial',
					axisLabelPadding: 3,
				},
			},														
		 highlighter: {
				showMarker: false,
				tooltipAxes: 'xy',
				showTooltip: true,
				show: true,
				sizeAdjust: 10,
				// tooltipContentEditor:customCompanyTooltip				
			}					
		});	
		
		var ticks1 = new Array();
		var var1	=	[];
		<?php 
		if(!empty($userByDay)){
			$i	=	1;
			foreach($userByDay as $key => $user){ ?>
				ticks1.push([ "<?php echo $key; ?>"]);
				var1.push([<?php echo $i; ?>, <?php echo $user; ?>]);
		<?php $i++;
			}
		} ?>
		plot2 = $.jqplot('week_visitors', [var1], {
				seriesDefaults: barSeriesDefault,
				seriesColors:['red'],	// colors of the bar
				series:[
					{label: "No. of User"}
				],
		legend:{
				renderer: $.jqplot.EnhancedLegendRenderer,
				show:true,
				location: 'nw'
			},									
		axes:{
				xaxis: {
					renderer: $.jqplot.CategoryAxisRenderer,
					ticks: ticks1,
					axisLabel: "Days",
					axisLabelUseCanvas: true,
					axisLabelFontSizePixels: 12,
					axisLabelFontFamily: 'Verdana, Arial',
				},
				yaxis: {
					axisLabel: "No. of users",
					axisLabelUseCanvas: true,
					axisLabelFontSizePixels: 12,
					axisLabelFontFamily: 'Verdana, Arial',
					axisLabelPadding: 3,
				},
			},														
		 highlighter: {
				showMarker: false,
				tooltipAxes: 'xy',
				showTooltip: true,
				show: true,
				sizeAdjust: 10			
			}					
		});	
	
	<?php  
	$returnUser = ($userUniqCount/$totalCount)*100;
	$total		= 100-$returnUser;
	?>
	Morris.Donut({
      element: 'graph',
      data: [
        {value: <?php echo $total; ?>, label: 'Returnning User'},
        {value: <?php echo $returnUser; ?>, label: 'New User'}
      ],
      backgroundColor: '#ccc',
      labelColor: '#060',
      colors: [
        '#0BA462',
        '#39B580',
        '#67C69D',
        '#95D7BB'
      ],
      formatter: function (x) { return x + "%"}
    });
	
var map = AmCharts.makeChart("mapdiv", {
	"pathToImages":'https://cdnjs.cloudflare.com/ajax/libs/ammaps/3.13.0/images/',
	"type": "map",
  "theme": "light",
  "colorSteps": 10,
  "projection": "eckert3",
  "dataProvider": {
    "map": "worldLow",
    "getAreasFromMap": true,
	"areas": [<?php $maxCount = 0; foreach($countryList as $key => $country){ 
	if($country['count'] > $maxCount){
		$maxCount	=	$country['count'];
	}
	if($country['count'] >0){ echo '{"title":"'.$country['name'].'('.$country['count'].')","id":"'.$key.'","value":"'.($country['count']*10000).'"},'; } 
	} ?>]
  },
 
  <?php /*
   "areasSettings": {
    "selectedColor": "#42f4e2",
    "selectable": true
  },
  "listeners": [{
    "event": "init",
    "method": function(e) {
		preSelectCountries( [<?php 
				foreach($countryList as $key => $country){
					echo '"'.$key.'",'; 
				} ?>]);
    }
  }],*/ ?>
    "areasSettings": {
    "autoZoom": true,
	"color" : "#b2a489"
   },
	"valueLegend": {
		"right": 10,
		"minValue": "0",
		"maxValue": "<?php echo $maxCount; ?>"
	},
	"export": {
		"enabled": true
	 }
});

map.addListener("clickMapObject", function (event) {
    // document.getElementById("info").innerHTML = 'Clicked ID: ' + event.mapObject.id + ' (' + event.mapObject.title + ')';
	// alert(event.mapObject.title);
});
function preSelectCountries(list) {
  for(var i = 0; i < list.length; i++) {
    var area = map.getObjectById(list[i]);
    area.showAsSelected = true;
    map.returnInitialColor(area);
  }
}
});

<?php $this->Html->scriptEnd(); ?>