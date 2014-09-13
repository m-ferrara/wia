<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<!--[if lt IE 9]>
<script src="<?php echo base_url();?>assets/js/dist/html5shiv.js"></script>
<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Water Quality Valuation</title>
<style type='text/css' media='all'>
@import url('./assets/css/water.css');
</style>
<link rel='stylesheet' type='text/css' media='all' href='<?php echo base_url();?>assets/css/water.css' />
  <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css">
        <script src="js/vendor/modernizr-2.6.1.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>
        <![endif]-->

<!-- * Skip Links * -->
<div id="header">

<!-- BEGNIN CAMPUS LINKS -->
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
</form> 
</div> 

</div></div>
<!-- end "search" area -->
</div>
<div id='breadcrumb'><a onClick="topNavMap();">All Categories</a><a></a><a></a></div>
<div id='leftside'>
<a class='title'>Water Quality Valuation Resources</a><a class='alt-title'></a>
<div id='border1'></div>
<p class='introtext'>
Welcome to the UMN&#39;s Institute on the Environment &#45; Water Quality Valuation Resources Web Application.
Use this to find and share research articles regarding topics of interest, organized by Tag categories. 
</p><p class='alt-text'></p>
<div id='border2'></div>
<div id='nav_list'></div>
<div id='menu_list'>
<ul>
<?php if ($this->session->userdata("validated")==true) 
	{ echo ' <li><a href=\'default_controller/jstop_dash\' onClick="return GB_showCenter(\'Topics\', this.href, 480, 720)">
Add Category</a></li>
<li><a href=\'default_controller/do_logout\'>Log Out</a></li>  ';
	} 
elseif ($this->session->userdata("validated")==false) { echo '
<li><a href=\'default_controller/js_login\' onClick="return GB_showCenter(\'Log In\', this.href, 480, 720)">Log In | Sign Up</a></li>'; 
}
?> 
</ul>
</div>
	<div  id='launchDisplayA' onclick="existingValuations();">Show Ecosystem Services Display</div>
	<div id='launchDisplay' onclick="topNavMap();">Show Tag Based Display</div>
</div>

<div id='LaunchDisplayMenu'> <h2 class='closed'>Navigation Toolbar: Expand to Search by Tag, Author, Publication, Year Published, Ranking, ETC.</h2><a id='closebox' onclick='closeMenu();'>X Minimize ToolBox</a><a id='openbox' onclick='viewMenu();'>X Expand ToolBox</a>
<p class='welcometext'>
Welcome to the UMN&#39;s Institute on the Environment &#45; Water Quality Valuation Resources Web Application.
Use this to find and share research articles regarding topics of interest, organized by Tag categories. 
</p><br/>
<form id='searchbox'>
	<ul id='search_toolbox' style='list-style-type: none; margin:20px; padding: 50px;'>
	<li class='toolbx_hdr'>Search by:</li>
		<li class='toolbx_cat'>- <a class='author_cat' onclick='showSearchCat("author");'>Author</a> -</li>
			
				<li class='toolbx_selectedauthor' style="display:none;">Enter author name here:
			
					<input type='text' name='author' id='author' size=50 /></li>		
		
		<li class='toolbx_cat'>-  <a class='article_cat' onclick='showSearchCat("article");'>Article Title</a> -</li>
				<li class='toolbx_selectedarticle' style="display:none;">Enter article title here:
				<input type='text' name='articlename' id='articlename' size=50 /></li>		
				
		<li class='toolbx_cat'>-  <a class='publication_cat' onclick='showSearchCat("publication");'>Publication </a>-</li>
				<li class='toolbx_selectedpublication' style="display:none;">Enter Publication name here:
				<input type='text' id='pubtitle' name='pubtitle' size=50 /></li>
				
		<li class='toolbx_cat'>-  <a class='date_cat' onclick='showSearchCat("date");'>Date </a>-</li>
				<li class='toolbx_selecteddate' style="display:none;">Enter date (year) here:
				<input type='text' id='pubdate' name='pubdate' size=50 /></li>
				
		<li class='toolbx_cat'>-  <a class='rating_cat' onclick='showSearchCat("rating");'> Rating </a>-</li>
				<li class='toolbx_selectedrating' style="display:none;">Select to show entries rated:
				<ul id="ratings">
				<li class="checkbox" ><input type="checkbox" id='rating[]' name='rating[]' value="5"><label for="rating">5-Highest</label></input></li>
				<li class="checkbox"><input type="checkbox" id='rating[]' name='rating[]' value="4"><label for="rating">4</label></input></li>
				<li class="checkbox"><input type="checkbox" id='rating[]' name='rating[]' value="3"><label for="rating">3</label></input></li>
				<li class="checkbox"><input type="checkbox" id='rating[]' name='rating[]' value="*"><label for="rating">Display All</label></input></li>
				</ul>
				</li>
		<li class='toolbx_cat'>-  <a class='tags_cat' onclick='showSearchCat("tags");'>Tags </a>-</li>
				<li class='toolbx_selectedtags' style="display:none; height: 200px; overflow-y: scroll; overflow-x:hidden; "> 
				Click Tag Group to view and select searchable tags.
				<!-- Now JQuery load input options for entry tagging -->
