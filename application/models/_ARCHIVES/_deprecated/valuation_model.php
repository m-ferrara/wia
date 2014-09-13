<?php
class Valuation_model extends CI_Model 
{
	var $val_subject = '';
	var $existing_val = '';
	var $new_val = '';
	var $response = '';
	var $rows= array();
	
	function __construct() 
	{
		parent::__construct();
	}
	
	function valuations_jsonlist() 
	{
		$allvals = $this->db->get('valuations');
		echo json_encode($allvals->result_array());
	}
function valuation_namegetter() 
	{	
		$vid = $this->input->get('valuation_id');
		$where = array('valuation_id' => $vid);
		$this->db->where($where);
		$allvals = $this->db->get('valuations');
		echo json_encode($allvals->result_array());
	}
	
/*
	 * linkage metrics used to compute relative size/richness of linkage
	 * to use for presentation/navigation purposes.
	 * must return json encoded data set for further javascript usage.
	 * metrics: Size(# of citations), as a % of total entries, Relative Size (Bigger or Smaller),
	 * probably more such as last modified, frequency, popularity etc etc.
	 */
	function valuation_metrics() {
		/* $valuation = $this->input->get('valuation_id');
		$this->db->where('valuation_id', $valuation);
		$stmt = $this->db->get('citations');
		$lnumrows = $stmt->num_rows(); */
		$citations = $this->db->get('citations');
		$citrows = $citations->num_rows();
		$valquery = $this->db->query("SELECT valuation_id FROM valuations");
		$total_vals = $valquery->num_rows();
		$all_vals = $valquery->result_array();
		foreach ($all_vals as $val) {
		$this->db->where('valuation_id', $val['valuation_id']);
		$stmt = $this->db->get('citations');
		$numrows = $stmt->num_rows();
		$aspercentage = round((($numrows/$citrows)*100), 0);
		$dataset[] = array("valuation_id"=>$val['valuation_id'], "citations"=>"$numrows", "as_percentage"=>"$aspercentage");
		} 
		$percentages = array();
		foreach ($dataset as $data) {
			$percentages[] = $data['as_percentage'];
		}
		array_multisort($percentages, SORT_DESC, $dataset);
		
		for ($i=0; $i<=3; $i++)  
		{
			$dataset[$i]['quadrant'] = $i;
		}
		/* assign quadrants from smallest to largest, repeating for each of every 4 */
		for ($i=$total_vals-1; $i>=4; $i--)
		{ 
		if ($i==($total_vals-1) OR $i==($total_vals-5) OR $i==($total_vals-9) OR $i==($total_vals-13) OR $i==($total_vals-17) OR $i==($total_vals-21)) {
		$dataset[$i]['quadrant'] = 0; }
		if ($i==($total_vals-2) OR $i==($total_vals-6) OR $i==($total_vals-10) OR $i==($total_vals-14) OR $i==($total_vals-18) OR $i==($total_vals-22)) {
		$dataset[$i]['quadrant'] = 1; }
		if ($i==($total_vals-3) OR $i==($total_vals-7) OR $i==($total_vals-11) OR $i==($total_vals-15) OR $i==($total_vals-19) OR $i==($total_vals-23)) {
		$dataset[$i]['quadrant'] = 2; }
		if ($i==($total_vals-4) OR $i==($total_vals-8) OR $i==($total_vals-12) OR $i==($total_vals-16) OR $i==($total_vals-20) OR $i==($total_vals-24)) {
		$dataset[$i]['quadrant'] = 3; }
		}
		$quadrants = array();
		foreach ($dataset as $data) {
			$quadrants[] = $data['quadrant'];
		}
		array_multisort($quadrants, $percentages, SORT_DESC, $dataset);
 $quadZero = array();
 $quadOne = array();
 $quadTwo = array();
 $quadThree = array();
 
 for ($i=0; $i<$total_vals; $i++) {
 	if ($dataset[$i]['quadrant']==0) $quadZero[] = $dataset[$i];
 	if ($dataset[$i]['quadrant']==1) $quadOne[] = $dataset[$i];
 	if ($dataset[$i]['quadrant']==2) $quadTwo[] = $dataset[$i];
 	if ($dataset[$i]['quadrant']==3) $quadThree[] = $dataset[$i];
 }

 
 
 // CSS POSITIONING -- Quadrant angles/formulas for position and with respect to size.   0 1
 // 90degrees per Quadrant. divided by count     										 2 3
 // x distance increment with respect to circle size and margin spacing.
 $angleQzero = (89)/(count($quadZero)+3);  // upper left  side.
 $angleQone = (89)/(count($quadOne)+3); // upper right  side
 $angleQtwo = (89)/(count($quadTwo)+3);  // bottom right
 $angleQthree = (89)/(count($quadThree)+3);  // bottom left
  // calculate ratio for X(left/right) and Y(top/bottom) coordinates
  // array for random lengths.
  
for ($i=0; $i<count($quadZero); $i++) {  // QUAD ZERO Values. (negX, posY)
	$length= 400-(7/8)*$i*(400/((count($quadZero))));
	$radFromdeg = deg2rad(($angleQzero*($i+1)));
	$TANangleMultiplier = tan($radFromdeg);
	$COSangleMultiplier = cos($radFromdeg);
	$containerSize = $quadZero[$i]['as_percentage'];
	$positionAdjust = ($containerSize*6.0);
	$Y_length = ($length)*($TANangleMultiplier);  //ie X-Position/distance.
			$width = ($length*$COSangleMultiplier);
		//$X_length = ($length)*$COSangleMultiplier;
	$quadZero[$i]['y_position'] = 300-(round($Y_length)+(30*$i));
	$quadZero[$i]['x_position'] = 400-round($length)+(65*$i);
	$quadZero[$i]['cnctr_y'] = 150-round($Y_length)+$positionAdjust;
	$quadZero[$i]['cnctr_x'] = 400-round($length)-$positionAdjust;	
	$quadZero[$i]['angle'] = ($angleQzero*($i+1))+190+10*($i+1);
	$quadZero[$i]['cnctrlength'] = $width-20*($i);
} 
for ($i=0; $i<count($quadOne); $i++) {  // QUAD ONE Values. (posX, posY)
	$length= 400-(7/8)*($i)*(400/(count($quadOne)));
	$radFromdeg = deg2rad(($angleQone*($i+1)));
	$TANangleMultiplier = tan($radFromdeg);
	$COSangleMultiplier = cos($radFromdeg);
			$width = ($length*$COSangleMultiplier);
	$containerSize = $quadOne[$i]['as_percentage'];
	$positionAdjust = ($containerSize*6.0);
		$Y_length = ($length)*($TANangleMultiplier);  //ie Y-Position/distance.
	$y_position = 150-round($Y_length)-(10*$i);
	$x_position = round($length)+400+(75*$i);
	$hypot_cnctr = ($x_position)*$COSangleMultiplier;
	//$X_length = ($length)*$COSangleMultiplier;
	$quadOne[$i]['y_position'] = 300-(round($Y_length)+(30*$i));
	$quadOne[$i]['x_position'] = round($length)+400-(15*$i);
	$quadOne[$i]['cnctr_y'] = round($Y_length)-(10*$i)+$positionAdjust-150;
	$quadOne[$i]['cnctr_x'] = round($length)-(20*$i)+$positionAdjust;
	$quadOne[$i]['angle'] = 69+($angleQone*($i+1))-$i*20;
	$quadOne[$i]['cnctrlength'] = $width;	
} 
for ($i=0; $i<count($quadTwo); $i++) {  // QUAD TWO Values. (negX, negY)
	$length= 400-((7/8)*$i)*(400/(count($quadTwo)));
				$radFromdeg = deg2rad(($angleQtwo*($i+1)));
	$TANangleMultiplier = tan($radFromdeg);
	$COSangleMultiplier = cos($radFromdeg);
	$Y_length = ($length)*($TANangleMultiplier);  //ie Y-Position/distance.
			$width = ($length*$COSangleMultiplier);
		//$X_length = ($length)*$COSangleMultiplier;
		$y_position = 150+round($Y_length)+(20*$i);
	$x_position = round($length)+400-(80*$i);
	$hypot_cnctr = ($x_position)*$COSangleMultiplier;

	$containerSize = $quadTwo[$i]['as_percentage'];
	$positionAdjust = ($containerSize*6.0);
	$quadTwo[$i]['y_position'] = 300+round($Y_length)+(30*$i);
	$quadTwo[$i]['x_position'] = 400-round($length)+(65*$i);
	$quadTwo[$i]['cnctr_y'] = 150+round($Y_length)+$positionAdjust;
	$quadTwo[$i]['cnctr_x'] = round($length)+$positionAdjust;	
	$quadTwo[$i]['angle'] = ($angleQtwo*($i+1))-50*($i+1);
	$quadTwo[$i]['cnctrlength'] = $width;
} 
for ($i=0; $i<count($quadThree); $i++) {  // QUAD THREE Values. (posX, negY) 
	$length= 400-(3*$i)*(400/(count($quadThree)*4));
	$radFromdeg = deg2rad(($angleQthree*($i+1)));
	$TANangleMultiplier = tan($radFromdeg);
	$COSangleMultiplier = cos($radFromdeg);
	$Y_length = ($length)*($TANangleMultiplier);  //ie Y-Position/distance.
	$y_position = 150+round($Y_length)+(20*$i);
	$x_position = round($length)+400-(55*$i);
	$hypot_cnctr = ($x_position)*$COSangleMultiplier;
		//$X_length = ($length)*$COSangleMultiplier;
	$containerSize = $quadThree[$i]['as_percentage'];
	$positionAdjust = ($containerSize*6.0);
	$quadThree[$i]['y_position'] = 300+round($Y_length)+(30*$i);
	$quadThree[$i]['x_position'] = round($length)+300-(55*$i);
	$quadThree[$i]['angle'] = ($angleQthree*($i+1));
	$quadThree[$i]['cnctrlength'] = $width;
	$quadThree[$i]['cnctr_y'] = round($Y_length)+$positionAdjust;
	$quadThree[$i]['cnctr_x'] = round($length)+$positionAdjust-400;
} 
$quadValues = array_merge($quadZero, $quadOne, $quadTwo, $quadThree);
  //print_r($quadValues);
 // Assign dataset X and Y coordinates.  

	for ($i=0; $i<$total_vals; $i++) {
		$dataset[$i]['x_position'] = $quadValues[$i]['x_position'];
		$dataset[$i]['y_position'] = $quadValues[$i]['y_position'];
		$dataset[$i]['cnctr_y'] = $quadValues[$i]['cnctr_y'];
		$dataset[$i]['cnctr_x'] = $quadValues[$i]['cnctr_x'];
		$dataset[$i]['angle'] = $quadValues[$i]['angle'];
		$dataset[$i]['cnctrlength'] = $quadValues[$i]['cnctrlength'];
	}
	   
 		 
print_r(json_encode($dataset));
		//echo $array;
	}
	
