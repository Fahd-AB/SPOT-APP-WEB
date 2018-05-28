<?php
error_reporting(0);
$req="";
$req=$_GET['client_req'];
$o = json_decode($req);
$operation = $o->{'operation'};

//******************DATA BASE SETTINGS************************//
		$db_host='localhost';
		$db_user='root';
    $db_pass='';
		$db_name='spot';
		$db=mysql_connect("$db_host","$db_user","$db_pass");
            mysql_select_db("$db_name");

//***********************************************************//

if($operation=='select'){
		$table= $o->{'table'};
		if($table=='clientv'){
			$login= $o->{'email'};
			$password= $o->{'password'};

			    mysql_query('SET CHARACTER SET utf8');
				$sqldata = mysql_query("SELECT * FROM client WHERE email='$login' AND mot_de_passe='$password'");
				while($r = mysql_fetch_assoc($sqldata)) {
				  $rows[] = $r;
				}
					echo json_encode($rows);

		}

		if($table=='adminv'){
			$login= $o->{'email'};
			$password= $o->{'password'};

			    mysql_query('SET CHARACTER SET utf8');
				$sqldata = mysql_query("SELECT * FROM admin WHERE email='$login' AND mot_de_passe='$password'");
				while($r = mysql_fetch_assoc($sqldata)) {
				  $rows[] = $r;
				}
					echo json_encode($rows);

		}


		if($table=='places'){
			    mysql_query('SET CHARACTER SET utf8');
				$sqldata = mysql_query("SELECT * FROM lieu");
				while($r = mysql_fetch_assoc($sqldata)) {
				  $rows[] = $r;
				}
					echo json_encode($rows);

		}

		if($table=='msgs'){
			$id= $o->{'id'};
			    mysql_query('SET CHARACTER SET utf8');
				$sqldata = mysql_query("SELECT m.id,m.emetteur,m.recepteur,m.texte,m.date,m.vu,c.id as c_id,c.prenom,c.nom_famille,c.profilephoto,c.statut FROM message m INNER JOIN client c ON c.id=m.emetteur WHERE m.recepteur= '$id'");
				while($r = mysql_fetch_assoc($sqldata)) {
				  $rows[] = $r;
				}
					echo json_encode($rows);

		}
		if($table=='msgsad'){
			$id= $o->{'id'};
			    mysql_query('SET CHARACTER SET utf8');
				$sqldata = mysql_query("SELECT m.id,m.emetteur,m.recepteur,m.texte,m.date,m.vu,a.id as a_id,a.photo, a.statut FROM message m INNER JOIN admin a ON a.id=m.emetteur OR a.id=m.recepteur WHERE ((m.emetteur= '$id' OR m.recepteur= '$id') AND (a.id!='$id')) ");
				while($r = mysql_fetch_assoc($sqldata)) {
				  $rows[] = $r;
				}
					echo json_encode($rows);
		}

		if($table=='ADMINmsgs'){
			$id= $o->{'id'};
			    mysql_query('SET CHARACTER SET utf8');
				$sqldata = mysql_query("SELECT m.id,m.emetteur,m.recepteur,m.texte,m.date,m.vu,a.id as a_id,a.statut FROM message m INNER JOIN admin a ON a.id=m.emetteur WHERE m.recepteur= '$id'");
				while($r = mysql_fetch_assoc($sqldata)) {
				  $rows[] = $r;
				}
					echo json_encode($rows);

		}

		if($table=='msgs_all'){
			$id= $o->{'id'};
			    mysql_query('SET CHARACTER SET utf8');
				$sqldata = mysql_query("SELECT m.id,m.emetteur,m.recepteur,m.texte,m.date,m.vu,c.id as c_id,c.prenom,c.nom_famille,c.profilephoto,c.statut FROM message m INNER JOIN client c ON c.id=m.emetteur OR c.id=m.recepteur WHERE ((m.emetteur= '$id' OR m.recepteur= '$id') AND (c.id!='$id')) ");
				while($r = mysql_fetch_assoc($sqldata)) {
				  $rows[] = $r;
				}
					echo json_encode($rows);

		}

		if($table=='notifs'){
			$id_notif= $o->{'id'};
			    mysql_query('SET CHARACTER SET utf8');
				$sqldata = mysql_query("SELECT n.id,n.type,n.texte,n.target_client,n.target,n.source_client,n.date,n.vu,c.prenom,c.nom_famille,c.profilephoto FROM notifications n JOIN client c ON n.source_client=c.id WHERE target_client= '$id_notif'");
				while($r = mysql_fetch_assoc($sqldata)) {
				  $rows[] = $r;
				}
					echo json_encode($rows);

		}


		if($table=='events'){
			    mysql_query('SET CHARACTER SET utf8');
				$sqldata = mysql_query("SELECT * FROM evenement");
				while($r = mysql_fetch_assoc($sqldata)) {
				  $rows[] = $r;
				}
					echo json_encode($rows);

		}

		if($table=='totmsgs'){
			    mysql_query('SET CHARACTER SET utf8');
				$sqldata = mysql_query("SELECT * FROM message");
				while($r = mysql_fetch_assoc($sqldata)) {
				  $rows[] = $r;
				}
					echo json_encode($rows);
		}

		if($table=='message'){
			    mysql_query('SET CHARACTER SET utf8');
				$sqldata = mysql_query("SELECT * FROM message");
				while($r = mysql_fetch_assoc($sqldata)) {
				  $rows[] = $r;
				}
					echo json_encode($rows);

		}

		if($table=='client_key'){
			$keyword= $o->{'keyword'};
			    mysql_query('SET CHARACTER SET utf8');
				$sqldata = mysql_query("SELECT * FROM client WHERE prenom LIKE '%$keyword%' OR nom_famille LIKE '%$keyword%' OR adresse LIKE '%$keyword%'");
				while($r = mysql_fetch_assoc($sqldata)) {
				  $rows[] = $r;
				}
					echo json_encode($rows);

		}



		if($table=='event_key'){
			$keyword= $o->{'keyword'};
			    mysql_query('SET CHARACTER SET utf8');
				$sqldata = mysql_query("SELECT * FROM evenement WHERE titre LIKE '%$keyword%' OR type LIKE '%$keyword%' OR description LIKE '%$keyword%'");
				while($r = mysql_fetch_assoc($sqldata)) {
				  $rows[] = $r;
				}
					echo json_encode($rows);

		}

		if($table=='clients'){
			  mysql_query('SET CHARACTER SET utf8');
				$sqldata = mysql_query("SELECT id,prenom,nom_famille,email,date_naissance,sexe,region FROM client");
				while($r = mysql_fetch_assoc($sqldata)) {
				  $rows[] = $r;
				}
					echo json_encode($rows);

		}

		if($table=='historys'){
			$cl_id= $o->{'id'};
			  mysql_query('SET CHARACTER SET utf8');
				$sqldata = mysql_query("SELECT id,device,ip,date,statut FROM historique_login WHERE client_id='$cl_id'");
				while($r = mysql_fetch_assoc($sqldata)) {
				  $rows[] = $r;
				}
					echo json_encode($rows);

		}

		if($table=='history'){
			  mysql_query('SET CHARACTER SET utf8');
				$sqldata = mysql_query("SELECT id,device,ip,date,statut FROM historique_login");
				while($r = mysql_fetch_assoc($sqldata)) {
				  $rows[] = $r;
				}
					echo json_encode($rows);

		}

		if($table=='client'){
			$cl_id= $o->{'id'};
				mysql_query('SET CHARACTER SET utf8');
				$sqldata = mysql_query("SELECT * FROM client WHERE id='$cl_id'");
				while($r = mysql_fetch_assoc($sqldata)) {
					$rows[] = $r;
				}
					echo json_encode($rows);

		}

		if($table=='demandes_req'){
				mysql_query('SET CHARACTER SET utf8');
				$sqldata = mysql_query("SELECT d.id,d.email,d.tel, (SELECT COUNT(*) FROM client c WHERE d.email=c.email AND d.tel=c.tel) as verif FROM demandes_req d");
				while($r = mysql_fetch_assoc($sqldata)) {
					$rows[] = $r;
				}
					echo json_encode($rows);
		}

		if($table=='site'){
				mysql_query('SET CHARACTER SET utf8');
				$sqldata = mysql_query("SELECT * FROM site ");
				while($r = mysql_fetch_assoc($sqldata)) {
					$rows[] = $r;
				}
					echo json_encode($rows);
		}

		if($table=='abonnement_s'){
			$client_id= $o->{'client_id'};
			$event_id= $o->{'event_id'};
				mysql_query('SET CHARACTER SET utf8');
				$sqldata = mysql_query("SELECT COUNT(*) as n FROM abonnement WHERE client_id='$client_id' AND event_id='$event_id'");
				while($r = mysql_fetch_assoc($sqldata)) {
					$rows[] = $r;
				}
					echo json_encode($rows);
		}

		if($table=='abonnement_all'){
			$client_id= $o->{'id'};
				mysql_query('SET CHARACTER SET utf8');
				$sqldata = mysql_query("SELECT a.id, a.client_id, a.event_id, a.date, a.status, c.prenom, c.nom_famille, e.titre, e.type, e.prepaye,e.id_client as cl_id FROM abonnement a JOIN client c ON c.id=a.createur_id JOIN evenement e ON a.event_id=e.id  WHERE a.client_id='$client_id'");
				while($r = mysql_fetch_assoc($sqldata)) {
					$rows[] = $r;
				}
					echo json_encode($rows);
		}

		if($table=='transaction_s'){
			$client_id= $o->{'id'};
				mysql_query('SET CHARACTER SET utf8');
				$sqldata = mysql_query("SELECT t.id, t.event_id, t.abonneur, t.date, t.statut,t.subs_id, e.titre, e.type, c.prenom, c.nom_famille, c.email, p.montant, p.methode  FROM transaction t JOIN client c ON c.id=t.abonneur JOIN evenement e ON t.event_id=e.id JOIN payement p ON p.event_id=e.id  WHERE e.id_client='$client_id' AND t.abonneur!='$client_id'");
				while($r = mysql_fetch_assoc($sqldata)) {
					$rows[] = $r;
				}
					echo json_encode($rows);
		}


		if($table=='lieu_s'){
			$lieu_id= $o->{'id'};
			    mysql_query('SET CHARACTER SET utf8');
				$sqldata = mysql_query("SELECT * FROM lieu WHERE id='$lieu_id'");
				while($r = mysql_fetch_assoc($sqldata)) {
				  $rows[] = $r;
				}
					echo json_encode($rows);

		}

		if($table=='payement_s'){
			$event_id= $o->{'event_id'};
			    mysql_query('SET CHARACTER SET utf8');
				$sqldata = mysql_query("SELECT * FROM payement WHERE event_id='$event_id'");
				while($r = mysql_fetch_assoc($sqldata)) {
				  $rows[] = $r;
				}
					echo json_encode($rows);

		}

		if($table=='relation_s'){
			$client_id= $o->{'id'};
					mysql_query('SET CHARACTER SET utf8');
				$sqldata = mysql_query("(SELECT c.id FROM relation r JOIN client c ON r.idc1=c.id  WHERE (r.idc1!='$client_id' AND r.idc2='$client_id'))UNION (SELECT c.id FROM relation r JOIN client c ON r.idc2=c.id  WHERE (r.idc2!='$client_id' AND r.idc1='$client_id'))");
				while($r = mysql_fetch_assoc($sqldata)) {
					$rows[] = $r;
				}

					echo json_encode($rows);

		}

		if($table=='cl_re'){
			$req_id= $o->{'id'};
			    mysql_query('SET CHARACTER SET utf8');
				$sqldata = mysql_query("SELECT d.email, c.email as cl_email, c.prenom,c.nom_famille,c.tel,c.mot_de_passe FROM demandes_req d JOIN client c ON c.email=d.email WHERE d.id='$req_id'");
				while($r = mysql_fetch_assoc($sqldata)) {
				  $rows[] = $r;
				}
					echo json_encode($rows);

		}

		if($table=='request_em'){
			$req_id= $o->{'id'};
			    mysql_query('SET CHARACTER SET utf8');
				$sqldata = mysql_query("SELECT email FROM demandes_req WHERE id='$req_id'");
				while($r = mysql_fetch_assoc($sqldata)) {
				  $rows[] = $r;
				}
					echo json_encode($rows);

		}

		if($table=='cl_stat'){
			$cl_id= $o->{'id'};
				mysql_query('SET CHARACTER SET utf8');
				$sqldata = mysql_query("SELECT statut FROM client WHERE id='$cl_id'");
				while($r = mysql_fetch_assoc($sqldata)) {
					$rows[] = $r;
				}
					echo json_encode($rows);

		}

		if($table=='lieu_det'){
			$pl_id= $o->{'id'};
				mysql_query('SET CHARACTER SET utf8');
				$sqldata = mysql_query("SELECT * FROM lieu WHERE id='$pl_id'");
				while($r = mysql_fetch_assoc($sqldata)) {
					$rows[] = $r;
				}
					echo json_encode($rows);

		}

		if($table=='evenement_crid'){
			$ev_id= $o->{'id'};
				mysql_query('SET CHARACTER SET utf8');
				$sqldata = mysql_query("SELECT id_client FROM evenement WHERE id='$ev_id'");
				while($r = mysql_fetch_assoc($sqldata)) {
					$rows[] = $r;
				}
					echo json_encode($rows);

		}


		if($table=='relation_all_c'){
			$client_id= $o->{'id'};
					mysql_query('SET CHARACTER SET utf8');
				$sqldata = mysql_query("(SELECT c.id,c.prenom,c.nom_famille,c.email,c.tel,.c.date_naissance,c.adresse,c.sexe,c.mot_de_passe,c.nb_amis,c.nb_evenement,c.region,c.profilephoto,c.profilecover,c.statut FROM relation r JOIN client c ON r.idc1=c.id  WHERE (r.idc1!='$client_id' AND r.idc2='$client_id'))UNION (SELECT c.id,c.prenom,c.nom_famille,c.email,c.tel,.c.date_naissance,c.adresse,c.sexe,c.mot_de_passe,c.nb_amis,c.nb_evenement,c.region,c.profilephoto,c.Profilecover,c.statut FROM relation r JOIN client c ON r.idc2=c.id  WHERE (r.idc2!='$client_id' AND r.idc1='$client_id'))");
				while($r = mysql_fetch_assoc($sqldata)) {
					$rows[] = $r;
				}

					echo json_encode($rows);

		}


		if($table=='notifs_inv'){
			$client_id= $o->{'id'};
			$event_id= $o->{'ev_id'};
			$text= $o->{'text'};
					mysql_query('SET CHARACTER SET utf8');
				$sqldata = mysql_query("SELECT c.id FROM notifications n JOIN client c ON n.target_client=c.id  WHERE ((n.source_client='$client_id')AND(n.target='$event_id')AND(n.texte LIKE '%$text%'))");
				while($r = mysql_fetch_assoc($sqldata)) {
					$rows[] = $r;
				}

					echo json_encode($rows);

		}


		if($table=='places_ssp'){
			$place_id= $o->{'id'};
			    mysql_query('SET CHARACTER SET utf8');
				$sqldata = mysql_query("SELECT * FROM lieu WHERE id='$place_id'");
				while($r = mysql_fetch_assoc($sqldata)) {
				  $rows[] = $r;
				}
					echo json_encode($rows);

		}


		if($table=='ev_det'){
			$ev_id= $o->{'id'};
				mysql_query('SET CHARACTER SET utf8');
				$sqldata = mysql_query("SELECT * FROM evenement WHERE id='$ev_id'");
				while($r = mysql_fetch_assoc($sqldata)) {
					$rows[] = $r;
				}
					echo json_encode($rows);

		}


		if($table=='payement_ev_s'){
			$ev_id= $o->{'id'};
				mysql_query('SET CHARACTER SET utf8');
				$sqldata = mysql_query("SELECT * FROM payement WHERE event_id='$ev_id'");
				while($r = mysql_fetch_assoc($sqldata)) {
					$rows[] = $r;
				}
					echo json_encode($rows);

		}

		if($table=='pl_det'){
			$pl_id= $o->{'id'};
				mysql_query('SET CHARACTER SET utf8');
				$sqldata = mysql_query("SELECT * FROM lieu WHERE id='$pl_id'");
				while($r = mysql_fetch_assoc($sqldata)) {
					$rows[] = $r;
				}
					echo json_encode($rows);

		}

		if($table=='avis'){
			$pl_id= $o->{'id'};
				mysql_query('SET CHARACTER SET utf8');
				$sqldata = mysql_query("SELECT a.id,a.id_client,a.id_lieu,a.note,a.commentaire,a.date,c.prenom,c.nom_famille,c.Profilephoto  FROM avi a JOIN client c ON a.id_client=c.id WHERE id_lieu='$pl_id'");
				while($r = mysql_fetch_assoc($sqldata)) {
					$rows[] = $r;
				}
					echo json_encode($rows);

		}

		if($table=='avis_nb'){
			$id_client= $o->{'id_client'};
			$id_lieu= $o->{'id_lieu'};
				mysql_query('SET CHARACTER SET utf8');
				$sqldata = mysql_query("SELECT COUNT(*) as nb FROM avi WHERE id_client='$id_client' AND id_lieu='$id_lieu'");
				while($r = mysql_fetch_assoc($sqldata)) {
					$rows[] = $r;
				}
					echo json_encode($rows);

		}




		if($table=='msgs_all_ref'){
			$id_me= $o->{'idme'};
			$id_him= $o->{'idhim'};
			    mysql_query('SET CHARACTER SET utf8');
				$sqldata = mysql_query("SELECT m.id,m.emetteur,m.recepteur,m.texte,m.date,m.vu,c.statut FROM message m INNER JOIN client c ON c.id=m.emetteur OR c.id=m.recepteur WHERE ((m.emetteur= '$id_me' OR m.recepteur= '$id_me') AND (c.id='$id_him')) ");
				while($r = mysql_fetch_assoc($sqldata)) {
				  $rows[] = $r;
				}
					echo json_encode($rows);

		}

}










