
class Abonnement {

      constructor(id_client,id_evenement,titre,type,date,statut){
      this.id_client=id_client;
      this.id_evenement=id_evenement;
      this.titre=titre;
      this.type=type;
      this.date=date;
      this.statut=statut;
    }
    getId(){
      return this.id;
    }
    setId(id){
    this.id=id;
    }
    getId_client(){
      return this.id_client;
    }
    setId_client(id_client){
      this.id_client=id_client;
    }
    getId_evenement(){
      return this.id_evenement;
    }
    setId_evenement(id_evenement){
      this.id_evenement=id_evenement;
    }
    getTitre(){
      return this.titre;
    }
    setTitre(titre){
      this.titre=titre;
    }
    getType(){
      return this.type;
    }
    setType(type){
      this.type=type;
    }
    getDate(){
      return this.date;
    }
    setDate(date){
      this.date=date;
    }
    getStatut(){
      return this.statut;
    }
    setStatut(statut){
      this.statut=statut;
    }


}
