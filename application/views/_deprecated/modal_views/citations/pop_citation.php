<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Add Citations</title>
<link rel='stylesheet' type='text/css' media='all' href="../assets/css/jquery-ui-1.10.0.custom.min.css" />
<link rel='stylesheet' type='text/css' media='all' href='../assets/css/bootstrap/css/bootstrap-responsive.min.css' />
<link rel='stylesheet' type='text/css' media='all' href='../assets/css/bootstrap/css/bootstrap.css' />
<!--<link rel='stylesheet' type='text/css' media='all' href='../assets/css/forms.css' />-->
<style>
.error {
		color: rgb(255, 204, 0);
		font-size: 12px;
		padding: 0;
		margin: 0;
		}
.ui-autocomplete-category {
      	font-weight: bold;
      	font-size: 1.2em;
      }

.form-horizontal .control-label {
		float: left;
		width: 120px;
		padding-top: 5px;
		text-align: right;
		}
.form-horizontal .controls {
		margin-left: 130px;
		}
.help-block, .help-inline {
		color: rgb(190, 190, 190);
		}
</style>
<script src="../assets/js/jquery.js"></script>
<!--<script src="../assets/js/jquery-ui-1.10.0.custom.min.js"></script>-->
<script src="../assets/js/jquery-ui-1.10.0.custom.js"></script>
<script src="../assets/js/modaljs/citation.js"></script>

</head>

<body>
<div id="content-wrapper" >

<div class="row">
  <div class="span9">
<form class="form-horizontal">
<fieldset>
 <legend>Add Citation</legend>
    <div class="row">
      <div class="span5">

  <div class="control-group">
    <label class="control-label" for="author">Author(s):</label>
    <div class="controls">
      <input type="text" name='author' id='author'>
    </div>
    <label class='error' for='name' id='author_error'>&#42;This field is required.</label>
  </div>
   <div class="control-group">
    <label class="control-label" for="pubdate">Publication Year:</label>
    <div class="controls">
      <input type="text" id="pubdate" name="pubdate">
    </div>
    <label class='error' id='pubdate_error'>&#42;This field is required.</label>
  </div>
  <div class="control-group">
    <label class="control-label" for="articlename">Article Name:</label>
    <div class="controls">
      <input type="text" name='articlename' id='articlename'>
    </div>
  	<label class='error' id='articlename_error'>&#42;This field is required.</label>
  </div>
    <div class="control-group">
    <label class="control-label" for="pubtitle">Publication Title:</label>
    <div class="controls">
      <input type="text" name='pubtitle' id='pubtitle'>
    </div>
    <label class='error' id='pubtitle_error'>&#42;This field is required.</label>
  </div> 
   <div class="control-group">
    <label class="control-label" for="volume">Volume/Issue:</label>
    <div class="controls">
      <input type="text" name='volume' id='volume'>
    </div>
    <label class='error' id='volume_error'>&#42;This field is required.</label>
  </div>
   <div class="control-group">
    <label class="control-label" for="pages">Pages:</label>
    <div class="controls">
      <input type="text" name='pages' id='pages'>
    </div>
    <label class='error' id='pages_error'>&#42;This field is required.</label>
  </div>
   <div class="control-group">
    <label class="control-label" for="ilink">Web Address (if available online):</label>
    <div class="controls">
      <input type="text" id='ilink' name="ilink">
    </div>
    <label class='error' id='ilink_error'>&#42;This field is required.</label>
  </div>
  
	  </div>
  
      <div class="span4">
 
  	<div>
 		 <label for="tagsSelected">Selected Tags:</label>
  		<div id="tagsSelected">
 	 	</div>
 	</div>
<!-- Now JQuery load input options for entry tagging -->  
<div class="ui-widget">
   <div>
  	<label for="tags">Tags:</label>
  	<div>
  	<input id="tags" name='tags'  type="text" />
 	 </div>
 	 <span class="help-block">
 	 Type and select tags from auto-complete list. <a id="modal-opener" href="#">Click here to view <br>tag family descriptions.</a>
 	 </span>
 	 <div id="about-tags-modal" title="Tag Family Descriptions">
 	 	<ul>
 	 		<li>Geography
 	 			<ul>
 	 				<li>Area of study in the United States and Internationally (e.g. Midwest, Europe)</li>
 	 			</ul>
 	 		</li>
 	 		<li>End Points
 	 			<ul>
 	 				<li>Distinct water-body ecosystems (e.g. River, Lake)</li>
 	 			</ul>
 	 		</li>
 	 		<li>Constituents
 	 			<ul>
 	 				<li>Chemical and/or Environmental factors which influence a body of water</li>
 	 			</ul>
 	 		</li>
 	 		<li>Valuation Approaches
 	 			<ul>
 	 				<li>Common models by which water-systems are evaluated</li>
 	 			</ul>
 	 		</li>
 	 		<li>Ecosystem Services
 	 			<ul>
 	 				<li>Activities and/or Uses of water</li>
 	 			</ul>
 	 		</li>
 	 	</ul>
 	 </div>
  </div>
 </div>

<br/>
  
      <button type="submit" class="btn">Submit</button>
  
      
      </div>
    </div>
  </div>
</div>

 <div id="float-left-col1">

 </div>
 <div id="float-left-col2">

</div>      
 </fieldset>
</form>


</div>
</body>
</html>

  