if($operation=='insert'){
		$table= $o->{'table'};
		if($table=='client'){
			$nom= $o->{'nom'};
			$prenom= $o->{'prenom'};
			$email= $o->{'email'};
			$phone= $o->{'phone'};
			$birthdate= $o->{'birthdate'};
			$adress= $o->{'adress'};
			$password= $o->{'password'};

			    mysql_query('SET CHARACTER SET utf8');
				$res = mysql_query("INSERT INTO client VALUES('','$nom','$prenom','$email','$phone','$birthdate','$adress','','$password',0,0,'','profile_m_default','profile_couverture_dafault',0)");
					echo json_encode($res);

		}

		if($table=='client_f'){
			$nom= $o->{'nom'};
			$prenom= $o->{'prenom'};
			$email= $o->{'email'};
			$phone= $o->{'phone'};
			$birthdate= $o->{'birthdate'};
			$adress= $o->{'adress'};
			$sexe= $o->{'sexe'};
			$password= $o->{'password'};
			$profilephoto="";
      if($sexe=='f'){
				$profilephoto='profile_f_default';
			}
			else{
				$profilephoto='profile_m_default';
			}
			    mysql_query('SET CHARACTER SET utf8');
				$res = mysql_query("INSERT INTO client VALUES('','$nom','$prenom','$email','$phone','$birthdate','$adress','$sexe','$password',0,0,'','$profilephoto','profile_couverture_dafault')");
					echo json_encode($res);

		}

		if($table=='evenement'){
      $id= $o->{'id'};
			$id_cl= $o->{'id_cl'};
			$titre= $o->{'titre'};
			$type= $o->{'type'};
			$autre= $o->{'autre'};
			$description= $o->{'description'};
			$prepaye= $o->{'prepaye'};
			$date= $o->{'date'};
			$lat= $o->{'lat'};
			$lng= $o->{'lng'};
			$nb_abonnees= $o->{'nb_abonnees'};
			$statut= $o->{'statut'};
			$montant= $o->{'montant'};
			$methode= $o->{'methode'};
			$email= $o->{'email'};
			$page_url= $o->{'page_url'};

			    mysql_query('SET CHARACTER SET utf8');
				$res = mysql_query("INSERT INTO evenement VALUES('$id','$id_cl','$titre','$type','$autre','$description','$prepaye','$date','$lat','$lng','1','1')");
				if($montant==""){

				}
				else{
					$res = mysql_query("INSERT INTO payement VALUES('','$id','$montant','$methode','$email','$page_url')");
				}


					echo json_encode($res);

		}




		if($table=='lieu'){
			$id_cl= $o->{'id_cl'};
			$nom= $o->{'nom'};
			$type= $o->{'type'};
			$region= $o->{'region'};
			$description= $o->{'description'};
			$photo= $o->{'photo'};
			$lat= $o->{'lat'};
			$lng= $o->{'lng'};

			    mysql_query('SET CHARACTER SET utf8');
				$res = mysql_query("INSERT INTO lieu VALUES('','$id_cl','$nom','$type','$region','$description','$photo','$lat','$lng')");
					echo json_encode($res);

		}


		if($table=='message'){

			$emetteur= $o->{'emetteur'};
			$recepteur= $o->{'recepteur'};
			$texte= $o->{'texte'};
			$date= $o->{'date'};
			$vu= $o->{'vu'};

					mysql_query('SET CHARACTER SET utf8');
				$res = mysql_query("INSERT INTO message VALUES('','$emetteur','$recepteur','$texte','$date','$vu')");
					echo json_encode($res);

		}

		if($table=='demandes_req'){

			$email= $o->{'email'};
			$phone= $o->{'phone'};

			    mysql_query('SET CHARACTER SET utf8');
				$res = mysql_query("INSERT INTO demandes_req VALUES('','$email','$phone')");
					echo json_encode($res);

		}


		if($table=='historique_login'){

			$client_id= $o->{'client'};
			$device= $o->{'device'};
			$ip= $o->{'ip'};
			$date= $o->{'date'};
			$status= $o->{'status'};


			    mysql_query('SET CHARACTER SET utf8');
				$res = mysql_query("INSERT INTO historique_login VALUES('','$client_id','$device','$ip','$date','$status')");
					echo json_encode($res);

		}


		if($table=='site'){

			$titre= $o->{'titre'};
			$description= $o->{'description'};
			$raison= $o->{'raison'};
			$date_retour= $o->{'date_retour'};

			    mysql_query('SET CHARACTER SET utf8');
				$res = mysql_query("INSERT INTO site VALUES('','$titre','$raison','$description','$date_retour')");
					echo json_encode($res);

		}


		if($table=='abonnement'){

			$client_id= $o->{'client_id'};
			$event_id= $o->{'event_id'};
			$createur_id= $o->{'createur_id'};
			$date= $o->{'date'};
			$statut= $o->{'statut'};

			    mysql_query('SET CHARACTER SET utf8');
				$res = mysql_query("INSERT INTO abonnement VALUES('','$client_id','$event_id','$createur_id','$date','$statut')");
					echo json_encode($res);

		}

		if($table=='transaction'){

			$client_id= $o->{'client_id'};
			$subs_id= $o->{'subs_id'};
			$event_id= $o->{'event_id'};
			$date= $o->{'date'};


			    mysql_query('SET CHARACTER SET utf8');
				$res = mysql_query("INSERT INTO transaction VALUES('','$event_id','$client_id','$subs_id','$date','0')");
					echo json_encode($res);

		}


		if($table=='relation_add'){

			$idcl1= $o->{'idcl1'};
			$idcl2= $o->{'idcl2'};
			$date= $o->{'date'};


			    mysql_query('SET CHARACTER SET utf8');
				$res = mysql_query("INSERT INTO relation VALUES('','$idcl1','$idcl2','$date')");
					echo json_encode($res);

		}



		if($table=='notif_inv'){
			$type= $o->{'type'};
			$texte= $o->{'texte'};
			$target_client= $o->{'target_client'};
			$target= $o->{'target'};
			$source_client= $o->{'source_client'};
			$date= $o->{'date'};
			$vu= $o->{'vu'};
			    mysql_query('SET CHARACTER SET utf8');
				$res = mysql_query("INSERT INTO notifications VALUES('','$type','$texte','$target_client','$target','$source_client','$date','$vu')");
					echo json_encode($res);
		}

		if($table=='ev_new_pay'){
			$ev_id= $o->{'id'};
			$ev_montant= $o->{'montant'};
			$ev_methode= $o->{'methode'};
			$ev_email= $o->{'email'};
			$ev_url= $o->{'url'};
					mysql_query('SET CHARACTER SET utf8');
				$res = mysql_query("INSERT INTO payement VALUES('','$ev_id','$ev_montant','$ev_methode','$ev_email','$ev_url')");
					echo json_encode($res);
		}


		if($table=='avi_new'){
			$id_client= $o->{'id_client'};
			$id_lieu= $o->{'id_lieu'};
			$note= $o->{'note'};
			$comment= $o->{'comment'};
			$date= $o->{'date'};
					mysql_query('SET CHARACTER SET utf8');
				$res = mysql_query("INSERT INTO avi VALUES('','$id_client','$id_lieu','$note','$comment','$date')");
					echo json_encode($res);
		}




}








