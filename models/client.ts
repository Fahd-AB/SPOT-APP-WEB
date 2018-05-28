class Client {
          constructor(prenom,nom_famille,email,tel,date_naissance,adresse,mot_de_passe,nb_amis,nb_evenement) {
            this.prenom = prenom;
            this.nom_famille = nom_famille;
            this.email = email;
            this.tel = tel;
            this.date_naissance = date_naissance;
            this.adresse = adresse;
            this.mot_de_passe = mot_de_passe;
            this.nb_amis = nb_amis;
            this.nb_evenement = nb_evenement;
          }
          getId(){
            return this.id;
          }
          setId(id){
          this.id=id;
          }
          getPrenom(){
            return this.prenom;
          }
          getNom_famille(){
            return this.nom_famille;
          }
          setEmail(email){
          this.email=email;
          }
          getEmail(){
            return this.email;
          }
          setTel(tel){
          this.tel=tel;
          }
          getTel(){
            return this.tel;
          }
          setDate_naissance(date_naissance){
          this.date_naissance=date_naissance;
          }
          getDate_naissance(){
            return this.date_naissance;
          }
          setAdresse(adresse){
          this.adresse=adresse;
          }
          getAdresse(){
            return this.adresse;
          }
          setMot_de_passe(mot_de_passe){
          this.mot_de_passe=mot_de_passe;
          }
          getMot_de_passe(){
            return this.mot_de_passe;
          }
          setNb_amis(nb_amis){
          this.nb_amis=nb_amis;
          }
          getNb_amis(){
            return this.nb_amis;
          }
          setNb_evenement(nb_evenement){
          this.nb_evenement=nb_evenement;
          }
          getNb_evenement(){
            return this.nb_evenement;
          }
          setSexe(sexe){
          this.sexe=sexe;
          }
          getSexe(){
            return this.sexe;
          }
          setRegion(region){
          this.region=region;
          }
          getRegion(){
            return this.region;
          }
          setProfilephoto(profilephoto){
          this.profilephoto=profilephoto;
          }
          getProfilephoto(){
            return this.profilephoto;
          }
          setProfilecover(profilecover){
          this.profilecover=profilecover;
          }
          getProfilecover(){
            return this.profilecover;
          }



}
