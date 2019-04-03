<?php
	$xml = "<?xml version=\"1.0\" encoding=\"ISO-8859-1\" ?>";      
	//***********************************************************************************************************************
	// V1.5 : Light Alarm de MaDomotic.fr / Influman 2019
	// recuperation des infos depuis la requete
	$server = getArg("server", true);
	$default = getArg("default", true);
	$action = getArg("action", true, ''); 
	$bright = getArg("bright", false, 'default');
	$speed = getArg("speed", false, 'default');
	$delay = getArg("delay", false, 'default');
	$color = getArg("color", false);
	$led = getArg("led", false);
	$value = getArg("value", false);
	$apis = getArg("apis", false);
	$apiu = getArg("apiu", false);
	$ipeed = getArg("ipeed", false);
	// API DU PERIPHERIQUE APPELANT LE SCRIPT
    $periph_id = getArg('eedomus_controller_module_id'); 
	//
	// VARIABLES APPLIS ******************************************************************
	// TIME
	$tab_min_led = array("00" => 1, "01" => 1, "02" => 1, "03" => 2, "04" => 2, "05" => 2, "06" => 2, "07" => 2, "08" => 3, "09" => 3, "10" => 3, "11" => 3, "12" => 3,
						"13" => 4, "14" => 4, "15" => 4, "16" => 4, "17" => 4, "18" => 5, "19" => 5, "20" => 5, "21" => 5, "22" => 5,
						"23" => 6, "24" => 6, "25" => 6, "26" => 6, "27" => 6, "28" => 7, "29" => 7, "30" => 7, "31" => 7, "32" => 7,
						"33" => 8, "34" => 8, "35" => 8, "36" => 8, "37" => 8, "38" => 9, "39" => 9, "40" => 9, "41" => 9, "42" => 9,
						"43" => 10, "44" => 10, "45" => 10, "46" => 10, "47" => 10, "48" => 11, "49" => 11, "50" => 11, "51" => 11, "52" => 11,
						"53" => 12, "54" => 12, "55" => 12, "56" => 12, "57" => 12, "58" => 1, "59" => 1);
	$time_cadran_color = "cyan";
	$time_cadran_hour = "red";
	$time_cadran_min = "purple";
	//TIMER
	$timer_color = "red";
	// PING
	$ping_ok_color = "green";
	$ping_ko_color = "red";
	// ALARM
	$alarm_ledtab = "orange,red,orange,red,orange,red,orange,red,orange,red,orange,red";
	// DELESTAGE
	$delestage_on_color = "green";
	$delestage_off_color = "orange";
	$delestage_dlst_color = "blue";
	// INJECTION
	$injection_ledtab = "green,green,green,off,off,off,green,off,off,off,green,green";
	//
	//*********************************************************************************
	
	if ($action == '' ) {
		die();
	}
	$xml .= "<LIGHTALARM>";
	$tab_param = explode(",",$server);
	$num = $tab_param[0];
	$version = $tab_param[1];
	$server = $tab_param[2];
	list($default_speed,$default_bright,$default_delay) = sscanf($default, "speed(%d),bright(%d),delay(%d)");
		
	if ($speed == "" || $speed == "default") {
		$speed = $default_speed;
	}
	if ($delay == "" || $delay == "default") {
		$delay = $default_delay;
	}
	if ($bright == "" || $bright == "default") {
		$bright = $default_bright;
	}
	if ($action == "alloff") {
		$url_api = "http://".$server."/api/leds?set=off";
		$result_api = httpQuery($url_api, 'GET');
		die();
	}
	
	if ($action == "allon") {
		$url_api = "http://".$server."/api/leds?set=on&color=".$color."&bright=".$bright."&delay=".$delay;
		$result_api = httpQuery($url_api, 'GET');
		die();
	}
	if ($action == "strobe") {
		$url_api = "http://".$server."/api/leds?set=strobe&color=".$color."&bright=".$bright."&delay=".$delay."&speed=".$speed;
		$result_api = httpQuery($url_api, 'GET');
		die();
	}
	
	if ($action == "wheel") {
		$url_api = "http://".$server."/api/leds?set=wheel&color=".$color."&bright=".$bright."&delay=".$delay."&speed=".$speed;
		$result_api = httpQuery($url_api, 'GET');
		die();
	}
	
	if ($action == "fade") {
		$url_api = "http://".$server."/api/leds?set=fade&color=".$color."&bright=".$bright."&delay=".$delay."&speed=".$speed;
		$result_api = httpQuery($url_api, 'GET');
		die();
	}
	//
	// SLAM VERSION ***************************************
	if ($version == "SLAM") {
		
		if ($action == "initswitch") {
			$url_send = urlencode("http://[VAR1]/api/set?action=periph.value&periph_id=[VAR2]&value=[SWITCH]&[VAR3]");
			$url_var3 = urlencode("api_user=".$apiu."&api_secret=".$apis);
			$url_api = "http://".$server."/api/set?url=".$url_send."&VAR1=".$ipeed."&VAR2=".$periph_id."&VAR3=".$url_var3;
			$result_api = httpQuery($url_api, 'GET');
			die();
		}
		
		if ($action == "time") {
			$url_api = "http://".$server."/api/leds?set=off";
			$result_api = httpQuery($url_api, 'GET');
			$url_api = "http://".$server."/api/leds?set=on&color=".$time_cadran_color."&bright=1&led=1";
			$result_api = httpQuery($url_api, 'GET');
			$url_api = "http://".$server."/api/leds?set=on&color=".$time_cadran_color."&bright=1&led=4";
			$result_api = httpQuery($url_api, 'GET');
			$url_api = "http://".$server."/api/leds?set=on&color=".$time_cadran_color."&bright=1&led=7";
			$result_api = httpQuery($url_api, 'GET');
			$url_api = "http://".$server."/api/leds?set=on&color=".$time_cadran_color."&bright=1&led=10";
			$result_api = httpQuery($url_api, 'GET');
			$heure = date('g');
			$min = date('i');
			$url_api = "http://".$server."/api/leds?set=on&color=".$time_cadran_min."&bright=1&led=".$tab_min_led[$min];
			$result_api = httpQuery($url_api, 'GET');
			$heureled = $heure + 1;
			if ($heureled == 13) {
				$heureled = 1;
			}
			$url_api = "http://".$server."/api/leds?set=on&color=".$time_cadran_hour."&bright=1&led=".$heureled;
			$result_api = httpQuery($url_api, 'GET');
			die();
		}
		if ($action == "longpress") {
			$url_api = "http://".$server."/api/leds?set=fade&color=".$color."&bright=50&iteration=1&speed=10";
			$result_api = httpQuery($url_api, 'GET');
			die();
		}
		if ($action == "shortpress") {
			$url_api = "http://".$server."/api/leds?set=fade&color=".$color."&bright=50&iteration=1&speed=3";
			$result_api = httpQuery($url_api, 'GET');
			die();
		}
		if ($action == "doublepress") {
			$url_api = "http://".$server."/api/leds?set=fade&color=".$color."&bright=50&iteration=2&speed=3";
			$result_api = httpQuery($url_api, 'GET');
			die();
		}
		if ($action == "triplepress") {
			$url_api = "http://".$server."/api/leds?set=fade&color=".$color."&bright=50&iteration=3&speed=3";
			$result_api = httpQuery($url_api, 'GET');
			die();
		}
		if ($action == "quadruplepress") {
			$url_api = "http://".$server."/api/leds?set=fade&color=".$color."&bright=50&iteration=4&speed=3";
			$result_api = httpQuery($url_api, 'GET');
			die();
		}
		
		//////// APP TIMER START/STOP
		////////
		if ($action == "timer") {
			if ($value == "stop") {
				$url_api = "http://".$server."/api/leds?set=off";
				$result_api = httpQuery($url_api, 'GET');
				//value : valeur donnée en minutes
				saveVariable("SLAMTIMER_".$num,0);
				saveVariable("SLAMTIMERCOEF_".$num,1);
				die();
			} else if (is_numeric($value)) {
				$url_api = "http://".$server."/api/leds?set=on&color=".$timer_color."&bright=20";
				$result_api = httpQuery($url_api, 'GET');
				//value : valeur donnée en minutes
				$coef = round($value / 12, 2);
				saveVariable("SLAMTIMER_".$num,$value);
				saveVariable("SLAMTIMERCOEF_".$num,$coef);
				die();
			}
		}
		
		//////// APP ALARM START/STOP
		////////
		if ($action == "alarm") {
			$activated_apps = loadVariable("SLAMAPPS_".$num);
			if ($value == "stop") {
				saveVariable("SLAMALARMAPI_".$num,0);
				saveVariable("SLAMALARMOFF_".$num,0);
				$activated_apps["ALARM"] = 0;
				saveVariable("SLAMAPPS_".$num,$activated_apps);
				die();
			} else {
				$param_alarm = explode(",",$value);
				saveVariable("SLAMALARMAPI_".$num,$param_alarm[0]);
				saveVariable("SLAMALARMOFF_".$num,$param_alarm[1]);
				$activated_apps["ALARM"] = 1;
				saveVariable("SLAMAPPS_".$num,$activated_apps);
				saveVariable("SLAMAPPSNEXT_".$num,"ALARM");
				$tab_leds = explode(",",$alarm_ledtab);
				for($i=0;$i<12;$i++) {
					$ledon = $i + 1;
					if ($tab_leds[$i] != "off" && $tab_leds[$i] != "") {
						$url_api = "http://".$server."/api/leds?set=on&color=".$tab_leds[$i]."&bright=20&led=".$ledon;
					} else {
						$url_api = "http://".$server."/api/leds?set=off&led=".$ledon;
					}
					$result_api = httpQuery($url_api, 'GET');
				}
				for($i=12;$i>0;$i--) {
					$ledon = $i;
					$url_api = "http://".$server."/api/leds?set=off&led=".$ledon;
					$result_api = httpQuery($url_api, 'GET');
				}
				die();
			}
		}
		
		//////// APP PING START/STOP
		////////
		if ($action == "ping") {
			$activated_apps = loadVariable("SLAMAPPS_".$num);
			if ($value == "stop") {
				saveVariable("SLAMPINGAPI_".$num,0);
				$activated_apps["PING"] = 0;
				saveVariable("SLAMAPPS_".$num,$activated_apps);
				die();
			} else {
				saveVariable("SLAMPINGAPI_".$num,$value);
				$activated_apps["PING"] = 1;
				saveVariable("SLAMAPPS_".$num,$activated_apps);
				saveVariable("SLAMAPPSNEXT_".$num,"PING");
				$url_api = "http://".$server."/api/leds?set=wheel&color=".$ping_ok_color."&bright=20&speed=".$speed."&delay=3";
				$result_api = httpQuery($url_api, 'GET');
				die();
			}
		}
		
		//////// DELESTAGE
		////////
		if ($action == "delestage") {
			$activated_apps = loadVariable("SLAMAPPS_".$num);
			if ($value == "stop") {
				$activated_apps["DELESTAGE"] = 0;
				saveVariable("SLAMAPPS_".$num,$activated_apps);
				
				die();
			} else {
				$activated_apps["DELESTAGE"] = 1;
				saveVariable("SLAMAPPS_".$num,$activated_apps);
				saveVariable("SLAMAPPSNEXT_".$num,"DELESTAGE");
				$url_api = "http://".$server."/api/leds?set=wheel&color=".$delestage_on_color."&bright=20&speed=".$speed."&delay=3";
				$result_api = httpQuery($url_api, 'GET');
				die();
			}
		}
		
		//////// APP INJECTION EDF START/STOP
		////////
		if ($action == "injection") {
			$activated_apps = loadVariable("SLAMAPPS_".$num);
			if ($value == "stop") {
				saveVariable("SLAMINJECTIONAPI_".$num,0);
				saveVariable("SLAMINJECTIONON_".$num,0);
				$activated_apps["INJECTION"] = 0;
				saveVariable("SLAMAPPS_".$num,$activated_apps);
				die();
			} else {
				$param_alarm = explode(",",$value);
				saveVariable("SLAMINJECTIONAPI_".$num,$param_alarm[0]);
				saveVariable("SLAMINJECTIONON_".$num,$param_alarm[1]);
				$activated_apps["INJECTION"] = 1;
				saveVariable("SLAMAPPS_".$num,$activated_apps);
				saveVariable("SLAMAPPSNEXT_".$num,"INJECTION");
				$tab_leds = explode(",",$injection_ledtab);
				for($i=0;$i<12;$i++) {
					$ledon = $i + 1;
					if ($tab_leds[$i] != "off" && $tab_leds[$i] != "") {
						$url_api = "http://".$server."/api/leds?set=on&color=".$tab_leds[$i]."&bright=20&led=".$ledon;
					} else {
						$url_api = "http://".$server."/api/leds?set=off&led=".$ledon;
					}
					$result_api = httpQuery($url_api, 'GET');
				}
				for($i=12;$i>0;$i--) {
					$url_api = "http://".$server."/api/leds?set=off&led=".$ledon;
					$result_api = httpQuery($url_api, 'GET');
				}
				die();
			}
		}
		if ($action == "ledstab") {
			$tab_leds = explode(",",$value);
			for($i=0;$i<12;$i++) {
				$ledon = $i + 1;
				if ($tab_leds[$i] != "off" && $tab_leds[$i] != "") {
					$url_api = "http://".$server."/api/leds?set=on&color=".$tab_leds[$i]."&bright=".$bright."&led=".$ledon;
				} else {
					$url_api = "http://".$server."/api/leds?set=off&led=".$ledon;
				}
				$result_api = httpQuery($url_api, 'GET');
				
			}
			die();
		}
		
		if ($action == "getswitch") {
			$status = 0;
			$xml .= "<SWITCH>".$status."</SWITCH>";
		}
		
		// GESTION DES APPS /////////////////////////////////////////
		///////////////////////////////////////////////////////////
		if ($action == "getstatus") {
			$status = 0;
			$activated_apps = loadVariable("SLAMAPPS_".$num);
			$next_apps = loadVariable("SLAMAPPSNEXT_".$num);
			
			// MONITORING DU PING
			if ($activated_apps['PING'] == 1 && $next_apps == "PING") {
				$url_api = "http://".$server."/api/leds?set=off";
				$result_api = httpQuery($url_api, 'GET');
				$ping_api = loadVariable("SLAMPINGAPI_".$num);
				$status = "PING Monitoring";
				$tab_pingapi = explode(",",$ping_api);
				for ($i=0;$i<count($tab_pingapi);$i++) {
					$tab_ping = getValue($tab_pingapi[$i]);
					$currentled = $i + 1;
					if ($tab_ping['value'] == 1) {
						$url_api = "http://".$server."/api/leds?set=on&led=".$currentled."&color=".$ping_ok_color."&bright=20";
					} else {
						$url_api = "http://".$server."/api/leds?set=on&led=".$currentled."&color=".$ping_ko_color."&bright=20";
					}
					$result_api = httpQuery($url_api, 'GET');
				}	
			}
			
			// MONITORING DU DELESTAGE
			if ($activated_apps['DELESTAGE'] == 1 && $next_apps == "DELESTAGE") {
				$url_api = "http://".$server."/api/leds?set=off";
				$result_api = httpQuery($url_api, 'GET');
				$tab_delestage = loadVariable("DELESTAGE_MONITOR", $scope = "delestage");
				$delestok = false;
				if ($tab_delestage != '' && substr($tab_delestage,0,8) != "## ERROR") {
					for ($i=1;$i<=count($tab_delestage);$i++) {
						if ($tab_delestage[$i] == "DLST") {
							$delestok = true;
							break;
						}
					}
					if ($delestok) {
						$status = "DELESTAGE Monitoring";
						for ($i=1;$i<=count($tab_delestage);$i++) {
							if ($tab_delestage[$i] == "OFF") {
								$url_api = "http://".$server."/api/leds?set=on&led=".$i."&color=".$delestage_off_color."&bright=20";
							} else if ($tab_delestage[$i] == "DLST") {
								$url_api = "http://".$server."/api/leds?set=on&led=".$i."&color=".$delestage_dlst_color."&bright=20";
							} else {
								$url_api = "http://".$server."/api/leds?set=on&led=".$i."&color=".$delestage_on_color."&bright=20";
							}
							$result_api = httpQuery($url_api, 'GET');
						}
					}
				}	
			}
			
			// MONITORING DE L'ALARME
			if ($activated_apps['ALARM'] == 1 && $next_apps == "ALARM") {
				$url_api = "http://".$server."/api/leds?set=off";
				$result_api = httpQuery($url_api, 'GET');
				$alarm_api = loadVariable("SLAMALARMAPI_".$num);
				$alarm_off = loadVariable("SLAMALARMOFF_".$num);
				$tab_alarm = getValue($alarm_api);
				if ($tab_alarm['value'] != $alarm_off) {
					$status = "ALARM Monitoring";
					$tab_leds = explode(",",$alarm_ledtab);
					for($i=0;$i<12;$i++) {
						$ledon = $i + 1;
						if ($tab_leds[$i] != "off" && $tab_leds[$i] != "") {
							$url_api = "http://".$server."/api/leds?set=on&color=".$tab_leds[$i]."&bright=10&led=".$ledon;
						} else {
							$url_api = "http://".$server."/api/leds?set=off&led=".$ledon;
						}
						$result_api = httpQuery($url_api, 'GET');
					}
				}
			}
			
			// MONITORING DE L'INJECTION
			if ($activated_apps['INJECTION'] == 1 && $next_apps == "INJECTION") {
				$url_api = "http://".$server."/api/leds?set=off";
				$result_api = httpQuery($url_api, 'GET');
				$injection_api = loadVariable("SLAMINJECTIONAPI_".$num);
				$injection_on = loadVariable("SLAMINJECTIONON_".$num);
				$tab_injection = getValue($injection_api);
				if ($tab_injection['value'] != $injection_on) {
					$status = "INJECTION Monitoring";
					$tab_leds = explode(",",$injection_ledtab);
					for($i=0;$i<12;$i++) {
						$ledon = $i + 1;
						if ($tab_leds[$i] != "off" && $tab_leds[$i] != "") {
							$url_api = "http://".$server."/api/leds?set=on&color=".$tab_leds[$i]."&bright=10&led=".$ledon;
						} else {
							$url_api = "http://".$server."/api/leds?set=off&led=".$ledon;
						}
						$result_api = httpQuery($url_api, 'GET');
					}
				}
			}
			
			if ($activated_apps['PAUSE'] == 1 && $next_apps == "PAUSE") {
				$url_api = "http://".$server."/api/leds?set=off";
				$result_api = httpQuery($url_api, 'GET');
			}
			
			// NEXT APPS
			$activated_apps['PAUSE'] = 1;
			$cpt = 0;
			$cpt_actual = 0;
			$actual = "";
			$tab_activated = array();
			foreach ($activated_apps as $apps => $state) {
				if ($state == 1) {
					$tab_activated[$cpt] = $apps;
					if ($next_apps == $apps) {
						$cpt_actual = $cpt;
					}
					$cpt++;
				}
			}
			
			$next_cpt = $cpt_actual + 1;
			if ($next_cpt == count($tab_activated)) {
				$next_cpt = 0;
			}
			if (count($tab_activated) == 1) {
				$next_apps = "";
			}
			$previous_apps = $next_apps;
			$next_apps = $tab_activated[$next_cpt];
			saveVariable("SLAMAPPSNEXT_".$num, $next_apps);
			saveVariable("SLAMAPPS_".$num,$activated_apps);
			
			// TIMER
			$actual_timer = loadVariable("SLAMTIMER_".$num);
			$coef = loadVariable("SLAMTIMERCOEF_".$num);
			if ($actual_timer > 0) {
				$actual_timer -= 1;
				saveVariable("SLAMTIMER_".$num,$actual_timer);
				if ($actual_timer == 0) {
					$status = 12;
					$url_api = "http://".$server."/api/leds?set=strobe&color=".$timer_color."&bright=100&speed=150&iteration=5";
					$result_api = httpQuery($url_api, 'GET');
				} else {
					$url_api = "http://".$server."/api/leds?set=on&color=".$timer_color."&bright=20";
					$result_api = httpQuery($url_api, 'GET');
					$led_timer = 12 - round($actual_timer / $coef,0);
					if ($led_timer > 11) {
							$led_timer = 11;
						}
					for ($i=1;$i <= $led_timer;$i++) {
						$ledoff = $i + 1;
						$url_api = "http://".$server."/api/leds?set=off&led=".$ledoff;
						$result_api = httpQuery($url_api, 'GET');
					}
				}
				$xml .= "<TIMER>".$actual_timer."mn (".$coef.") led off ".$led_timer."</TIMER>";
			} 
			
			$xml .= "<NEXT>".$next_apps." (".$previous_apps.")</NEXT>";
			$xml .= "<STATUS>".$status."</STATUS>";
			$xml .= "<SERVER>".$server."</SERVER>";
			$xml .= "<VERSION>".$version."</VERSION>";
			$xml .= "<DEFAULT>Speed ".$default_speed." bright ".$default_bright." delay ".$default_delay."</DEFAULT>";
			$xml .= "<ACTION>".$action."</ACTION>";
		}
	}
	$xml .= "</LIGHTALARM>";
	sdk_header('text/xml');
	echo $xml;                      
?>