if($operation=='update'){
	$table= $o->{'table'};
	if($table=='client'){
		$client_id= $o->{'id'};
		$email= $o->{'email'};
		$tel= $o->{'tel'};
		$birthday= $o->{'birthday'};
		$adresse= $o->{'adresse'};
		$sexe= $o->{'sexe'};

				mysql_query('SET CHARACTER SET utf8');
			$res = mysql_query("UPDATE client SET email='$email', tel='$tel', date_naissance='$birthday', adresse='$adresse', sexe='$sexe' WHERE id ='$client_id'");
				echo json_encode($res);
	}

	if($table=='clientmdp'){
		$client_id= $o->{'id'};
		$password= $o->{'password'};

				mysql_query('SET CHARACTER SET utf8');
			$res = mysql_query("UPDATE client SET mot_de_passe='$password' WHERE id ='$client_id'");
				echo json_encode($res);
	}

	if($table=='client_admin_up'){

		$id_c= $o->{'id'};
		$nom_c= $o->{'nom'};
		$prenom_c= $o->{'prenom'};
		$email_c= $o->{'email'};
		$phone_c= $o->{'phone'};
		$birthdate_c= $o->{'birthdate'};
		$adress_c= $o->{'adress'};
		$sexe_c= $o->{'sexe'};

				mysql_query('SET CHARACTER SET utf8');
			$res = mysql_query("UPDATE client SET prenom='$nom_c', nom_famille='$prenom_c', email='$email_c', tel='$phone_c', date_naissance='$birthdate_c', adresse='$adress_c', sexe='$sexe_c' WHERE id ='$id_c'");
				echo json_encode($res);
	}


	if($table=='admin'){
		$admin_id= $o->{'id'};
		$prenom= $o->{'prenom'};
		$nom_famille= $o->{'nom_famille'};
		$email= $o->{'email'};
		$password= $o->{'password'};
				mysql_query('SET CHARACTER SET utf8');
			$res = mysql_query("UPDATE admin SET prenom='$prenom', nom_famille='$nom_famille', email='$email', mot_de_passe='$password' WHERE id ='$admin_id'");
				echo json_encode($res);
	}


	if($table=='admin_online'){
		$admin_id= $o->{'id'};
				mysql_query('SET CHARACTER SET utf8');
			$res = mysql_query("UPDATE admin SET statut='1' WHERE id ='$admin_id'");
				echo json_encode($res);
	}
	if($table=='client_online'){
		$client_id= $o->{'id'};
		$region= $o->{'region'};
				mysql_query('SET CHARACTER SET utf8');
			$res = mysql_query("UPDATE client SET statut='1', region='$region' WHERE id ='$client_id'");
				echo json_encode($res);
	}
	if($table=='admin_offline'){
		$admin_id= $o->{'id'};
				mysql_query('SET CHARACTER SET utf8');
			$res = mysql_query("UPDATE admin SET statut='0' WHERE id ='$admin_id'");
				echo json_encode($res);
	}
	if($table=='client_offline'){
		$client_id= $o->{'id'};
				mysql_query('SET CHARACTER SET utf8');
			$res = mysql_query("UPDATE client SET statut='0' WHERE id ='$client_id'");
				echo json_encode($res);
	}

	if($table=='transaction'){
		$client_id= $o->{'client_id'};
		$trans_id= $o->{'trans_id'};
		$stat=$o->{'stat'};
		  mysql_query('SET CHARACTER SET utf8');
			$res = mysql_query("UPDATE transaction SET statut='$stat' WHERE id='$trans_id'");
			echo json_encode($res);
	}

	if($table=='abonnement'){
		$client_id= $o->{'client_id'};
		$subs_id= $o->{'subs_id'};
		$stat=$o->{'stat'};
				mysql_query('SET CHARACTER SET utf8');
			$res = mysql_query("UPDATE abonnement SET status='$stat' WHERE id ='$subs_id'");
				echo json_encode($res);
	}

	if($table=='evenement_nb_ab'){
		$event_id= $o->{'event_id'};
				mysql_query('SET CHARACTER SET utf8');
			$res = mysql_query("UPDATE evenement SET nb_abonnees=nb_abonnees + 1 WHERE id ='$event_id'");
				echo json_encode($res);
	}

	if($table=='evenement_nb_ab_dec'){
		$event_id= $o->{'event_id'};
				mysql_query('SET CHARACTER SET utf8');
			$res = mysql_query("UPDATE evenement SET nb_abonnees=nb_abonnees - 1 WHERE id ='$event_id'");
				echo json_encode($res);
	}


	if($table=='lieu_s'){
		$lieu_id= $o->{'id'};
		$lieu_nom= $o->{'nom'};
		$lieu_type= $o->{'type'};
		$lieu_region= $o->{'region'};
		$lieu_desc= $o->{'description'};
		$lieu_photo= $o->{'photo'};
				mysql_query('SET CHARACTER SET utf8');
			$res = mysql_query("UPDATE lieu SET nom='$lieu_nom', type='$lieu_type', region='$lieu_region', description='$lieu_desc', photo='$lieu_photo' WHERE id ='$lieu_id'");
				echo json_encode($res);
	}

	if($table=='ev_s'){
		$ev_id= $o->{'id'};
		$ev_titre= $o->{'titre'};
		$ev_type= $o->{'type'};
		$ev_autre= $o->{'autre'};
		$ev_desc= $o->{'description'};
		$ev_prepaye= $o->{'prepaye'};
				mysql_query('SET CHARACTER SET utf8');
			$res = mysql_query("UPDATE evenement SET titre='$ev_titre', type='$ev_type', autre='$ev_autre', description='$ev_desc', prepaye='$ev_prepaye' WHERE id ='$ev_id'");
				echo json_encode($res);
	}

	if($table=='ev_s_pay'){
		$ev_id= $o->{'id'};
		$ev_montant= $o->{'montant'};
		$ev_methode= $o->{'methode'};
		$ev_email= $o->{'email'};
		$ev_url= $o->{'url'};
				mysql_query('SET CHARACTER SET utf8');
			$res = mysql_query("UPDATE payement SET montant='$ev_montant', methode='$ev_methode', email='$ev_email', page_url='$ev_url' WHERE event_id ='$ev_id'");
				echo json_encode($res);
	}



}



