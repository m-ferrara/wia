<?php
class Citations_model extends CI_Model {
	
	protected $author;
	protected $pub_date;
	protected $assigned_linkage;
	
	function __construct() 
	{
		parent::__construct();
	}
	
	function citations_list()
	{
		$query = $this->db->get('citations');
		return $query->result_array();	
	}
/*
 * atidCitations used to return Aggregate citations object for javascript functions to filter as user selects additional
 * at_ids to filter by.  Returns cit_id, fam_id and at_id - of each cit_id implicated by first chosen at_id (hence, Aggregate)
 */	
	function atidCitations($at_id) {
		$Sarray = array("at_id"=>$at_id);
		$this->db->where($Sarray);
		$query = $this->db->get('cit_tags');
		$results = $query->result_array();
		$aggArray = array();
		foreach ($results as $result) {
			$citId = $result["cit_id"];
			$cArr= array("cit_id"=>$citId);
			$this->db->where($cArr);
			$cits = $this->db->get('cit_tags');
			array_push($aggArray, $cits->result_array());
		}
		echo json_encode($aggArray);
	}

	// add_cit_weblink() intended to allow users to url-link to the online resource, so viewing citation can  lead to viewing the resource itself
	function add_cit_weblink() {
		$citation = $this->input->post('cit_id');
		$link = $this->input->post('suppliedlink');
		$linkqry = array('internet_link' => $link);
		$query = array(
		'cit_id' => $citation);
		$this->db->where($query);
		$this->db->update('citations', $linkqry);
	}
	
	/*
	 * gets specific citation to display in view.
	 */
	
	function get_citation() 
	{
		$cid = $this->input->get('cit_id');
		$where = array('cit_id' => $cid);
		$this->db->where($where);
		$allvals = $this->db->get('citations');
		return ( $allvals->result_array());
	}
	
	/*
	 * relatedTags()
	 * returns list of associated tags
	 */
	function relatedTagsJSON() 
	{
		$cid = $this->input->get('cit_id');
		$where = array('cit_id' => $cid);
		$this->db->where($where);
		$allvals = $this->db->get('cit_tags');
		$tags = $allvals->result_array();
		$citTags = array();
		foreach ($tags as $tag) :
			$at_id = $tag['at_id'];
			$queryArray = array(
			'at_id'=>$at_id
			);
			$query = $this->db->get_where('all_tags', $queryArray);
			$removeWrapper = $query->result_array();
			array_push($citTags, $removeWrapper[0]);
		endforeach;
		echo json_encode($citTags);
	}
	
function relatedTags() 
	{
		$cid = $this->input->get('cit_id'); 
		if ($cid == "" or is_null($cid)) {
			$cid = $this->input->post('cit_id'); 
		}
		
		$where = array('cit_id' => $cid);
		$this->db->where($where);
		$allvals = $this->db->get('cit_tags');
		$tags = $allvals->result_array();
		$citTags = array();
		foreach ($tags as $tag) :
			$at_id = $tag['at_id'];
			$queryArray = array(
			'at_id'=>$at_id
			);
			$query = $this->db->get_where('all_tags', $queryArray);
			$removeWrapper = $query->result_array();
			array_push($citTags, $removeWrapper[0]);
		endforeach;
		return $citTags;
	}
	
	function get_cit_rating() {
		$cid = $this->input->get('cit_id');
		$where = array('cit_id' => $cid);
		$this->db->where($where);
		$allvals = $this->db->get('ratings_table');
		return ($allvals->result_array());
	}
	
	
	// search by author, article, or publication name
	function citations_from_search() 
	{
	
	$author = $this->input->get('author');
	$articlename = $this->input->get('articlename');
	$pub_title = $this->input->get('pubtitle');
	
	$insert = array(
	'author' => $author,
	'article_name' => $articlename,
	'publication_title' => $pub_title
	);
	$this->db->like($insert); 
	$result = $this->db->get('citations');
	
	echo json_encode($result->result_array());
		
	}
	
	/* 
	 * entry for citations using javascript.
	 */
	function ajax_cit_entry() 
	{	
		$author = $this->input->post('author');
		$pages = $this->input->post('pages');
		$pubdate = $this->input->post('pubdate');
		$articlename = $this->input->post('articlename');
		$volume = $this->input->post('volume');
		$pub_title = $this->input->post('pubtitle');
		$ilink = $this->input->post('ilink');
		$tags = $this->input->post('tags');
		$fams = $this->input->post('fams');
			
		$insert = array(
			'author' => $author,
			'pub_date' => $pubdate,
			'article_name' => $articlename,
			'publication_title' => $pub_title,
			'volume_issue' => $volume,
			'pages' => $pages,
			'internet_link' => $ilink
		);
		$inserted = $this->db->insert('citations', $insert);
		
		$query = $this->db->query('SELECT LAST_INSERT_ID()');
 	    $row = $query->row_array();
        $cit_id = $row['LAST_INSERT_ID()'];
		
		$tagsAsArray = explode(',', $tags);
		$famsAsArray = explode(',', $fams);
		foreach ($tagsAsArray as $key => $tagEntry) :
			$famEntry = $famAsArray[$key];
	 		$tagQuery = array("cit_id"=>$cit_id, 
	 						'fam_id'=> $famEntry,
	 						"at_id"=>$tagEntry);
			$this->db->insert("cit_tags", $tagQuery);
	 	endforeach;	
	}
	
