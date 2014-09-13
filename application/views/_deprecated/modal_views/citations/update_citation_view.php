<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Citation</title>
<link rel='stylesheet' type='text/css' media='all' href='<?php echo base_url();?>assets/css/forms.css' />

<script src="<?php echo base_url()."assets/js/jquery.js";?>"></script>
<script src="<?php echo base_url()."assets/js/modaljs/citation_update.js";?>"></script>
</head><body>
<?php foreach ($citations as $citation): ?>
<a class="goback" href='<?php echo base_url()."default_controller/view_citation?cit_id=".$citation['cit_id'].""?>'> Return to View Entry - Cancel Changes </a>
<form id='citations_form'>

<div class='citform'>
<label for='citfrom' id='citform_label'>Update Citation</label>
	<br/>
	  <input type="hidden" value="<? echo $citation['cit_id'];?>" name='cit_id' id='cit_id'></input>
      <label class='error' for='linkage_id' id='linkageid_error'>This field is required.</label>

	  <label for='author' id='author_label'>Author&#40;s&#41;:
      <input type='text' name='author' id='author' size='25' value='<?php echo $citation['author'] ?> ' class='text-input' /></label>
      <label class='error' for='name' id='author_error'>This field is required.</label>
      <br/>

      <label for='pubdate' id='pubdate_label'>Publication Year:
      <input type='text' name='pubdate' id='pubdate' size='25' value='<?php echo $citation['pub_date']; ?>' class='text-input' /></label>
      <label class='error' for='pubdate' id='pubdate_error'>This field is required.</label>
	  <br/>

      <label for='articlename' id='articlename_label'>Article Name:
      <input type='text' name='articlename' id='articlename' size='25' value='<?php echo $citation['article_name']; ?>' class='text-input' /></label>
      <label class='error' for='articlename' id='articlename_error'>This field is required.</label>
   	  <br/>
   	 
      <label for='pubtitle' id='pubtitle_label'>Publication Title:
      <input type='text' name='pubtitle' id='pubtitle' size='25' value='<?php echo $citation['publication_title']; ?>' class='text-input' /></label>
      <label class='error' for='pubtitle' id='pubtitle_error'>This field is required.</label>
	  <br/>
	  
      <label for='volume' id='volume_label'>Volume And&#47;Or Issue Number:
      <input type='text' name='volume' id='volume' size='25' value='<?php echo $citation['volume_issue']; ?>' class='text-input' /></label>
      <label class='error' for='volume' id='volume_error'>This field is required.</label>
	  <br/>
	  
      <label for='pages' id='pages_label'>Pages:
      <input type='text' name='pages' id='pages' size='25' value='<?php echo $citation['pages']; ?>' class='text-input' /></label>
      <label class='error' for='pages' id='pages_error'>This field is required.</label>
      <br/>

       <label for='ilink' id='ilink_label'>Internet Link (where resource is available online):</label>
      <input type='text' name='ilink' id='ilink' size='25' value='<?php echo $citation['internet_link']; ?>' class='text-input' />      

</div>
	<?php endforeach; ?>
<!-- START Tagging -->	
 Tags: Click below to untag/remove tag from associating with this entry. <br/>
<?php 
	$NoOfTags = count($tags) - 1;
	$ExistingTags = '';
	foreach ($tags as $index=>$tag): 
			if ($index != $NoOfTags) { 
		$ExistingTags .= '<span data-tagid="'.$tag['at_id'].'" class="tagListing" />'.$tag['tag'].', ';
			} else {
		$ExistingTags .= '<span data-tagid="'.$tag['at_id'].'" class="tagListing" />'.$tag['tag'].'.';
			}
		endforeach;
	echo $ExistingTags;
		?> <br/>
<!-- END Tagging -->
     <input type="submit" name="submit" id="submit_btn" class='button' value="Update This Citation" />
</body>
</html>