if($operation=='delete'){
		$table= $o->{'table'};
		if($table=='client'){
			$client_id= $o->{'id'};
					mysql_query('SET CHARACTER SET utf8');
				$res = mysql_query("DELETE FROM client WHERE id ='$client_id'");
					echo json_encode($res);
		}

		if($table=='demandes_req'){
			$demande_id= $o->{'id'};
					mysql_query('SET CHARACTER SET utf8');
				$res = mysql_query("DELETE FROM demandes_req WHERE id ='$demande_id'");
					echo json_encode($res);
		}

		if($table=='site'){
					mysql_query('SET CHARACTER SET utf8');
				$res = mysql_query("DELETE FROM site");
					echo json_encode($res);
		}

		if($table=='abonnement'){
			$client_id= $o->{'client_id'};
			$event_id= $o->{'event_id'};
					mysql_query('SET CHARACTER SET utf8');
				$res = mysql_query("DELETE FROM abonnement WHERE client_id='$client_id' AND event_id='$event_id'");
					echo json_encode($res);
		}

		if($table=='event'){
			$event_id= $o->{'id'};
					mysql_query('SET CHARACTER SET utf8');
				$res = mysql_query("DELETE FROM evenement WHERE id='$event_id'");
					echo json_encode($res);
		}

		if($table=='lieu'){
			$lieu_id= $o->{'id'};
					mysql_query('SET CHARACTER SET utf8');
				$res = mysql_query("DELETE FROM lieu WHERE id='$lieu_id'");
					echo json_encode($res);
		}


		if($table=='relation_del'){
			$idcl1= $o->{'idcl1'};
			$idcl2= $o->{'idcl2'};
					mysql_query('SET CHARACTER SET utf8');
				$res = mysql_query("DELETE FROM relation WHERE ((idc1='$idcl1' AND idc2='$idcl2')OR(idc1='$idcl2' AND idc2='$idcl1'))");
					echo json_encode($res);
		}

		if($table=='ev_s_delpay'){
			$ev_id= $o->{'id'};

					mysql_query('SET CHARACTER SET utf8');
				$res = mysql_query("DELETE FROM payement WHERE event_id='$ev_id'");
					echo json_encode($res);
		}



	}



?>
