<!DOCTYPE html>
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Water Quality Valuation</title>
        
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/dev/dev.css"></link>

<style type='text/css' media='all'>
@import url('./assets/css/water.css');
</style>
<link rel='stylesheet' type='text/css' media='all' href='<?php echo base_url();?>assets/css/water.css' />
<link rel='stylesheet' type='text/css' media='all' href='<?php echo base_url();?>assets/css/jquery.dataTables.css' />



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
            <p class="chromeframe">You are using an outdated browser.Likely will display funky, we're sorry :/ </p>
        <![endif]-->

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
</form> 
</div> 

</div></div>
</div>
<!-- end "search" area -->
<!--List of Menus - opened on breadcrumb btn menu click-->
<ul>
<li id="infographicsMenu" class="menu">
<ul class="Mpadding">
<li id="launchTags" class="tab five smallbtn">Press To See All Tags</li>
</ul></li>
<li id="userMenu" class="menu">
<ul>
<li id="loginTab" class="tab five smallbtn" onClick="return GB_showCenter('Log In', '<?php echo base_url();?>default_controller/js_login', 480, 720)">Log In</li>
<li id="rgstrTab" class="tab five smallbtn" onClick="return GB_showCenter('Register', '<?php echo base_url();?>default_controller/js_signup', 480, 720)">Register for Account</li>
</ul>
</li>
</ul>
<!--end of Menus List-->

 
<div id="bcrmbNav">
 <div id="spinner"><img src='<?php echo base_url();?>assets/images/ajax-loader-1.gif' alt='loading'></img> Loading... Please Wait...</div>

<div id='breadcrumb'><a onClick="topNavMap();">All Categories</a></div>
	
	<ul>
	<li class="tab five">Infographics Menu</li>
	<li class="tab five">User Menu</li>
	</ul>
	
</div>
<div id='wrapper'>


<div id="content">
</div>

<div id='top_nav'><!-- #top_nav -->
<!--<form id="tagsList"></form>-->
</div> <!-- end #top_nav -->
	<div id="circle1" class="titleCircle" ><div id="active_search"><ul id="active"></ul>
<input type="button" class='show-btn' name="show" value="show" />
</div>
</div>


</div>
<!---->
<!--COMMETING OUT OLD HTML STRUCTURES-->
<!--<div id='citations'></div>-->
<!--<div id='linkages'></div>-->
<!--<div id='valuations'></div>-->
<!--<div id='top_nav'></div>-->
<!--<div id="tags_nav"></div>-->


<script type="text/javascript">
	var GB_ROOT_DIR = "<?php echo base_url();?>assets/greybox/";
</script>
<script src="<?php echo base_url();?>assets/greybox/AJS.js"></script>
<script src="<?php echo base_url();?>assets/greybox/AJS_fx.js"></script>
<script src="<?php echo base_url();?>assets/greybox/gb_scripts.js"></script>
<link href="<?php echo base_url();?>assets/greybox/gb_styles.css" rel="stylesheet" type="text/css" />
<!--<script src="<?php //echo base_url();?>assets/js/jquery-ui-1.8.23.custom.js"></script>-->


 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
<script src="<?php echo base_url();?>assets/js/datatable/jquery.dataTables.min.js"></script>
<!--<script src="<?php //echo base_url()."assets/js/nav_scripts.js";?>"></script>-->
<!--<script src="<?php // echo base_url()."assets/js/loadables.js";?>"></script>-->

<script src="<?php echo base_url()."assets/js/responsiveinterface.utility.js";?>"></script>

<script >
(function($){
	   $(function(){

			ione.createTagMenu();
			attachEvents.tagsClicked();
	      // Run on DOM ready
		      $(".hCircle").hover( function() { $(this).children(".tagContentHover").css({"display" : "block"}); }, function() { $(this).children(".tagContentHover").css({"display" : "none"}); });

 var famSelected = $("div.selected");
	if ($("div.selected")) {
		var tagContentHover = $("li.selected").parent().parent();
	// show the tag tooltip
	$(tagContentHover).css({"display" : "block"});
	// detach hovering tag category from show/hide tooltip while tag member is selected
	$(tagContentHover).parent().unbind('mouseenter mouseleave');
	}


	attachEvents.tagsClicked();
	   });
	//ione.createTagMenu();
	   // Run right away
	   
		
	})(jQuery);

function dogTag() {
$(".hCircle").hover( function() { $(this).children(".tagContentHover").css({"display" : "block"}); }, function() { $(this).children(".tagContentHover").css({"display" : "none"}); });

$("ul#active li").hover(function() { $(this).css({"color" : "#000000"}); }, function() { $(this).css({"color" : "#FFFFFF"}); });

var famSelected = $("div.selected");
if ($("div.selected")) {
	var tagContentHover = $("div.selected, div.rem-option").parent().parent().parent();
// show the tag tooltip
$(tagContentHover).css({"display" : "block"});
// detach hovering tag category from show/hide tooltip while tag member is selected
$(tagContentHover).parent().unbind('mouseenter mouseleave');
}
   }

setInterval("dogTag()", 1000);

</script>


<!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            var _gaq=[['_setAccount','UA-34608578-1'],['_trackPageview']];
            (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
            g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g,s)}(document,'script'));
        </script>
    </body>
</html>