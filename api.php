<?php
     //header('Access-Control-Allow-Origin: *')

    $postdata = file_get_contents("php://input");
	if (isset($postdata)) {
		$request = json_decode($postdata);


		//******************DATA BASE SETTINGS************************//
		$db_host='localhost';
		$db_user='root';
        $db_pass='';
		$db_name='spot';

		//***********************************************************//


		$operation = $request->operation;



		//opérations d'insertion

		if($operation=='insert'){
		$table = $request->table;

		if($table=='client'){
		$prenom = $request->prenom;
		$nom_famille = $request->nom_famille;
		$email = $request->email;
		$tel = $request->tel;
		$date_naissance = $request->date_naissance;
		$adresse = $request->adresse;
		$password = $request->password;
		$link = mysqli_connect("$db_host","$db_user","$db_pass","$db_name");
		mysqli_set_charset($link, "utf8");
        mysqli_query($link,"INSERT INTO client VALUES('','$prenom','$nom_famille','$email','$tel','$date_naissance','$adresse','','$password',0,0,'','profile_m_default','profile_couverture_dafault')")
        or die(mysqli_error($link));
		echo "done";
		}

		if($table=='request'){
		$email = $request->email;
		$tel = $request->tel;
        $link = mysqli_connect("$db_host","$db_user","$db_pass","$db_name");
		mysqli_set_charset($link, "utf8");
        mysqli_query($link,"INSERT INTO demandes_req VALUES('','$email','$tel')")
        or die(mysqli_error($link));
		echo "done";
		}

		if($table=='news'){
		$client_id = $request->client_id;
		$news_text = $request->news_text;
		$date_n = $request->date_n;
		$media = $request->media;
		$link = mysqli_connect("$db_host","$db_user","$db_pass","$db_name");
		mysqli_set_charset($link, "utf8");
        mysqli_query($link,"INSERT INTO publication VALUES('','$client_id','$news_text','$date_n','0','0','$media')")
        or die(mysqli_error($link));
		echo "done";
	    }


		if($table=='event'){
		$id = $request->id;
		$client_id = $request->client_id;
		$titre = $request->titre;
		$type =  $request->type;
		$autre = $request->autre;
		$description = $request->description;
		$prepaye = $request->prepaye;
		$date = $request->cdate;
		$lat = $request->lat;
		$lng = $request->lng;
		$montant = $request->montant;
		$methode = $request->methode;
		$email = $request->email;
		$page_url = $request->page_url;
		$link = mysqli_connect("$db_host","$db_user","$db_pass","$db_name");
		 mysqli_set_charset($link, "utf8");
			mysqli_query($link,"INSERT INTO evenement VALUES('$id','$client_id','$titre','$type','$autre','$description','$prepaye','$date','$lat','$lng','1','1')")
			or die(mysqli_error($link));
		if($montant==""){

		}
		else{
			mysqli_query($link,"INSERT INTO payement VALUES('','$id','$montant','$methode','$email','$page_url')")
			or die(mysqli_error($link));
		}

		mysqli_query($link,"INSERT INTO abonnement VALUES('','$client_id','$id','$titre','$type','$date','1')")
			or die(mysqli_error($link));

		echo "done";
	    }



		if($table=='notification'){
		$titre = $request->titre;
		$type = $request->type;
		$text = $request->text;
		$target_client = $request->target_client;
		$target_publication = $request->target_publication;
		$source_client_id = $request->source_client_id;
		$source_client_name = $request->source_client_name;
		$source_client_photo = $request->source_client_photo;
		$daten = $request->daten;
        $link = mysqli_connect("$db_host","$db_user","$db_pass","$db_name");
		mysqli_set_charset($link, "utf8");
        mysqli_query($link,"INSERT INTO notification VALUES('','$titre','$type','$text','$target_client','$target_publication','$source_client_id','$source_client_name','$source_client_photo','$daten','0')")
        or die(mysqli_error($link));
		echo "done";
		}



		if($table=='abonnement_add'){

		$client_id = $request->client_id;
		$event_id = $request->event_id;
    $createur_id = $request->createur_id;
		$date_time = $request->date_time;
    $statut = $request->statut;


        $link = mysqli_connect("$db_host","$db_user","$db_pass","$db_name");
		mysqli_set_charset($link, "utf8");
        mysqli_query($link,"INSERT INTO abonnement VALUES('','$client_id','$event_id','$createur_id','$date_time','$statut')")
        or die(mysqli_error($link));
		echo "done";
		}


    if($table=='newmsg'){
		$client_id = $request->client_id;
		$ami_id = $request->ami_id;
		$msg = $request->msg;
    $date_time = $request->date;

        $link = mysqli_connect("$db_host","$db_user","$db_pass","$db_name");
		mysqli_set_charset($link, "utf8");
        mysqli_query($link,"INSERT INTO message VALUES('','$client_id','$ami_id','$msg','$date_time','0')")
        or die(mysqli_error($link));
		echo "done";
		}


    if($table=='relation_add'){
		$client_id = $request->client_id;
		$ami_id = $request->ami_id;
    $date_time = $request->date;

        $link = mysqli_connect("$db_host","$db_user","$db_pass","$db_name");
		mysqli_set_charset($link, "utf8");
        mysqli_query($link,"INSERT INTO relation VALUES('','$client_id','$ami_id','$date_time')")
        or die(mysqli_error($link));
		echo "done";
		}


    if($table=='avi_new'){
		$id_client = $request->client_id;
		$id_lieu = $request->lieu_id;
    $date = $request->date;
    $note = $request->note;
    $comment = $request->comm;

        $link = mysqli_connect("$db_host","$db_user","$db_pass","$db_name");
		mysqli_set_charset($link, "utf8");
        mysqli_query($link,"INSERT INTO avi VALUES('','$id_client','$id_lieu','$note','$comment','$date')")
        or die(mysqli_error($link));
		echo "done";
		}




    if($table=='notif_inv'){
    $type = $request->type;
    $texte = $request->texte;
    $target_client = $request->target_client;
    $target = $request->target;
    $source_client = $request->source_client;
    $date = $request->date;
    $vu = $request->vu;

        $link = mysqli_connect("$db_host","$db_user","$db_pass","$db_name");
    mysqli_set_charset($link, "utf8");
        mysqli_query($link,"INSERT INTO notifications VALUES('','$type','$texte','$target_client','$target','$source_client','$date','$vu')")
        or die(mysqli_error($link));
    echo "done";
    }




    if($table=='transaction_add'){
    $client_id = $request->client_id;
    $subs_id = $request->subs_id;
    $event_id = $request->event_id;
    $date = $request->date;
        $link = mysqli_connect("$db_host","$db_user","$db_pass","$db_name");
    mysqli_set_charset($link, "utf8");
        mysqli_query($link,"INSERT INTO transaction VALUES('','$event_id','$client_id','$subs_id','$date','0')")
        or die(mysqli_error($link));
    echo "done";
    }




    if($table=='transportation_add'){
    $client_id = $request->client_id;
    $offre_id = $request->offre_id;
    $date = $request->date;
        $link = mysqli_connect("$db_host","$db_user","$db_pass","$db_name");
    mysqli_set_charset($link, "utf8");
        mysqli_query($link,"INSERT INTO transport_abonnement VALUES('','$offre_id','$client_id','$date','1')")
        or die(mysqli_error($link));
    echo "done";
    }




    if($table=='historique_login'){
    $client_id = $request->client_id;
    $device = $request->device;
    $ip = $request->ip;
    $date = $request->date;
    $status = $request->status;
        $link = mysqli_connect("$db_host","$db_user","$db_pass","$db_name");
    mysqli_set_charset($link, "utf8");
        mysqli_query($link,"INSERT INTO historique_login VALUES('','$client_id','$device','$ip','$date','$status')")
        or die(mysqli_error($link));
    echo "done";
    }



	    }




		//opérations select

		if($operation=='select'){
		$table = $request->table;



		if($table=='client_verify'){
		$login = $request->login;
		$password = $request->password;
		$mysqli = new mysqli("$db_host","$db_user","$db_pass","$db_name");
		mysqli_set_charset($mysqli, "utf8");
        if($result = $mysqli->query("SELECT * FROM client WHERE email='$login' AND mot_de_passe='$password'")){
			$re = $result->fetch_all( MYSQLI_ASSOC );
			$result->close();
			echo json_encode($re);
			}
		}

		if($table=='evenement'){
		$mysqli = new mysqli("$db_host","$db_user","$db_pass","$db_name");
		mysqli_set_charset($mysqli, "utf8");
        if($result = $mysqli->query("SELECT * FROM evenement")){
			$re = $result->fetch_all( MYSQLI_ASSOC );
			$result->close();
			echo json_encode($re);
			}
		}
		if($table=='evenement_s'){
			$keyword = $request->keyword;
		$mysqli = new mysqli("$db_host","$db_user","$db_pass","$db_name");
		mysqli_set_charset($mysqli, "utf8");
        if($result = $mysqli->query("SELECT * FROM evenement WHERE titre LIKE '%$keyword%' OR type LIKE '%$keyword%' OR description LIKE '%$keyword%'")){
			$re = $result->fetch_all( MYSQLI_ASSOC );
			$result->close();
			echo json_encode($re);
			}
		}

		if($table=='publication'){
		$mysqli = new mysqli("$db_host","$db_user","$db_pass","$db_name");
		mysqli_set_charset($mysqli, "utf8");
        if($result = $mysqli->query("SELECT p.id,p.id_client,p.text,p.date,p.nb_likes,p.nb_comm,p.media,c.prenom,c.nom_famille,c.profilephoto FROM publication p JOIN client c ON p.id_client=c.id")){
			$re = $result->fetch_all( MYSQLI_ASSOC );
			$result->close();
			echo json_encode($re);
			}
		}

		if($table=='client_publication'){
	    $id = $request->id;
		$mysqli = new mysqli("$db_host","$db_user","$db_pass","$db_name");
		mysqli_set_charset($mysqli, "utf8");
      //  if($result = $mysqli->query("SELECT * FROM publication WHERE id_client='$id'")){
      if($result = $mysqli->query("SELECT p.id,p.id_client,p.text,p.date,p.nb_likes,p.nb_comm,p.media,c.prenom,c.nom_famille,c.profilephoto FROM publication p JOIN client c ON p.id_client=c.id WHERE id_client='$id'")){
			$re = $result->fetch_all( MYSQLI_ASSOC );
			$result->close();
			echo json_encode($re);
			}
		}




		if($table=='get_clients'){
		$mysqli = new mysqli("$db_host","$db_user","$db_pass","$db_name");
		mysqli_set_charset($mysqli, "utf8");
        if($result = $mysqli->query("SELECT * FROM client")){
			$re = $result->fetch_all( MYSQLI_ASSOC );
			$result->close();
			echo json_encode($re);
			}
		}
		if($table=='clients_s'){
			$keyword = $request->keyword;
		$mysqli = new mysqli("$db_host","$db_user","$db_pass","$db_name");
		mysqli_set_charset($mysqli, "utf8");
        if($result = $mysqli->query("SELECT * FROM client WHERE prenom LIKE '%$keyword%' OR nom_famille LIKE '%$keyword%' OR adresse LIKE '%$keyword%'")){
			$re = $result->fetch_all( MYSQLI_ASSOC );
			$result->close();
			echo json_encode($re);
			}
		}


		if($table=='places'){
		$mysqli = new mysqli("$db_host","$db_user","$db_pass","$db_name");
		mysqli_set_charset($mysqli, "utf8");
        if($result = $mysqli->query("SELECT * FROM lieu")){
			$re = $result->fetch_all( MYSQLI_ASSOC );
			$result->close();
			echo json_encode($re);
			}
		}



		if($table=='transport'){
		$mysqli = new mysqli("$db_host","$db_user","$db_pass","$db_name");
		mysqli_set_charset($mysqli, "utf8");
    if($result = $mysqli->query("SELECT t.id,t.client_id,t.date,t.id_begin_pos,t.id_end_pos,t.destination,t.distance,t.tarif,t.transport_type,t.expiration_date,t.nb_max_inscri,t.nb_inscri,t.statut,c.prenom as client_prenom,c.nom_famille as client_nom_famille,c.profilephoto as client_photo, p_begin.lat as p_begin_lat, p_begin.lng as p_begin_lng, p_end.lat as p_end_lat, p_end.lng as p_end_lng FROM transport t JOIN client c ON t.client_id=c.id JOIN positions p_begin ON t.id_begin_pos=p_begin.id JOIN positions p_end ON t.id_end_pos=p_end.id")){
        //if($result = $mysqli->query("SELECT t.id,t.client_id,t.date,t.id_begin_pos,t.id_end_pos,t.distance,t.tarif,t.transport_type,t.expiration_date,t.nb_max_inscri,t.nb_inscri,t.statut,c.prenom as client_prenom,c.nom_famille as client_nom_famille,c.profilephoto as client_photo,  p.lat, p.lng FROM transport t JOIN client c ON t.client_id=c.id JOIN positions p ON t.id_begin_pos=p.id")){
			$re = $result->fetch_all( MYSQLI_ASSOC );
			$result->close();
			echo json_encode($re);
			}
		}


    if($table=='transport_region'){
      $region = $request->region;
		$mysqli = new mysqli("$db_host","$db_user","$db_pass","$db_name");
		mysqli_set_charset($mysqli, "utf8");
    if($result = $mysqli->query("SELECT t.id,t.client_id,t.date,t.id_begin_pos,t.id_end_pos,t.destination,t.distance,t.tarif,t.transport_type,t.expiration_date,t.nb_max_inscri,t.nb_inscri,t.statut,c.prenom as client_prenom,c.nom_famille as client_nom_famille,c.profilephoto as client_photo, p_begin.lat as p_begin_lat, p_begin.lng as p_begin_lng, p_end.lat as p_end_lat, p_end.lng as p_end_lng FROM transport t JOIN client c ON t.client_id=c.id JOIN positions p_begin ON t.id_begin_pos=p_begin.id JOIN positions p_end ON t.id_end_pos=p_end.id WHERE t.destination='$region'")){
      $re = $result->fetch_all( MYSQLI_ASSOC );
			$result->close();
			echo json_encode($re);
			}
		}

		if($table=='positions'){
		$mysqli = new mysqli("$db_host","$db_user","$db_pass","$db_name");
		mysqli_set_charset($mysqli, "utf8");
        if($result = $mysqli->query("SELECT * FROM positions")){
			$re = $result->fetch_all( MYSQLI_ASSOC );
			$result->close();
			echo json_encode($re);
			}
		}


		if($table=='payement_s'){
			$id_event = $request->id_event;
		$mysqli = new mysqli("$db_host","$db_user","$db_pass","$db_name");
		mysqli_set_charset($mysqli, "utf8");
        if($result = $mysqli->query("SELECT * FROM payement WHERE event_id='$id_event'")){
			$re = $result->fetch_all( MYSQLI_ASSOC );
			$result->close();
			echo json_encode($re);
			}
		}



		if($table=='abonnement_s'){
			$client_id = $request->client_id;
		$mysqli = new mysqli("$db_host","$db_user","$db_pass","$db_name");
		mysqli_set_charset($mysqli, "utf8");
        if($result = $mysqli->query("SELECT a.id, a.client_id, a.event_id, a.date, a.status, c.prenom, c.nom_famille,c.profilephoto, e.titre, e.type, e.prepaye,e.id_client as cl_id FROM abonnement a JOIN client c ON c.id=a.createur_id JOIN evenement e ON a.event_id=e.id  WHERE a.client_id='$client_id'")){
			$re = $result->fetch_all( MYSQLI_ASSOC );
			$result->close();
			echo json_encode($re);
			}
		}




		if($table=='count_abonnement'){

		$client_id = $request->client_id;
		$event_id = $request->event_id;

		$mysqli = new mysqli("$db_host","$db_user","$db_pass","$db_name");
		mysqli_set_charset($mysqli, "utf8");
        if($result = $mysqli->query("SELECT * FROM abonnement WHERE client_id='$client_id' AND event_id='$event_id'")){
			$rowcount=mysqli_num_rows($result);
			$result->close();
			echo json_encode($rowcount);
			}
		}




    if($table=='messages_c'){

		$client_id = $request->client_id;

		$mysqli = new mysqli("$db_host","$db_user","$db_pass","$db_name");
		mysqli_set_charset($mysqli, "utf8");
        if($result = $mysqli->query("SELECT m.id,m.emetteur,m.recepteur,m.texte,m.date,m.vu,c.id as c_id,c.prenom,c.nom_famille,c.profilephoto,c.region,c.statut FROM message m INNER JOIN client c ON c.id=m.emetteur OR c.id=m.recepteur WHERE ((m.emetteur='$client_id' OR m.recepteur='$client_id') AND (c.id!='$client_id'))"))
        {
          $re = $result->fetch_all( MYSQLI_ASSOC );
    			$result->close();
    			echo json_encode($re);
			}
		}


    if($table=='notifs'){

    $client_id = $request->client_id;

    $mysqli = new mysqli("$db_host","$db_user","$db_pass","$db_name");
    mysqli_set_charset($mysqli, "utf8");
        if($result = $mysqli->query("SELECT n.id,n.type,n.texte,n.target_client,n.target,n.source_client,n.date,n.vu,c.prenom,c.nom_famille,c.profilephoto FROM notifications n JOIN client c ON n.source_client=c.id WHERE target_client= '$client_id'")){
      //$rowcount=mysqli_num_rows($result);
      $re = $result->fetch_all( MYSQLI_ASSOC );
      $result->close();
      echo json_encode($re);
      }
    }



    if($table=='freinds_all'){

    $client_id = $request->client_id;

    $mysqli = new mysqli("$db_host","$db_user","$db_pass","$db_name");
    mysqli_set_charset($mysqli, "utf8");
        if($result = $mysqli->query("(SELECT c.id,c.prenom,c.nom_famille,c.email,c.tel,.c.date_naissance,c.adresse,c.sexe,c.mot_de_passe,c.nb_amis,c.nb_evenement,c.region,c.profilephoto,c.statut FROM relation r JOIN client c ON r.idc1=c.id  WHERE (r.idc1!='$client_id' AND r.idc2='$client_id'))UNION (SELECT c.id,c.prenom,c.nom_famille,c.email,c.tel,.c.date_naissance,c.adresse,c.sexe,c.mot_de_passe,c.nb_amis,c.nb_evenement,c.region,c.profilephoto,c.statut FROM relation r JOIN client c ON r.idc2=c.id  WHERE (r.idc2!='$client_id' AND r.idc1='$client_id'))")){
      //$rowcount=mysqli_num_rows($result);
      $re = $result->fetch_all( MYSQLI_ASSOC );
      $result->close();
      echo json_encode($re);
      }
    }



    if($table=='chat_conv_all'){

    $client_id = $request->client_id;
    $ami_id = $request->ami_id;

    $mysqli = new mysqli("$db_host","$db_user","$db_pass","$db_name");
    mysqli_set_charset($mysqli, "utf8");
        if($result = $mysqli->query("SELECT m.id,m.emetteur,m.recepteur,m.texte,m.date,m.vu,c.id as c_id,c.prenom,c.nom_famille,c.profilephoto,c.region,c.statut FROM message m INNER JOIN client c ON c.id=m.emetteur OR c.id=m.recepteur WHERE ((m.emetteur= '$client_id' OR m.recepteur= '$client_id') AND (c.id='$ami_id'))")){
      //$rowcount=mysqli_num_rows($result);
      $re = $result->fetch_all( MYSQLI_ASSOC );
      $result->close();
      echo json_encode($re);
      }
    }


    if($table=='nb_trans_ab'){

    $client_id = $request->client_id;
    $offre_id = $request->offre_id;

    $mysqli = new mysqli("$db_host","$db_user","$db_pass","$db_name");
    mysqli_set_charset($mysqli, "utf8");
        if($result = $mysqli->query("SELECT * FROM transport_abonnement WHERE id_offre='$offre_id' AND id_client= '$client_id'")){
      $rowcount=mysqli_num_rows($result);
      //$re = $result->fetch_all( MYSQLI_ASSOC );
      $result->close();
      echo json_encode($rowcount);
      }
    }



    if($table=='show_profile_infos'){

    $client_id = $request->client_id;
    $ami_id = $request->ami_id;

    $mysqli = new mysqli("$db_host","$db_user","$db_pass","$db_name");
    mysqli_set_charset($mysqli, "utf8");
            if($result = $mysqli->query("SELECT * FROM client WHERE id='$ami_id'")){
      //$rowcount=mysqli_num_rows($result);
      $re = $result->fetch_all( MYSQLI_ASSOC );
      $result->close();
      echo json_encode($re);
      }
    }



    if($table=='relation_s'){
    $client_id = $request->client_id;
    $mysqli = new mysqli("$db_host","$db_user","$db_pass","$db_name");
    mysqli_set_charset($mysqli, "utf8");
          if($result = $mysqli->query("(SELECT c.id FROM relation r JOIN client c ON r.idc1=c.id  WHERE (r.idc1!='$client_id' AND r.idc2='$client_id'))UNION (SELECT c.id FROM relation r JOIN client c ON r.idc2=c.id  WHERE (r.idc2!='$client_id' AND r.idc1='$client_id'))")){
      $re = $result->fetch_all( MYSQLI_ASSOC );
      $result->close();
      echo json_encode($re);
      }
    }



    if($table=='reviews_all'){
    $lieu_id = $request->lieu_id;
    $mysqli = new mysqli("$db_host","$db_user","$db_pass","$db_name");
    mysqli_set_charset($mysqli, "utf8");
          if($result = $mysqli->query("SELECT a.id,a.id_client,a.id_lieu,a.note,a.commentaire,a.date,c.prenom,c.nom_famille,c.Profilephoto  FROM avi a JOIN client c ON a.id_client=c.id WHERE id_lieu='$lieu_id'")){
      $re = $result->fetch_all( MYSQLI_ASSOC );
      $result->close();
      echo json_encode($re);
      }
    }



    if($table=='notifs_inv'){
    $client_id = $request->client_id;
    $event_id = $request->ev_id;
    $text = $request->text;
    $mysqli = new mysqli("$db_host","$db_user","$db_pass","$db_name");
    mysqli_set_charset($mysqli, "utf8");
          if($result = $mysqli->query("SELECT c.id FROM notifications n JOIN client c ON n.target_client=c.id  WHERE ((n.source_client='$client_id')AND(n.target='$event_id')AND(n.texte LIKE '%$text%'))")){
      $re = $result->fetch_all( MYSQLI_ASSOC );
      $result->close();
      echo json_encode($re);
      }
    }


    if($table=='transaction_s'){
    $client_id = $request->client_id;
    $mysqli = new mysqli("$db_host","$db_user","$db_pass","$db_name");
    mysqli_set_charset($mysqli, "utf8");
          if($result = $mysqli->query("SELECT t.id, t.event_id, t.abonneur, t.date, t.statut,t.subs_id, e.titre, e.type, c.prenom, c.nom_famille, c.email, c.profilephoto, p.montant, p.methode  FROM transaction t JOIN client c ON c.id=t.abonneur JOIN evenement e ON t.event_id=e.id JOIN payement p ON p.event_id=e.id  WHERE e.id_client='$client_id' AND t.abonneur!='$client_id'")){
      $re = $result->fetch_all( MYSQLI_ASSOC );
      $result->close();
      echo json_encode($re);
      }
    }


    if($table=='historys'){
    $cl_id = $request->cl_id;
    $mysqli = new mysqli("$db_host","$db_user","$db_pass","$db_name");
    mysqli_set_charset($mysqli, "utf8");
          if($result = $mysqli->query("SELECT id,device,ip,date,statut FROM historique_login WHERE client_id='$cl_id'")){
      $re = $result->fetch_all( MYSQLI_ASSOC );
      $result->close();
      echo json_encode($re);
      }
    }



}








		//opérations update

		if($operation=='update'){
		$table = $request->table;

		if($table=='client_photo'){

		$client_id = $request->client_id;
		$photourl = $request->photourl;
		$link = mysqli_connect("$db_host","$db_user","$db_pass","$db_name");
		mysqli_set_charset($link, "utf8");
        mysqli_query($link,"UPDATE client SET profilephoto='$photourl' WHERE id ='$client_id'")
        or die(mysqli_error($link));
		mysqli_query($link,"UPDATE publication SET client_photo='$photourl' WHERE id_client ='$client_id'")
        or die(mysqli_error($link));
		echo "done";
		}

		if($table=='client_cover'){

		$client_id = $request->client_id;
		$photourl = $request->photourl;
		$link = mysqli_connect("$db_host","$db_user","$db_pass","$db_name");
		mysqli_set_charset($link, "utf8");
        mysqli_query($link,"UPDATE client SET profilecover='$photourl' WHERE id ='$client_id'")
        or die(mysqli_error($link));
		echo "done";
		}


		if($table=='client'){

		$client_id = $request->client_id;
		$email = $request->email;
		$tel = $request->tel;
		$date_naissance = $request->date_naissance;
		$adresse = $request->adresse;
		$sexe = $request->sexe;
		$link = mysqli_connect("$db_host","$db_user","$db_pass","$db_name");
		mysqli_set_charset($link, "utf8");
        mysqli_query($link,"UPDATE client SET email='$email', tel='$tel', date_naissance='$date_naissance', adresse='$adresse', sexe='$sexe' WHERE id ='$client_id'")
        or die(mysqli_error($link));
		echo "done";
		}



		if($table=='client_mdp'){

		$client_id = $request->client_id;
		$password = $request->password;
		$link = mysqli_connect("$db_host","$db_user","$db_pass","$db_name");
		mysqli_set_charset($link, "utf8");
        mysqli_query($link,"UPDATE client SET mot_de_passe='$password' WHERE id ='$client_id'")
        or die(mysqli_error($link));
		echo "done";
	    }



      if($table=='event_up_s'){
  		$ev_id = $request->ev_id;
  		$ev_titre = $request->ev_titre;
      $ev_type = $request->ev_type;
      $ev_autre = $request->ev_autre;
      $ev_desc = $request->ev_desc;
      $ev_prepaye = $request->ev_prepaye;

  		$link = mysqli_connect("$db_host","$db_user","$db_pass","$db_name");
  		mysqli_set_charset($link, "utf8");
          mysqli_query($link,"UPDATE evenement SET titre='$ev_titre', type='$ev_type', autre='$ev_autre', description='$ev_desc', prepaye='$ev_prepaye' WHERE id ='$ev_id'")
          or die(mysqli_error($link));
  		echo "done";
  	    }



        if($table=='transaction'){
    		$trans_id = $request->trans_id;
        $stat = $request->stat;
    		$link = mysqli_connect("$db_host","$db_user","$db_pass","$db_name");
    		mysqli_set_charset($link, "utf8");
            mysqli_query($link,"UPDATE transaction SET statut='$stat' WHERE id='$trans_id'")
            or die(mysqli_error($link));
    		echo "done";
    	    }

          if($table=='abonnement'){
      		$subs_id = $request->subs_id;
          $stat = $request->stat;
      		$link = mysqli_connect("$db_host","$db_user","$db_pass","$db_name");
      		mysqli_set_charset($link, "utf8");
              mysqli_query($link,"UPDATE abonnement SET status='$stat' WHERE id ='$subs_id'")
              or die(mysqli_error($link));
      		echo "done";
      	    }


            if($table=='up_stat_region'){
            $client_id= $request->client_id;
            $region = $request->region;
            $status = $request->status;
            $link = mysqli_connect("$db_host","$db_user","$db_pass","$db_name");
            mysqli_set_charset($link, "utf8");
                mysqli_query($link,"UPDATE client SET region='$region', statut='$status' WHERE id ='$client_id'")
                or die(mysqli_error($link));
            echo "done";
              }





              if($table=='pub_update'){
              $pub_id= $request->pub_id;
              $link = mysqli_connect("$db_host","$db_user","$db_pass","$db_name");
              mysqli_set_charset($link, "utf8");
                  mysqli_query($link,"UPDATE publication SET nb_likes=nb_likes+1 WHERE id ='$pub_id'")
                  or die(mysqli_error($link));
              echo "done";
                }


		}

















		//opérations delete

		if($operation=='delete'){
		$table = $request->table;


		if($table=='abonnement'){

		$client_id = $request->client_id;
		$event_id = $request->event_id;
		$link = mysqli_connect("$db_host","$db_user","$db_pass","$db_name");
		mysqli_set_charset($link, "utf8");
        mysqli_query($link,"DELETE FROM abonnement WHERE client_id ='$client_id' AND event_id ='$event_id'")
        or die(mysqli_error($link));
		echo "done";
	    }


      if($table=='relation_del'){

      $client_id = $request->client_id;
      $freind_id = $request->freind_id;
      $link = mysqli_connect("$db_host","$db_user","$db_pass","$db_name");
      mysqli_set_charset($link, "utf8");
          mysqli_query($link,"DELETE FROM relation WHERE ((idc1='$client_id' AND idc2='$freind_id')OR(idc1='$freind_id' AND idc2='$client_id'))")
          or die(mysqli_error($link));
      echo "done";
        }


        if($table=='delete_event'){
        $event_id = $request->event_id;
        $link = mysqli_connect("$db_host","$db_user","$db_pass","$db_name");
        mysqli_set_charset($link, "utf8");
            mysqli_query($link,"DELETE FROM evenement WHERE id='$event_id'")
            or die(mysqli_error($link));
        echo "done";
          }








		}






	}
	else {
		echo "Not called properly with username parameter!";
	}
?>
