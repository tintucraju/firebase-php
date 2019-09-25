<?php
/**
*   Firebase PHP Api 
*   Author : Tintu C Raju 
*   Date : 25-09-2019
*/

define( 'API_ACCESS_KEY', '--api key here--' );

class Firebase {

	private $to;

	/**
	 * Set the device by using the token given by firebase
	 * @param String $token [token string given by firebase]
	 */
	public function setDevice($token){
		$this->to = $token;
	}

	/**
	 * Method to push message to firebase 
	 * @param  Array $msg [Contains the title,message and any other specific arguments send my the user]
	 * @return Array Return an array response which the decoded json recieved from firebase
	 */
	public function push($msg) {

		// set the header
		$headers = array
		(
		    'Authorization: key=' . API_ACCESS_KEY,
		    'Content-Type: application/json'
		);

		// fields to be passed along with curl request where `to` is the token and `msg` is the message array
		$fields = array
		(
		    'to'            => $this->to,
		    'notification'  => $msg

		);

		$ch = curl_init();
		curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
		curl_setopt( $ch,CURLOPT_POST, true );
		curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
		curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
		curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
		curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
		$result = curl_exec($ch );
		curl_close( $ch );
		$result_json = json_decode($result,true);
		return $result_json;
	}
}


?>