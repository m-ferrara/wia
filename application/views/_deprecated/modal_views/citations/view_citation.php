<?php 
// initialize and assign rating metrics
$rating=""; 
$votes=""; 
foreach ($ratings as $rate): 
	$rating = $rate['totalrating']; 
	$votes = $rate['totalvotes']; 
endforeach; 
if ($rating=='' && $votes=='') { 
	$rating = "Not Rated Yet"; 
	$votes = "0 ";
} 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Citation</title>
<link rel='stylesheet' type='text/css' media='all' href='../assets/css/forms.css' />


<link rel='stylesheet' type='text/css' media='all' href='../assets/css/bootstrap/css/bootstrap.css' />
<script src="<?php echo base_url();?>assets/js/jquery.js"></script>

</head><body><?php foreach ($citations as $citation): ?>
<table class='citation' >
<tr class='needsborder'>
	<td>Tags</td>
	<td class='citation_cell'><?php
	$NoOfTags = count($tags) - 1; 
	
	foreach ($tags as $index=>$tag): 
		if ($index != $NoOfTags) { 
		echo $tag['tag'].', ';
		}
		else {
			echo $tag['tag'].'.';
		}
		endforeach;
		?></td>
</tr>
<tr class='needsborder'>
<td>Citation:</td>
<td class='citation_cell'><?php echo $citation['author'].', ('.$citation['pub_date'].') '.$citation['article_name'].' <span style="font-style:italic;">'.
$citation['publication_title'].'.</span> '.$citation['volume_issue'].': '.$citation['pages']; ?>.</td></tr> 
<?php if ($citation['internet_link']=='' || is_null($citation['internet_link'])) {  //check if link exists, if not display link entry form //
	$attributesa= array('id' => 'internet_available', 'name' => 'internet_available', 'class' =>'form-inline');
echo form_open('default_controller/addcitation_reference', $attributesa); ?>
<tr class='needsborder'><td>Know this article's web-address? Add it here:</td> <?php if ($this->session->userdata("validated")==true) { ?>
<td class='citation_cell'><input type="hidden" value="<? echo $citation['cit_id'];?>" name='cit_id'></input>
<input type="text" name="suppliedlink" value='http://' size='40'></input>
<input class="btn" type='submit' value='Add' style='vertical-align: top;
  margin-left: 6px;' /></td>
  <?php } else { ?> 
  	<td class='citation_cell'>Sign In Required to Add Reference Link</td>
    <?php } ?></tr>
</form>
<?php } 
else {
echo "<tr class='needsborder'><td class='link_instructions'>Double-click to view link in new window:</td><td align='center'><a ondblclick=\"window.open('".prep_url($citation['internet_link'])."', '_blank');\">".prep_url($citation['internet_link'])."</a></td></tr>";
}  ?>
<?php	if ($this->session->userdata("validated")==true) {  ?>
<tr class='needsborder' ><td>Edit / Update Citation</td><td class='citation_cell'><a href='<?php echo base_url()."default_controller/view_cit_updater?cit_id=".$citation['cit_id'].""?>'> Click Here to Modify This Entry</a></td></tr>
<?php } else { ?> <tr><td></td></tr> <?php } ?>
<tr class='needsborder'><td>Article/Entry Rating:</td><td class='citation_cell'><?php echo "Rated ".$rating." from ".$votes." Number of Votes." ?></td></tr>
	<tr class="rating needsborder">
	<td>Your Rating:</td>
	<td class='citation_cell'>
	<div class='rate1 rating_stars'></div>
	<div class='rate2 rating_stars'></div>
	<div class='rate3 rating_stars'></div>
	<div class='rate4 rating_stars'></div>
	<div class='rate5 rating_stars'></div>
	</td>
	</tr>
</table>
<script>
$(document).ready(function() {
$('.rating_stars').hover(
        // Handles the mouseover
        function() {
            $(this).prevAll().andSelf().addClass('ratings_over');        
            },
        // Handles the mouseout
        function() {
            $(this).prevAll().andSelf().removeClass('ratings_over'); 
        }
    );
$('.rating_stars').click(function() {
	var ratingclass = $(this).attr('class');
	var n = ratingclass.charAt(4); // Gives us 1 Thru 5 rating, from class rate1,rate2...rate5 //
	var citation = "<? echo $citation['cit_id'];?>";
	var user_id = "<?php echo $this->session->userdata('userid');?>";
	var dataString = {rating : n, cit_id : citation, u_id :user_id};
	// alert(dataString); return false;
	  $.ajax({
		  type: 'POST',
		  url: "<?php echo base_url().'default_controller/rate_article';?>",
		  data: dataString,
		  dataType: "json",
		  success: function(output_string){ $("tr.rating").html(output_string);
		  } }); return false;
}); 		

});
</script>
<?php endforeach  ?>
	

<?php $amnt_comments = count($comments);
if ($amnt_comments > 0) { ?> <div id='comments'> <?php 
	foreach ($comments as $i => $comment): ?>
<?php $attributes= array(
	'id' => 'comments', 'name'=>'comments');
$styles = array(
	'even-row', 'odd-row');
echo form_open('default_controller/remove_comment', $attributes); ?>
<div class="<?php echo $styles[$i % 2]; if ($i == 0) { echo " radius5-top"; } ?>"><div class='cmt_auth' ><?php echo ucfirst($comment['author']);?> commented:</div>
<div class="comment-container"> <?php echo $comment['comment'];?></div></div>
<div class="<?php echo $styles[$i % 2]; ?>"><div class='cmt_date'><?php echo $comment['date'];?> </div></div>
<div  class="<?php echo $styles[$i % 2]; if ($i == $amnt_comments-1) { echo " radius5-bottom"; } ?>">
<input type='hidden' name='cit_id' value='<?php echo $comment['cit_id']; ?>' />
<input type='hidden' name='comment_id' value="<?php echo $comment['comment_id']; ?>" />
<div><input class="btn" type='submit' value='Flag Comment'></input></div></div>
<div class="<?php echo $styles[$i % 2]; if ($i == $amnt_comments-1) { echo " radius5-bottom"; } ?> bottom'">
<?php if ($i != $amnt_comments-1) {  ?><div style="border-bottom: 3px dashed #C4C4C4; width: 100%;"></div> <?php } ?>
</div>
</form>
<?php endforeach; 
} ?>
</div>
<?php echo validation_errors();
$attributesb = array(
	'id' => 'comments_form', 'name'=> 'comments_form'); 
echo form_open('default_controller/add_comment', $attributesb); ?>
<p class='addcmntitle'><?php if ($this->session->userdata("validated")==true) {
	$author = $this->session->userdata('name'); 
	echo ucfirst($author).", Join the conversation:"; } 
else { echo "<div id='login2cmt'>".anchor('default_controller/js_login', 'Login Required', 'title="Login To Comment"')."</div>"; } ?></p>
<script>
function select_all()
{
var text_val=eval("document.comments_form.comment");
text_val.focus();
text_val.select();
}
</script>
<textarea id="comment-text-area" name='comment' cols='20' rows='3' onClick="select_all();">Comment here...</textarea>
<input type='hidden' name='cit_id' value='<?php echo $citation['cit_id'];?>' />
<br/><input class="btn cmt-btn" type='submit' value='submit comment' />
</form>
</body>
</html>