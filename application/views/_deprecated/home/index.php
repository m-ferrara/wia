<!DOCTYPE HTML>
<html>
<head>
<title>UMN Institute on the Environment's Water Valuation Infographic</title>
<meta name="author" content="Matthew Ferrara" />
<meta name="description" content="Discover citations by selected tag identifiers" />
<meta charset="utf-8" />
<link rel="stylesheet" type="text/css" href="assets/css/screen.css" />
<link rel='stylesheet' type='text/css' media='all' href='assets/css/jquery.dataTables.css' />
<link href="<?php echo base_url();?>assets/greybox/gb_styles.css" rel="stylesheet" type="text/css" />

<!-- greybox modal -->
<script type="text/javascript">
	var GB_ROOT_DIR = "<?php echo base_url();?>assets/greybox/";
</script>

<script>
var IoneMenuTop = {};
<?php 
 $isLogged = $this->session->userdata("validated"); 
// $isLogged = true; // for debug purposes only
if ($isLogged ) 
{
	echo "IoneMenuTop.isLogged = true;";
} else {
		echo "IoneMenuTop.isLogged = false;";
}
?>
</script>

</head>
<body>
<!-- * Skip Links * -->
<div id="header">

<!-- BEGIN CAMPUS LINKS -->
<div id="campus_links">
<p>Campuses: </p>
<ul>
	<li><a href="http://www.umn.edu">Twin Cities</a></li>	
	<li><a href="http://www.crk.umn.edu">Crookston</a></li>
	<li><a href="http://www.d.umn.edu">Duluth</a></li>
	<li><a href="http://www.morris.umn.edu">Morris</a></li>
	<li><a href="http://www.r.umn.edu">Rochester</a></li>
	<li><a href="http://www.umn.edu/campuses.php">Other Locations</a></li>
</ul>
</div>
<!-- END CAMPUS LINKS -->


<!-- * BEGIN TEMPLATE HEADER (MAROON BAR) * -->
<div id="headerUofM">
<div id="logo_uofm"><a href="http://www.umn.edu/">Go to U of M home page</a></div>
<!--BEGIN search div-->
	<div id="search_area">
		<div id="search_nav"><a href="http://onestop.umn.edu/" id="btn_onestop">OneStop</a> <a href="https://www.myu.umn.edu/" id="btn_myu">myU</a></div>
			<div class="search"> 
<form action="http://google.umn.edu/search" method="get" name="gsearch" id="gsearch" title="Search IonE Web site">
<input type="hidden" name="sitesearch" value="environment.umn.edu" />
<input type="text" id="search_field" name="q" value="Search IonE Web site" title="Search text" /> 
<input class="search_btn" type="image" src="http://www1.umn.edu/iree/incl/assets/img/search_button.gif" alt="Submit Search" value="Search" /> 
<input name="client" value="searchumn" type="hidden" />
<input name="proxystylesheet" value="searchumn" type="hidden" />
<input name="output" value="xml_no_dtd" type="hidden" />
</form> 	</div> 
		</div>
	</div>
</div>
<!-- end "search" area -->
<!--  START THE WEB APP - UMN HEADER END -->
<div id="full-background">
<div id="topBar">
	<div class="topBar-inner">
	<div class="topBar-title">
<span>IonE's Water Quality Infographic:</span>
	</div>
		<ul id="top-nav-buttons">
			<li class="smallbtn"  onClick="return GB_showCenter('', '<?php echo base_url();?>default_controller/about_us', 540, 820)">Learn More</li>
			<li class="smallbtn" onClick="return GB_showCenter('', '<?php echo base_url();?>default_controller/jscit_dash', 540, 680)">Add Citation</li>
			<li class="smallbtn refresh" >Refresh</li>
		</ul>
	</div>
</div>
<div id="wrapper" style="display: block; width: 960px; margin-left: auto; margin-right: auto; position: relative;">
<!--	<div id="top_nav">-->
<!--	</div>-->
	<!-- Title Circle which fills with active search query -->
<!--	<div id="circle1" class="titleCircle" ><div id="active_search"><ul id="active"></ul>-->
<!--	<input type="button" class='show-btn' name="show" value="show" />-->
<!--	</div>-->
<!--	</div>  end Title Circle -->
</div> 
</div>


<script src="assets/greybox/AJS.js"></script>
<script src="assets/greybox/AJS_fx.js"></script>
<script src="assets/greybox/gb_scripts.js"></script>
<!-- greybox modal -->

<script src="assets/js/jquery.js" type="text/javascript"></script>
<script src="assets/js/jquery-ui-1.10.0.custom.min.js"></script>
<script src="assets/js/hoverIntent.js" type="text/javascript"></script>
<script src="assets/js/datatable/jquery.dataTables.min.js"></script>
<script src="assets/js/responsiveinterface.utility.js" type="text/javascript"></script>
<script src="assets/js/initialize.js" type="text/javascript"></script>
<script src="assets/js/top-menu.js" type="text/javascript"></script>


<!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            var _gaq=[['_setAccount','UA-34608578-1'],['_trackPageview']];
            (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
            g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g,s)}(document,'script'));
        </script>
    </body>
</html>