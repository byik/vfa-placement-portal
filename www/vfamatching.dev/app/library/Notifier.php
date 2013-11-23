<?php

class Notifier {

	public static function individual($user, $message){
		self::text($user, $message);
		self::email($user, $message);
	}

	public static function group($users, $message){
		foreach($users as $user){
			self::individual($user, $message);
		}
	}

	private static function text($user, $message){
		if(!empty($user->profile->phoneNumber)){
			Twilio::message($user->profile->phoneNumber, $message);
		}
	}

	private static function email($user, $message){
		//TODO
	}

}