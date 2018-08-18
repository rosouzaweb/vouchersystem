<?php 
		if(isset($this->request["url"]["code"]) && isset($this->request["url"]["email"])){
		$answer = array();
		$used = $this->Flash->render("used");
		$invalid = $this->Flash->render("invalid");
		$success = $this->Flash->render("success");
		if(isset($voucher) && !empty($voucher) && $success <> null){
		$answer["result"] = "Voucher successfully redeemed"; 
		}else{ 
			if($used <> null){
				$answer["result"] = "Voucher already verified";
			}
			if($invalid <> null){
				$answer["result"] = "Voucher invalid or mal-formed";
			}
		}?>
	<?php 

// 		$answer["request"] = $this->Url->build($this->request->getRequestTarget());
		$answer["code"] = $this->request["url"]["code"];
		$answer["email"] = $this->request["url"]["email"];
		$answer["percentage"] = $voucher["special_offer"]["fixed_percentage"];
		$answer["date_usage"] = $voucher["expiration_date"];
		
		echo json_encode($answer);
		}elseif(isset($this->request["url"]["email"])){
			if(!empty($vouchers)){
				$answer = array();

					$i = 0;
					foreach($vouchers as $voucher){
						$answer["name"] = $voucher["recipient"]["name"];
						$answer["email"] = $voucher["recipient"]["email"];
						$answer[$i]["voucher_code"]  = strtoupper($voucher["code"]);
						$answer[$i]["special_offer_name"]  = strtoupper($voucher["special_offer"]["name"]);
						$answer[$i]["special_offer_percentage"]  = strtoupper($voucher["special_offer"]["fixed_percentage"])."%";
						$i++;
					}
			}else{
				$answer	= 'Email not found';
			}
			echo json_encode($answer);
			
// 			debug($answer);die();
			
		}	
		?>