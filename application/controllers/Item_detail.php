<?php

Class Item_detail extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');

		// $this->load->model('login_database');
		// $this->load->model('users');


	}

	public function thankyou() {
		print_r("Thank for vote");

		return header("Refresh: 2; url=/matchan");		
   			
   				
   			
		
		
	}

	public function detail($id){

		$this->load->database();

		// if ($id == 9 ) {
		$this->session->set_userdata('forcompute', $id);


		// 	redirect('/item_detail/thankyou');
		// }


		// $SQLquery = "select cafe.cid,cafe.cname,rating_cafe.ratescore from cafe
		// left join rating_cafe on rating_cafe.cid = cafe.cid
		// left join users on users.uid = rating_cafe.uid

		// where cafe.cid = $id

		// ";

		// $testquery = $this->db->query($SQLquery);
				$session_data = $this->session->userdata('logged_in');
				

				$userid = $session_data['uid'];
		$condition = "cafe.cid =" . "'" . $id . "'";
		$this->db->select('cafe.cid');
		$this->db->select('cafe.cname');
		$this->db->select('cafe.cimg');
		$this->db->select('cprice');
		$this->db->select(' ccredit ');
		$this->db->select(' cparking ');
		$this->db->select(' cgroup');
		$this->db->select(' ccake ');
		$this->db->select(' carea ');
		$this->db->select(' cicecream');
		$this->db->select(' chotdrink');
		$this->db->select(' ccolddrink');
		$this->db->select(' cfruit');
		$this->db->select(' cother');						

		$this->db->select(' chour ');
		$this->db->select(' ctel ');
		$this->db->select(' clat ');
		$this->db->select(' clong ');
		$this->db->select(' caddress ');

		$this->db->select('rating_cafe.ratescore');
		$this->db->select('rating_cafe.uid');		
		$this->db->from('cafe');
		$this->db->join('rating_cafe','rating_cafe.cid=cafe.cid','left');
		$this->db->join('users','users.uid=rating_cafe.uid','left');
		$this->db->where('cafe.cid ='.$id);
		$query = $this->db->get();	

		//Get user's rating
		// echo "<pre>";
		// print_r($query->result());
		$ar_rating = array();
		$checkuseridratted = array();
		foreach ($query->result() as $row)
		{	
			$checkuseridratted[$row->uid] =   $row->ratescore;
		
			
		}	
		
		$usercount = 0;
		$sumforheaderating =0;
		foreach (	$checkuseridratted as $key => $value)
		{	
			if($value != NULL) {
				$sumforheaderating = $sumforheaderating + $value;
			$usercount = $usercount +1 ;
			}
			
		
			
		}	
		print_r($sumforheaderating);
		print_r($usercount);

		$theuserkeys = array_keys($checkuseridratted);
		// print_r($userid);

		for($i=0; $i < sizeof($checkuseridratted) ; $i ++ ) {
			// print_r($theuserkeys[$i]);
			if($userid == $theuserkeys[$i]  ) {


				// echo " GOT Cha ";
				if ( $checkuseridratted[$theuserkeys[$i]] != 0 ) {
					// echo " Rated";
					$ar_rating = $checkuseridratted[$theuserkeys[$i]];
				} else {
					$ar_rating = NULL;
				}
				

			} else {
				
			}
		}
		// print_r($ar_rating);

		$usercount = 0;
		$sumforheaderating =0;
		foreach (	$checkuseridratted as $key => $value)
		{	
			if($value != NULL) {
				$sumforheaderating = $sumforheaderating + $value;
			$usercount = $usercount +1 ;
			}
			
		
			
		}	
		// print_r($totalrate);
		// print_r($user);
	
  		$itemdata = $query->result();
  		// echo "<pre>";
  		// print_r($itemdata);

  		// $user= $user - 1;
  			// print_r($user);

		## Start Realted
				$SQLqueryContentbase = "(SELECT * FROM `cafe` 
			left join rating_cafe on rating_cafe.cid = cafe.cid
			left join users on users.uid = rating_cafe.uid
			where rating_cafe.uid = 114)";
		$SQLqueryCollaborative = "(SELECT rating_cafe.uid,rating_cafe.cid,rating_cafe.ratescore 
			FROM `rating_cafe` ORDER BY rating_cafe.uid ASC, rating_cafe.cid ASC)";

		$queryCollaborative = $this->db->query($SQLqueryCollaborative);
		$queryContentbase = $this->db->query($SQLqueryContentbase);

		$resultContentbase = $queryContentbase->result_array();
		$resultCollaborative = $queryCollaborative->result_array();

		// echo '<pre>';
		// print_r($queryContentbase->result());
		// print_r($queryCollaborative->result());

		/*
		============== Contentbase Variable ======================
		sim
		sim2
		ar_rating
		sum_ratings_difference
		*/
		$sim = array();
		$sim2 = array();
		$ar_rating2 = array();
		$sum_ratings_difference = 0;

		// Content Base Part //
		// Prepare DAta
		foreach ($queryContentbase->result() as $row)
		{	

			$sim[] = $row->cname;
			$sim[] = $row->cparking;
			$sim[] = $row->ccredit;
			$sim[] = $row->cgroup;
		    $sim[] = $row->ccake;
			$sim[] = $row->cicecream;
			$sim[] = $row->chotdrink;
			$sim[] = $row->cfruit;
			$sim[] = $row->cother;
			$sim[] = $row->ratescore;
			$ar_rating2[] = $row->ratescore;
		}	
		$cutrating = array_chunk($ar_rating2, 30);
		// print_r($sim);
		while (  sizeof($ar_rating2) < 30 ) {
            $ar_rating2[sizeof($ar_rating2)] = 0;
        }
		// print_r($cutrating);
		$countrate =0;
		$checkrate = array();
		for($i = 0 ; $i < 30 ; $i ++) {
			if($ar_rating2[$i] != NULL ) {
				// echo "hello";
				$countrate++;
				$checkrate[] = $i;
			}
		}
		// print($countrate);
		// print_r($checkrate);
		// print_r(sizeof($checkrate));

		$i = $id; 
			if ($queryContentbase->num_rows() > 0) {
			$check = $queryContentbase->row($i);
			$checkint = intval($check->cparking);
			$checkint2 = intval($check->ccredit);
			$checkint3 = intval($check->cgroup);
			$checkint4 = intval($check->ccake);
			$checkint5 = intval($check->cicecream);
			$checkint6 = intval($check->chotdrink);
			$checkint7 = intval($check->ccolddrink);
			$checkint8 = intval($check->cfruit);
			$checkint9 = intval($check->cother);
			// $ratedvalue = intval($check->ratescore);
			}
		
			
			for($j = 0; $j < 30; $j++){

				if ($queryContentbase->num_rows() > 0) {
					$checkJ = $queryContentbase->row($j);
					//echo "Value 2 Row J :";
					$checkintJ = intval($checkJ->cparking);
					$checkintJ2 = intval($checkJ->ccredit);
					$checkintJ3 = intval($checkJ->cgroup);
					$checkintJ4 = intval($checkJ->ccake);
					$checkintJ5 = intval($checkJ->cicecream);
					$checkintJ6 = intval($checkJ->chotdrink);
					$checkintJ7 = intval($checkJ->ccolddrink);
					$checkintJ8 = intval($checkJ->cfruit);
					$checkintJ9 = intval($checkJ->cother);
			
					$multiplyof2rows = ( $checkint * $checkintJ + $checkint2 * $checkintJ2 + $checkint3 * $checkintJ3+ $checkint4 * $checkintJ4 + $checkint5 * $checkintJ5
										+ $checkint6 * $checkintJ6 + $checkint7 * $checkintJ7 + $checkint8 * $checkintJ8 + $checkint9 * $checkintJ9);
					
					
					//echo "Multipleof2rows : $multiplyof2rows ";
					//echo $multiplyof2rows;


					
					$similarity = ($multiplyof2rows / (sqrt($checkint + $checkint2 + $checkint3 + $checkint4 + $checkint5 + $checkint6 + $checkint7 + $checkint8 + $checkint9)*
													   (sqrt($checkintJ + $checkintJ2 + $checkintJ3 + $checkintJ4 + $checkintJ5 + $checkintJ6 + $checkintJ7 + $checkintJ8 + $checkintJ9))));
					


					
					// echo $similarity;
					$sim = $similarity;
					$sim2[] = $similarity;			
					
				}


					// echo "Sim:";
					// echo '[';
					// echo $i+1; // ใน db เริ่มจาก 0 ร้านจริงคือ +1 
					// echo ']';
					// echo '[';
					// echo $j+1;
					// echo ']';
					
					// print_r($sim);
					// print_r(", ");
					// // echo "$ratedvalue";
					// print_r($ar_rating2[$j]);
					// echo "\n";

			}

		



		$chunk2 = array_chunk($sim2, 30);
		$checkrelated = array();

		$chunk3 = array();
		arsort($chunk2[0]);
		$keyforc2 = array_keys($chunk2[0]);
		// print_r($keyforc2);
			for($q = 0 ; $q < 30; $q ++ ) {
				if ($keyforc2[$q] == $i ) {
					// print_r($keyforc2[$q]);
					$q+1;
				} else {
					// print_r($keyforc2[$q]);
					$checkrelated[$keyforc2[$q]] =  $chunk2[0][$keyforc2[$q]];
				}
				
			}	

		// print_r($chunk2);
			// print_r(array_keys($chunk2[0]));
			// echo '<pre>';
				// print_r($checkrelated);

		// echo "\nTop 3 with Cafe: \n";
		$x = 0;
		$q = 0;
		$knearest2 = 3;
		$count = 0;
		foreach ($checkrelated as $key => $value) {
			if ( $count < 3 ) {
				// echo "Key: $key; Value: $value<br />\n";
				// $topratingcafevalue[] = $value;
				$count++;
			} else {
				break;
			}
		    
		}

