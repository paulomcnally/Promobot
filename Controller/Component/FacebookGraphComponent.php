<?php
App::uses('Component', 'Controller');
class FacebookGraphComponent extends Component{

	/**
	 * Get Facebook Info
	 * @param string $facebook
	 * @return array
	 */
	public function getBusiness($facebook){
		
		$result = $this->getInfo($facebook);
		
		if(!isset($result['id'])){
			return false;
		}
		
		$new_business = array();
		
		$new_business['Business']['name'] = $result['name'];
		$new_business['Business']['facebookId'] = $result['id'];
		$new_business['Business']['facebook'] = $facebook;
		if(isset($result['description']))
			$new_business['Business']['descripcion'] = $result['description'];
		if(isset($result['phone']))
			$new_business['Business']['phone'] = $result['phone'];
		if(isset($result['website']))
			$new_business['Business']['web'] = $result['website'];
		if(isset($result['location'])){
			if(isset($result['location']['street']))
				$new_business['BusinessDetail'][0]['direccion'] = $result['location']['street'];
			if(isset($result['location']['latitude']))
				$new_business['BusinessDetail'][0]['lat'] = $result['location']['latitude'];
			if(isset($result['location']['longitude']))
				$new_business['BusinessDetail'][0]['long'] = $result['location']['longitude'];
			if(isset($result['location']['city']))
				$new_business['BusinessDetail'][0]['city'] = $result['location']['city'];
		}
		
		$new_business['Business']['facebook_info'] = json_encode($result);
		
		return $new_business;
	}
	
	private function getInfo($facebook){
		$facebook = explode("facebook.com/", $facebook);
		
		if($facebook[1] == "page")
			return false;
		
		$facebook = $facebook[1];
		
		// set URL and other appropriate options
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, "http://graph.facebook.com/$facebook");
		curl_setopt($ch, CURLOPT_HTTPGET, true);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		
		// grab URL and pass it to the browser
		$result = curl_exec($ch);
		
		// close cURL resource, and free up system resources
		curl_close($ch);
		
		return json_decode($result,true);
	}
}