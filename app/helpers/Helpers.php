<?php
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Crypt;

class Helper{
	
		public static function dateFormating($date)
		{
			$formatedDate = Carbon::parse($date)->format('Y-m-d');
			return $formatedDate;
		}
		public static function dateDeFormating($date)
		{
			$formatedDate = Carbon::parse($date)->format('d-m-Y');
			return $formatedDate;
		}
		public static function cryptoJsAesDecrypt($passphrase, $jsonString){
			$jsondata = json_decode($jsonString, true);
			try {
				$salt = hex2bin($jsondata["s"]);
				$iv  = hex2bin($jsondata["iv"]);
			} catch(Exception $e) { return null; }
			$ct = base64_decode($jsondata["ct"]);
			$concatedPassphrase = $passphrase.$salt;
			$md5 = array();
			$md5[0] = md5($concatedPassphrase, true);
			$result = $md5[0];
			for ($i = 1; $i < 3; $i++) {
				$md5[$i] = md5($md5[$i - 1].$concatedPassphrase, true);
				$result .= $md5[$i];
			}
			$key = substr($result, 0, 32);
			$data = openssl_decrypt($ct, 'aes-256-cbc', $key, true, $iv);
			return json_decode($data, true);
		}
		/**
		* Encrypt value to a cryptojs compatiable json encoding string
		*
		* @param mixed $passphrase
		* @param mixed $value
		* @return string
		*/
		public static function cryptoJsAesEncrypt($passphrase, $value){
			$salt = openssl_random_pseudo_bytes(8);
			$salted = '';
			$dx = '';
			while (strlen($salted) < 48) {
				$dx = md5($dx.$passphrase.$salt, true);
				$salted .= $dx;
			}
			$key = substr($salted, 0, 32);
			$iv  = substr($salted, 32,16);
			$encrypted_data = openssl_encrypt(json_encode($value), 'aes-256-cbc', $key, true, $iv);
			$data = array("ct" => base64_encode($encrypted_data), "iv" => bin2hex($iv), "s" => bin2hex($salt));
			return json_encode($data);
		}
		public static function getuserteam($team){
			$UserId =  Session::get('user_id');
		  
			$user_role= Session::get('userrole');
			$userrole1 = Crypt::encrypt($user_role);
		   
	 		// DB::enableQuerylog();
			$teamId= DB::table(DB::raw('mst_users mu,mst_team_creation r'))     
				->select("team_name","spoc","hod","kmp","user_id","team","mst_team_creation_id")
				->where('r.flag','Show')
				->where('user_id',$UserId) 
				->where('r.mst_team_creation_id',$team)
				->where(function($q) {
					$q->whereRaw('FIND_IN_SET(mu.user_id,r.kmp)')
					->orWhereRaw('FIND_IN_SET(mu.user_id,r.hod)')
					->orWhereRaw('FIND_IN_SET(mu.user_id,r.spoc)')
					->orWhereRaw('FIND_IN_SET(mu.user_id,r.team)');
				})->get()->first(); 
				
				$user_id = $teamId->user_id;
				$kmpuser = explode(",",$teamId->kmp);
				$spocuser = explode(",",$teamId->spoc);
				$hoduser =explode(",", $teamId->hod);
				$teamuser = explode(",",$teamId->team);
				
				if(in_array($user_id,$spocuser)){
					$type = Crypt::encrypt('spoc');
					return $type;
				}
				else if(in_array($user_id,$hoduser)){
					$type = Crypt::encrypt('hod');
					return $type;
				}
				else if(in_array($user_id,$teamuser )){
					$type = Crypt::encrypt('team');
					return $type;
				}else if(in_array($user_id,$kmpuser )){
					$type = Crypt::encrypt('kmp');
					return $type;
				}
		}
		// public static function addmopshow_scorecard($type){
		//  if($type == 'PG'){
		//  return $type;
		// }else if($type == 'PN'){
		// 	return $type;
		// }else if($type == 'AL'){
		//  return $type;
		// }else if($type == 'SK'){
		//  return $type;
		// }else if($type == 'ST'){
		//  return $type;
		// }

}
?>