<p class='checkheader' onclick="showTags('ecoservice');">Assigned Ecosystem Service:
<span style="font-size: 12px; color:#fff; font-weight: 300;"> (e.g. Swimming, Safe Drinking Water, Fishing...)</span>
</p> 

<ul id="ecoservice"  style="display:none;">

</ul>
<p class='checkheader' onclick="showTags('endpoint');">Assigned End Point:
<span style="font-size: 12px; color:#fff; font-weight: 300;"> (e.g. River, Lake, Coastal...)</span>
</p> 

<ul id="endpoint" style="display:none;">

</ul>
<p class='checkheader' onclick="showTags('constituent');">Assigned Constituent:<span style="font-size: 12px; color:#fff; font-weight: 300;"> (e.g. Nitrogen, Phosphorous...) </style></p> 
<ul id="constituent" style="display:none;">

</ul>
<p class='checkheader' onclick="showTags('val_appch');">Valuation Approach: <span style="size: 12px; color:#fff; font-weight: 300;">(e.g. Recreational Demand Model, Avoided Cost, Hedonic...) </span></p> 
<ul id="val_appch" style="display:none;">

</ul>
<p class='checkheader' onclick="showTags('valattrib');">Valued Attribute:<span style="font-size: 12px; color:#fff; font-weight: 300;">(e.g. Water Clarity, Sediment, etc.)</span></p>
<ul id="valattrib" style="display:none;">

</ul>
<!-- END Tagging --></li>
<li><input type='button' value='Refresh Results | Search' name='srch_qry' class='button' id='srch_qry' /> 

<input type='button' value='SHOW | HIDE all Search Fields' name='showfields' class='showfields' onclick='showFields();' id='showfields' />

<input type='reset' value='Reset/empty form' name='srch_qry' class='reset' id='srch_qry' /></li>
	</ul>
	
</form>
	<p class='resize_notifier' style="position: absolute; bottom: 2%; height: 20px; font-size: 12px; text-align:right; left: 84%; width: 14%; margin-right: 2%; color: #CFCFCF;">Resize this box, click and drag here &#62; &#62; </p>

</div>
 
<div id="spinner"><img src='<?php echo base_url();?>assets/images/ajax-loaderb.gif' alt='loading'></img> Loading... Please Wait...</div>

<div id='wrapper'>
<!--   // Alignment stuff for circle map

<div id="circleMark"></div><div id="circleMarka"></div><div id="circleMarkb"></div><div id="circleMarkc"></div>
<div id="quad1"></div>
<div id="quad2"></div>
<div id="quad3"></div>
<div id="quad4"></div>   -->




<div id='citations'></div>
<div id='linkages'></div>
<div id='valuations'></div>
<div id='top_nav'></div>
<div id="tags_nav"></div>
</div>

<script type="text/javascript">
	var GB_ROOT_DIR = "<?php echo base_url();?>assets/greybox/";
</script>
<script src="<?php echo base_url();?>assets/greybox/AJS.js"></script>
<script src="<?php echo base_url();?>assets/greybox/AJS_fx.js"></script>
<script src="<?php echo base_url();?>assets/greybox/gb_scripts.js"></script>
<link href="<?php echo base_url();?>assets/greybox/gb_styles.css" rel="stylesheet" type="text/css" />
<script src="<?php echo base_url();?>assets/js/jquery.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
<script src="<?php echo base_url()."assets/js/nav_scripts.js";?>"></script>
 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
<script src="<?php echo base_url()."assets/js/loadables.js";?>"></script>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.8.0.min.js"><\/script>')</script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            var _gaq=[['_setAccount','UA-34608578-1'],['_trackPageview']];
            (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
            g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g,s)}(document,'script'));
        </script>
    </body>
</html>


