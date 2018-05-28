class Admin {
          constructor(prenom,nom_famille,email,mot_de_passe,photo,statut) {
            this.prenom = prenom;
            this.nom_famille = nom_famille;
            this.email = email;
            this.mot_de_passe = mot_de_passe;
            this.photo = photo;
            this.statut = statut;
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
          setPrenom(prenom){
          this.prenom=prenom;
          }
          getNom_famille(){
            return this.nom_famille;
          }
          setNom_famille(nom_famille){
          this.nom_famille=nom_famille;
          }
          setEmail(email){
          this.email=email;
          }
          getEmail(){
            return this.email;
          }
          setMot_de_passe(mot_de_passe){
          this.mot_de_passe=mot_de_passe;
          }
          getMot_de_passe(){
            return this.mot_de_passe;
          }
          setPhoto(photo){
          this.photo=photo;
          }
          getPhoto(){
            return this.photo;
          }
          setStatut(statut){
          this.statut=statut;
          }
          getStatut(){
            return this.statut;
          }

}