#######



		while($x < $knearest2) {
			$keys = array_keys($checkrelated);
			// echo "Cafe Id : $keys[$x] \n" ;
			$relatedcafe[] = $keys[$x]+1;
			$x++;
		}			


		foreach ($relatedcafe as $key => $value) {

					$condition = $value;

					$SQLquery = "
					SELECT * FROM `cafe` as cafe 
					
					WHERE cafe.cid=$condition ";
					$query3 = $this->db->query($SQLquery);

					$collecttop[] = $query3->result();

		}

		// print_r($collecttop);


		##done  			
		// print_r($ar_rating);
  		if(isset($_SESSION['logged_in'])) {

  			// $session_data = $this->session->userdata('logged_in');
  							  				

			if ($usercount != 0 ) {
				$session_data = $this->session->userdata('logged_in');
				$data['userrated'] = $ar_rating;

				$data['session_uid'] = $session_data['uid'];
				$data['session_username'] = $session_data['username']; 
				$data["detaildata"] = $itemdata;
				$data['recommendedcafe'] = $collecttop;		
					// $data['recommendedrating'] = $topratingcafevalue;  				
				$data["totalscore"] = round($sumforheaderating/$usercount,2);
					$this->load->view("header_in", $data);	
				$this->load->view("detail_page", $data);
				$this->load->view("footer_in", $data);
			} else {
				$session_data = $this->session->userdata('logged_in');
				$data['userrated'] = $ar_rating;
				$data['session_uid'] = $session_data['uid'];
				$data['session_username'] = $session_data['username']; 
				$data["detaildata"] = $itemdata;			
				$data['recommendedcafe'] = $collecttop;			
					// $data['recommendedrating'] = $topratingcafevalue;  		
				$data["totalscore"] = round($sumforheaderating/1,2);
					$this->load->view("header_in", $data);	
				$this->load->view("detail_page", $data);
				$this->load->view("footer_in", $data);
			}

		} else {
			if ($usercount != 0 ) {
				$data["detaildata"] = $itemdata;				
				$data["totalscore"] = round($sumforheaderating/$usercount,2);
				$data['recommendedcafe'] = $collecttop;		
					// $data['recommendedrating'] = $topratingcafevalue; 
					$this->load->view("header_in", $data); 		
				$this->load->view("detail_page", $data);
				$this->load->view("footer_in", $data);
			} else {
				$data["detaildata"] = $itemdata;				
				$data["totalscore"] = round($sumforheaderating/1,2);
				$data['recommendedcafe'] = $collecttop;		
					// $data['recommendedrating'] = $topratingcafevalue;  
					$this->load->view("header_in", $data);	
				$this->load->view("detail_page", $data);
				$this->load->view("footer_in", $data);
			}
		}



		

		// Echo '<pre>';
		// print_r($itemdata);
		// print_r($testquery->result());
		// Echo "Total Score : ";
		// print_r($totalrate);
		// Echo "\nTotal User : ";
		// print_r($user);
		// Echo "\nAverage : ";
		// print_r($totalrate/1);
	}	

	// Check for seacrch process
	public function rating_process($id) {

		$this->load->database();

		// $sqlquery = "select * from categories where cateid =?";

		//Test Foreignkey
		// $SQLquery = "
		// SELECT dessert.did,dessert.dname,categories.catename FROM `dessert_categories`
		// inner join dessert on dessert.did = dessert_categories.dcdid
		// inner join categories on categories.cateid = dessert_categories.dccid
		// order by dessert.did";
		// $poop = $this->db->query($SQLquery);
		//--Done

		$condition = "rating_cafe.cid =" . "'" . $id . "'";
		$this->db->select('cafe.cname');
		$this->db->select('rating_cafe.ratescore');
		$this->db->select('users.uname');
		$this->db->from('rating_cafe');
		$this->db->join('users','users.uid=rating_cafe.uid','inner');
		$this->db->join('cafe','cafe.cid=rating_cafe.cid','inner');
		$this->db->where($condition);
		$query = $this->db->get();		

		$totalrate = 0;
		$user = 0;

		if ($query->num_rows() > 1) {
			for ($i = 0; $i < $query->num_rows() ; $i++) {
				$result = $query->result();
				$totalrate = $result[$i]->ratescore + $totalrate; 
				$user = $user + 1 ;
			}
		}
  		$itemdata = $query->result();

		

		Echo '<pre>';
		print_r($itemdata);
		Echo "Total Score : ";
		print_r($totalrate);
		Echo "\nTotal User : ";
		print_r($user);
		Echo "\nAverage : ";
		print_r($totalrate/$user);
	}



	public function rated() {
		$rating_value = $this->input->post("rate_val", true);
		$cafeid = $this->input->post("cafeid", true);

		$session_data = $this->session->userdata('logged_in');
		$userid =$session_data['uid'];
		$username = $session_data['username'];  

   		if ($rating_value == true && $cafeid == true && $userid == true) {	
   			$this->load->database();
   			$data = array(
				'ratescore'=>$rating_value
				// 'cid'=>$cafeid,
				// 'uid'=>$userid
				);
   			$this->db->where('cid',$cafeid);
   			$this->db->where('uid',$userid);
   			$this->db->update('rating_cafe', $data);
   			if ($this->db->affected_rows() > 0) {
                    // echo "Your Rating has been rate with : " ;
                    // echo $rating_value;
                    // echo "<br>";
                    // echo "<br>";
                    // echo "ID : ";
                    // echo $userid;
                    // echo "<br>";
                    // echo "On Cafe : ";
                    // echo $cafeid;  
                    // echo "<br>";
                    // echo "Add To Database";
                    echo "<strong>Success!</strong> Thank you for vote. ";


			} else {
				echo "You already rated ? ";
			}
                  
             }else {
                	echo "No data ";
                } 
	}

	public function rerate() {
		$rating_value = NULL;
		$cafeid = $this->input->post("cafeid", true);

		$session_data = $this->session->userdata('logged_in');
		$userid =$session_data['uid'];
		$username = $session_data['username'];  

   		if ($cafeid == true && $userid == true) {	
   			$this->load->database();
   			$data = array(
				'ratescore'=>$rating_value
				// 'cid'=>$cafeid,
				// 'uid'=>$userid
				);
   			$this->db->where('cid',$cafeid);
   			$this->db->where('uid',$userid);
   			$this->db->update('rating_cafe', $data);
   			if ($this->db->affected_rows() > 0) {
                    // echo "Your Rating has been rate with : " ;
                    // echo $rating_value;
                    // echo "<br>";
                    // echo "<br>";
                    // echo "ID : ";
                    // echo $userid;
                    // echo "<br>";
                    // echo "On Cafe : ";
                    // echo $cafeid;  
                    // echo "<br>";
                    // echo "Add To Database";
                    echo "<strong>Success!</strong> Thank you for vote. ";


			} else {
				echo "You already rated ? ";
			}
                  
             }else {
                	echo "No data ";
                } 
	}
}

?>