	function responseText() {
		$author = $this->input->post('author');
		$pages = $this->input->post('pages');
		$pubdate = $this->input->post('pubdate');
		$articlename = $this->input->post('articlename');
		$volume = $this->input->post('volume');
		$pub_title = $this->input->post('pubtitle');
		$ilink = $this->input->post('ilink');
		
		$output_string = <<<_EOS
	<table class='citation'>
<tr><td>Citation:</td><td>$author ($pubdate) $articlename <span style="font-style:italic;">
$pub_title</span> $volume: $pages</td></tr> 
<tr><td>Added to database</td><td></td></tr>
<tr><td>Available online at:</td><td><a href='$ilink' onClick="window.open('$ilink', '_blank')" class='ilink'>$ilink</a></td></tr>
_EOS;
	echo json_encode($output_string);
	}
	
	function ajax_cit_update() 
	{	
	$author = $this->input->post('author');
	$pages = $this->input->post('pages');
	$pubdate = $this->input->post('pubdate');
	$articlename = $this->input->post('articlename');
	$volume = $this->input->post('volume');
	$pub_title = $this->input->post('pubtitle');
	$ilink = $this->input->post('ilink');
	$cit_id = $this->input->get('cit_id');
	
	$where = array(
	'cit_id' => $cit_id);
	
	$insert = array(
	'author' => $author,
	'pub_date' => $pubdate,
	'article_name' => $articlename,
	'publication_title' => $pub_title,
	'volume_issue' => $volume,
	'pages' => $pages,
	'internet_link' => $ilink
	);

	$output_string = <<<_EOS
	<table class='citation'>
<tr><td>Citation:</td><td>$author ($pubdate) $articlename <span style="font-style:italic;">
$pub_title</span> $volume: $pages</td></tr> 
<tr><td colspan='2'>Updated in database</td></tr>
<tr><td>Available online at:</td><td><a href='$ilink' onClick="window.open('$ilink', '_blank')" class='ilink'>$ilink</a></td></tr>
_EOS;

	$runQuery = $this->db->where($where);
	$runQuery->update('citations', $insert);
	
	echo json_encode($output_string);
		
	}
	
function remove_citation() 
	{
		$citation_to_delete = $this->input->post('cit_id');
		$where = array('cit_id' => $citation_to_delete);
		$this->db->where($where);
		$this->db->delete('citations');
	}
	
	//rateArticle() for inserting/updating user rating of a citation
function rateArticle() 
	{
		$cit = $this->input->post('cit_id');
		$u_id = $this->input->post('u_id');
		$rating = $this->input->post('rating');
		$exists = array(
		'cit_id' => $cit,
		'u_id' =>$u_id);
		$this->db->where($exists);
		$checkexists = $this->db->get('user_ratings');
		$insrt = array(
		'cit_id' => $cit,
		'u_id' => $u_id,
		'rating' => $rating);
				if ($checkexists->num_rows==1) {
					$this->db->where($exists);
		$this->db->update('user_ratings', $insrt);
				$output_string = "<td>Updated Rating:</td><td class='citation_cell'>";
					for ($i=1; $i<=$rating; $i++) {
			$output_string .= "<div class='rate$i rating_stars ratings_vote'></div> ";
			}
		if ($rating<5) { for ($i=$rating+1; $i<=5; $i++) {
			$output_string .= "<div class='rate$i rating_stars'></div> ";
		}
		$output_string .= "</td>";
		}
				}
									else {
		$this->db->insert('user_ratings', $insrt);
				$output_string = "<td>Your Rating:</td><td  style=\"padding-left: 75px;\" align=\"center\" valign=\"middle\">";
									
		for ($i=1; $i<=$rating; $i++) {
			$output_string .= "<div class='rate$i rating_stars ratings_vote'></div> ";
			}
		if ($rating<5) { for ($i=$rating+1; $i<=5; $i++) {
			$output_string .= "<div class='rate$i rating_stars'></div> ";
		}
		$output_string .= "</td>";
		}
				}
				echo json_encode($output_string);				
	}
	
	
	// articleRating() updates aggregate total votes and computes average rating, stores in ratings table.
function articleRating() 
	{
		$cit = $this->input->post('cit_id');
		$citarray = array(
		'cit_id' => $cit);
		$resultcheck = $this->db->get_where('ratings_table', $citarray);
		$resultgetwhere = $this->db->get_where('user_ratings', $citarray);
		$isRated = $resultcheck->num_rows();
		$numratings = $resultgetwhere->num_rows();
		$query = $this->db->select_sum('rating');
		$query = $this->db->get_where('user_ratings', $citarray);
		$getsum = $query->result();
		$sum = $getsum[0]->rating; // now has sum of all ratings.
		if ($isRated!=0) {
		$Rating = $sum/$numratings;
		$insrtarray = array(
		'totalrating'=> $Rating,
		'totalvotes'=> $numratings);
		$this->db->where($citarray);
		$this->db->update('ratings_table', $insrtarray);
		}
		if ($isRated=='' || $isRated =0) {
			$Rating = $sum;
		$insrtarray = array(
		'cit_id' => $cit,
		'totalrating'=> $Rating,
		'totalvotes'=> $numratings);
		$this->db->insert('ratings_table', $insrtarray);
		}
		
	}
	
}


/* end of citations_model.php */
/* location: appname/application/models/ */