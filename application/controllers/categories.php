<?php

Class Categories extends CI_Controller {

	public function __construct() {
		parent::__construct();

	// Load session library
		 $this->load->library('session');


	}

	 public  function calculateStarRating($likes, $dislikes){ 
        $maxNumberOfStars = 5; // Define the maximum number of stars possible.
        $totalRating = $likes + $dislikes; // Calculate the total number of ratings.
        $likePercentageStars = ($likes / $totalRating) * $maxNumberOfStars;
        return $likePercentageStars;
    }

	// Check for seacrch process
	public function index() {
	
		if(isset($_SESSION['logged_in'])) {
			$session_data = $this->session->userdata('logged_in');
			$data['user_id'] = $session_data['uid'];
			$userid = $session_data['uid'];

			$SQLqueryContentbase = "(SELECT * FROM `cafe` 
			left join rating_cafe on rating_cafe.cid = cafe.cid
			left join users on users.uid = rating_cafe.uid
			where rating_cafe.uid = $userid )";
			$SQLqueryCollaborative = "(SELECT rating_cafe.uid,rating_cafe.cid,rating_cafe.ratescore 
			FROM `rating_cafe` ORDER BY rating_cafe.uid ASC, rating_cafe.cid ASC)";

		$queryCollaborative = $this->db->query($SQLqueryCollaborative);
		$queryContentbase = $this->db->query($SQLqueryContentbase);

		$resultContentbase = $queryContentbase->result_array();
		$resultCollaborative = $queryCollaborative->result_array();


		$this->db->select('cafe.cid');
		$this->db->select('cafe.cname');
		$this->db->select('cafe.cimg');
		$this->db->select('cafe.cimg');
		$this->db->select('cprice');
		$this->db->select(' ccredit ');
		$this->db->select(' cparking ');
		$this->db->select(' cgroup');
		$this->db->select(' ccake ');
		$this->db->select(' carea ');
		$this->db->select(' chour ');
		$this->db->select(' ctel ');
		$this->db->select(' clat ');
		$this->db->select(' clong ');
		$this->db->select(' caddress ');

		$this->db->select('rating_cafe.ratescore');		
		$this->db->from('cafe');
		$this->db->join('rating_cafe','rating_cafe.cid=cafe.cid','left');
		$this->db->join('users','users.uid=rating_cafe.uid','left');
		$query2 = $this->db->get();	

		$SQLquery = "
		(SELECT * FROM `users`) ";
		$querycafeid = $this->db->query($SQLquery);
		$usersize = $querycafeid->num_rows();

		$totalrate = 0;
		$user = 0;

		if ($query2->num_rows() > 1) {
			for ($i = 0; $i < $query2->num_rows() ; $i++) {
				$result = $query2->result();
				$totalrate = $result[$i]->ratescore + $totalrate; 
				$user = $user + 1 ;
			}
		}
	
		$totalrateArray = array();
		$userArray = array();

		if ($query2->num_rows() > 1) {



			for ($i = 0; $i < $query2->num_rows() ; $i++) {
				$result = $query2->result();
				$totalrateArray[] = $result[$i]->ratescore; 
				$userArray[] = 1;
			}
		}
		// print_r($totalrateArray);
		try{
			$cutTotalrate = array_chunk($totalrateArray, $usersize);
		$cutUser = array_chunk($userArray, $usersize);	
		} catch(Exception $e) {

		}
		// print_r($cutTotalrate );
		// echo '<br>';
		// print_r($usersize);

		$sum = 0;
		$sumof = array();
		for ( $j = 0; $j < 30 ; $j ++) {
		   for ( $i = 0 ; $i < 18 ; $i++) {
		   	$sum += $cutTotalrate[$j][$i];
		   }
		   $sumof[$j] = $sum;
		   $sum = 0;
		}
		
		for($i = 0 ; $i < 30 ; $i ++ ) {
			$sumof[$i] = $sumof[$i] / 18;
		}
		// print_r($sumof);
		arsort($sumof);
		// echo '<br>';
		

	
				$count = 0;
		$topratingcafe = array();
		foreach ($sumof as $key => $value) {
			if ( $count < 3 ) {
				$topratingcafe[] = $key+1; // +1 เพราะใน database เก็บค่าเริ่มจาก 1
				$topratingcafevalue[] = $value;
				// echo "Key: $key; Value: $value<br />\n";
				$count++;
			} else {
				break;
			}
		    
		}
		// print_r($topratingcafe);
		// print_r($topratingcafevalue);

		foreach ($topratingcafe as $key => $value) {

					$condition = $value;

					$SQLquery = "
					SELECT * FROM `cafe` as cafe 
					
					WHERE cafe.cid=$condition ";
					$query3 = $this->db->query($SQLquery);

					$collecttop[] = $query3->result();

		}
		// echo '<pre>';
		// print_r($collecttop);
		
		// echo '<br>';
		
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
		$ar_rating = array();
		$sum_ratings_difference = 0;

		/*
		============== Collaborative Variable ======================
		user
		cafe
		ar_rating2
		sum_ratings_difference2
		*/
		$user = array();
		$cafe = array();
		$ar_rating2 = array();
		$sum_ratings_difference_colla = 0;

		$sum_ratings_difference_hybrid = 0;

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
			$ar_rating[] = $row->ratescore;
		}	
		$cutrating = array_chunk($ar_rating, 30);
		// print_r($sim);
		while (  sizeof($ar_rating) < 30 ) {
            $ar_rating[sizeof($ar_rating)] = 0;
        }
		// print_r($ar_rating);
		$countnull =0;
		$countrate =0;
		$checkrate = array();
		for($i = 0 ; $i < 30 ; $i ++) {
			if($ar_rating[$i] === NULL ) {
				// echo "hello";
				$countnull++;
			} else {
				$countrate++;
				$checkrate[] = $i;
			}
		}

			
		// print($countnull);
		if ( $countnull  > 22  ) { #if not rate > 8 show top



			$data['session_username'] = $session_data['username']; 
			// $data['recommendedcafe'] = $collecttop;
			$data['recommendedrating'] = $topratingcafevalue;

			$data['recommendedloggedin'] = $collecttop;



		} else {

					for ($i = 0; $i < 30; $i++){
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
					// echo $i+1;
					// echo ']';
					// echo '[';
					// echo $j+1;
					// echo ']';
					
					// print_r($sim);
					// print_r(", ");
					// // echo "$ratedvalue";
					// print_r($ar_rating[$j]);
					// echo "\n";
				


			}

		}



		$chunk2 = array_chunk($sim2, 30);
		$chunk3 = array();
		
		try { 
			for($i = 0 ; $i < 30; $i ++ ) {
				arsort($chunk2[$i]);
				

			}	
		} catch ( Exception $e ) {
			echo 'Caught exception: ',  $e->getMessage(), "\n";
		} 
		// print_r($chunk2);
		$chunk3 = array();

		// print_r(array_flatten($chunk2));
		

		//Collaborative Part //

		// User ID check
		$test = array();
		$testcafe = array();
		# code...
		for ( $i = 0; $i < count($resultCollaborative) ; $i ++) {
				$test[] = $resultCollaborative[$i]['uid'];
				$testcafe[] = $resultCollaborative[$i]['cid'];
		}
		$test2 = array_unique($test);
		$arr = array_values($test2);

		// print_r($test2); //จำนวนคนถูก

		//Prepare Data
		foreach ($queryCollaborative->result() as $row2)
		{	

			$user[] = $row2->uid;
			$cafe[] = $row2->cid;
			$ar_rating2[] = $row2->ratescore;
		}

		$chunk = array_chunk($user, 30);
		$userunique = array_unique($user);
		$cafelist = array_chunk($cafe,30);
		$ratinglist = array_chunk($ar_rating2, 30);		

		// print_r($ratinglist);

		//Calculate Similarity 
  //        $m=0;
  //        $testmul =0;
  //        $a = 0;
  //           $b = 0;
  //           $simCollaborative = array();
	 //        for($j = 0; $j < 30 ; $j++) {
	 //             for($i = 0; $i < sizeof($userunique) ; $i++) {
	 //             	// echo '['.$arr[$m].']';
	 //             	// echo '['.$arr[$i].']';
	 //             	for ($k = 0; $k < 30 ; $k++ ) {
	 
	 //             		$multiplyof2rows =  ( $ratinglist[$m][$k] * $ratinglist[$i][$k]);
	 //             		$a = $a + ( $ratinglist[$m][$k] * $ratinglist[$m][$k] );
	 //             		$b = $b +  (  $ratinglist[$i][$k] * $ratinglist[$i][$k] );
	 //             		$testmul = $testmul + ( $ratinglist[$m][$k] * $ratinglist[$i][$k] );
	 //             		// print_r($multiplyof2rows);
	 //             		// echo "\n";
		             

						
						

	 //             	}
	 //             	$similarityCollaborative = $testmul / (sqrt($a) * sqrt($b));
	 //             // 	echo "\n".'A :' .$a;
	 //             // 	echo "\n".'B :' .$b;
	 //            	// echo "\n".'Total :' .$testmul;
	 //            	// echo "\nSim : " .$similarity;
	 //            	$simCollaborative[] = $similarityCollaborative;
	 //            	$testmul=0;
	 //            	$a=0;
	 //            	$b=0;

	 //             	// echo "\n";

		               
	 //             }
	 //             if($m < 17 ) {
	 //             	$m = $m+1;
	 //             } else { break; }
	            
	      

	 //                // echo "\n";

	 //        }
		// $chunkColla = array_chunk($simCollaborative, 18);
		
		
		// for($i = 0 ; $i < 18; $i ++ ) {
		// 	arsort($chunkColla[$i]);
		// }
		$index = 0;

		$arrayfortopthreecafe2 = array();
		for($k=0;$k<30;$k++){// Print 30 ร้าน สำหรับ predicted 
			for($j = 0; $j < sizeof($checkrate) ; $j++ ) {
				if ( $checkrate[$j] == $k ) {
					$k++;
				} else {
					$index = $k;
				}
			}

					$keys = array_keys($chunk2[$index]);

		// echo "Cafe : $index\n";
		// echo "Actual Rating: $ar_rating[$index] \n";
		// echo "=================================== \n";
		$rating = 0;
		$val = 0;
		$predictedrating = 0;

		$sumofsimxrating =0;

		$ratingColla = 0;
		$valColla = 0;
		$predictedratingColla = 0;
		$sumofsimxratingColla =0;

		$sumofsimcontent = 0; //ย้ายมาประกาศนี่ เทพเลย
		$sumofsimcolla = 0;


		$i = 0;
		$j = 0;
		$knearest = 3;

		while($i < 30  && $j < $knearest) {


			if ($index == $keys[$i] ) {
				$i++;
				
			} 
			
			if($ar_rating[$keys[$i]] != 0) {

				$rating = $ar_rating[$keys[$i]];
				// $ratingColla = $ratinglist[$keysColla[$i]][$index];

				$val = $chunk2[$index][$keys[$i]];
				// $valColla = $chunkColla[$index][$keysColla[$i]];
	
				$sumofsimxrating = $sumofsimxrating + ( $val*$rating );
				// $predictedratingColla = $predictedratingColla + ($valColla*$ratingColla);
				
				// echo "Cafe Id : ".$keys[$i]. ":" .$val. "\n Similarity * Rating( $val * $rating ) = " .$val*$rating. "\n";
				$sumofsimcontent += $val;
	
				// echo "User  : ".$keysColla[$i]. " -" .$valColla. "\n Similarity * Rating( $valColla * $ratingColla ) = " .$valColla*$ratingColla. "\n";
				
				$i++;
				$j++;
			}else{
				$i++;

			}

			
		}
					if($sumofsimcontent == 0) {
				break;
			}
		$predictedrating = $sumofsimxrating/$sumofsimcontent;
		$arrayforsim[] = $predictedrating;

		// $predictedratingColla = $sumofsimxratingColla / $sumofsimcolla;
		$arrayforsim2[] = $predictedratingColla;
		// echo "Actual Rating: $ar_rating[$index] \n\n";
		
		$arrayfortopthreecafe[$k] = $predictedrating;

		// echo "[Contentbase] Predicted Rating : " . $predictedrating . '<br>' ;
	}

	arsort($arrayfortopthreecafe);
	// print_r($arrayfortopthreecafe);


		
		// echo "\nTop 3 with Cafe: \n";
		$x = 0;
		$q = 0;
		$knearest2 = 3;
		$topcafeforloggedin = array();
		
		$count = 0;
		foreach ($arrayfortopthreecafe as $key => $value) {
			if ( $count < 3 ) {
				$topcafeforloggedin[] = $key+1; // +1 เพราะใน database เก็บค่าเริ่มจาก 1
				$topratingcafevalue[] = $value;
				// echo "Key: $key; Value: $value<br />\n";
				$count++;
			} else {
				break;
			}
		    
		}		
		// while($x < $knearest) {
		// 	$keys = array_keys($arrayfortopthreecafe);
		// 	// echo "Cafe Id : $keys[$x] \n" ;
		// 	$topcafeforloggedin[] = $keys[$x];
		// 	$x++;
		// }

		foreach ($topcafeforloggedin as $key => $value) {

					$condition = $value;

					$SQLquery = "
					SELECT * FROM `cafe` as cafe 
					
					WHERE cafe.cid=$condition ";
					$query3 = $this->db->query($SQLquery);

					$collecttoploggedin[] = $query3->result();

		}

			$data['recommendedloggedin'] = $collecttoploggedin;

			$data['recommendedrating'] = $topratingcafevalue;



		}

			$data['session_username'] = $session_data['username']; 

		$num_rec_per_page = 10;
		if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };
		$start_from = ($page-1) * $num_rec_per_page;


		$SQLquery = "
		(SELECT * FROM `cafe` LIMIT $start_from, $num_rec_per_page) 
		";
		$query = $this->db->query($SQLquery);



		$SQLquerydessert = "
		(
			SELECT dessert1.*, cate.catename
			FROM `dessert` AS dessert1
			INNER JOIN dessert_categories AS dc ON dc.dcdid = dessert1.did
			INNER JOIN categories AS cate ON cate.cateid = dc.dccid 
		) 
		";
		$querydessert = $this->db->query($SQLquerydessert);
		
		$session_data = $this->session->userdata('logged_in');
		$data['session_uid'] = $session_data['uid'];

 		$data["cafelist"] = $query->result(); 		
 		$data["totalrecord"] = $this->db->count_all_results('cafe');
 		// $data["totalscore"] = round($totalrate/$user,2);
 		$data["sumof"] = $sumof;
 		$data["dessertlist"] = $querydessert->result();
 		
 		$this->load->view("header_in", $data);
		$this->load->view("category_page", $data);
		$this->load->view("footer", $data);
	


			} else {

		$this->load->database();

		$this->db->select('cafe.cid');
		$this->db->select('cafe.cname');
		$this->db->select('cafe.cimg');
		$this->db->select('cafe.cimg');
		$this->db->select('cprice');
		$this->db->select(' ccredit ');
		$this->db->select(' cparking ');
		$this->db->select(' cgroup');
		$this->db->select(' ccake ');
		$this->db->select(' carea ');
		$this->db->select(' chour ');
		$this->db->select(' ctel ');
		$this->db->select(' clat ');
		$this->db->select(' clong ');
		$this->db->select(' caddress ');

		$this->db->select('rating_cafe.ratescore');		
		$this->db->from('cafe');
		$this->db->join('rating_cafe','rating_cafe.cid=cafe.cid','left');
		$this->db->join('users','users.uid=rating_cafe.uid','left');
		$query2 = $this->db->get();	
		// echo '<pre>';
		// print_r($query2->result());

		$SQLquery = "
		(SELECT * FROM `users`) ";
		$querycafeid = $this->db->query($SQLquery);
		$usersize = $querycafeid->num_rows();


		$totalrate = 0;
		$user = 0;

		
		$totalrateArray = array();
		$userArray = array();

		if ($query2->num_rows() > 1) {



			for ($i = 0; $i < $query2->num_rows() ; $i++) {
				$result = $query2->result();
				$totalrateArray[] = $result[$i]->ratescore; 
				$userArray[] = 1;
			}
		}
		// print_r($totalrateArray);
		try{
			$cutTotalrate = array_chunk($totalrateArray, $usersize);
		$cutUser = array_chunk($userArray, $usersize);	
		} catch(Exception $e) {

		}
		// print_r($cutTotalrate );
		// echo '<br>';
		// print_r($cutUser);

		$sum = 0;
		$sumof = array();
		for ( $j = 0; $j < 30 ; $j ++) {
		   for ( $i = 0 ; $i < $usersize ; $i++) {
		   	$sum += $cutTotalrate[$j][$i];
		   }
		   $sumof[$j] = $sum;
		   $sum = 0;
		}

		// print_r($sumof);
		
		for($i = 0 ; $i < 30 ; $i ++ ) {
			$sumof[$i] = $sumof[$i] / $usersize;
		}

		for($i = 0 ; $i < 30 ; $i ++ ) {
			$sumoftop[$i] = $sumof[$i];
		}

		
		arsort($sumoftop);
		// print_r($sumoftop);
		// echo '<br>';
		
		$count = 0;
		$topratingcafe = array();
		foreach ($sumoftop as $key => $value) {
			if ( $count < 3 ) {
				$topratingcafe[] = $key+1; // +1 เพราะใน database เก็บค่าเริ่มจาก 1
				$topratingcafevalue[] = $value;
				// echo "Key: $key; Value: $value<br />\n";
				$count++;
			} else {
				break;
			}
		    
		}
		// print_r($topratingcafe);
		// print_r($topratingcafevalue);

		foreach ($topratingcafe as $key => $value) {

					$condition = $value;

					$SQLquery = "
					SELECT * FROM `cafe` as cafe 
					
					WHERE cafe.cid=$condition ";
					$query3 = $this->db->query($SQLquery);

					$collecttop[] = $query3->result();

		}
		// echo '<pre>';
		// print_r($collecttop);


		$num_rec_per_page = 10;
		if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };
		$start_from = ($page-1) * $num_rec_per_page;


		$SQLquery = "
		(SELECT * FROM `cafe` LIMIT $start_from, $num_rec_per_page) 
		";
		$query = $this->db->query($SQLquery);



		$SQLquerydessert = "
		(
			SELECT dessert1.*, cate.catename
			FROM `dessert` AS dessert1
			INNER JOIN dessert_categories AS dc ON dc.dcdid = dessert1.did
			INNER JOIN categories AS cate ON cate.cateid = dc.dccid 
		) 
		";
		$querydessert = $this->db->query($SQLquerydessert);
		
		$session_data = $this->session->userdata('logged_in');
		$data['session_uid'] = $session_data['uid'];

		$data['session_username'] = $session_data['username']; 
 		$data["cafelist"] = $query->result();
		$data['recommendedcafe'] = $collecttop;
		$data['recommendedrating'] = $topratingcafevalue;  		
 		$data["totalrecord"] = $this->db->count_all_results('cafe');
 		// $data["totalscore"] = round($totalrate/$user,2);
 		$data["sumof"] = $sumof;
 		$data["dessertlist"] = $querydessert->result();
 		$this->load->view("header_in");	
		$this->load->view("category_page", $data);	
		$this->load->view("footer");	
			}


	}

}

?>