	function valuation_linkages() 
	{
		$val_subject= $this->input->get('valuation_id');
		$this->db->where('parent_val', $val_subject);
		$stmt = $this->db->get('linkages');
		echo json_encode($stmt->result_array());
		
	}
	/**
	 * add valuation subject intended to input the topics 
	 * that will be contain linkages, which will contain the citations.
	 * @param string $val_subject
	 * 
	 */
	
	function add_valuation_subect() 
	{
		$val_subject= $this->input->post('val_subject');
			$data = array(
			'subject_of_valuation'=>$val_subject
			);
			$insertqry = $this->db->insert('valuations', $data);
			return $insertqry;
		
	}
	/**
	 * rewrites preexisting valuation subject.
	 * @param unknown_type $existing_val
	 * @param unknown_type $new_val
	 */
	function update_valuation() 
	{
		$new_val = $this->input->post('val_subject');
		$existing_val = $this->input->post('valuation_id');
		$this->db->set('subject_of_valuation', $new_val);
		$this->db->where('valuation_id', $existing_val);
		return $this->db->update('valuations');
	}
	function remove_valuation()
	{
		$val_to_delete = $this->input->post('valuation_id');
		$where = array('valuation_id' => $val_to_delete);
		$this->db->where($where);
		$this->db->delete('valuations');
	}
	function valuations_list() 
	{
		$query = $this->db->get('valuations');
		return $query->result_array();
	}

function ajax_top_entry() 
	{	
		$topic = $this->input->post('topic');
		$topic_description = $this->input->post('topic_description');
		$entry = array(
		'subject_of_valuation' => $topic,
		'valuation_description' => $topic_description
		);
		$this->db->insert('valuations', $entry); 
	}
}

/* end of valuation_model.php */