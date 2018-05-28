
class Transaction {

      constructor(id_evenement,id_client,id_abonnement,date,statut){
      this.id_evenement=id_evenement;
      this.id_client=id_client;
      this.id_abonnement=id_abonnement;
      this.date=date;
	  this.statut=statut;
    }
    getId(){
      return this.id;
    }
    setId(id){
    this.id=id;
    }
    getId_evenement(){
      return this.id_evenement;
    }
    setId_evenement(id_evenement){
      this.id_evenement=id_evenement;
    }
	getId_client(){
      return this.id_client;
    }
    setId_client(id_client){
      this.id_client=id_client;
    }
	getId_abonnement(){
      return this.id_abonnement;
    }
    setId_abonnement(id_abonnement){
      this.id_abonnement=id_abonnement;
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
