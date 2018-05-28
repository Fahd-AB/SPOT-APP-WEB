
class Evenement {

      constructor(id_client,titre,type,autre,description,prepaye,date,lat,lng,nb_abonnees,statut){
      this.id_client=id_client;
      this.titre=titre;
      this.type=type;
      this.autre=autre;
      this.description=description;
      this.prepaye=prepaye;
      this.date=date;
      this.lat=lat;
      this.lng=lng;
      this.nb_abonnees=nb_abonnees;
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
    getAutre(){
      return this.autre;
    }
    setAutre(autre){
      this.autre=autre;
    }
    getDescription(){
      return this.description;
    }
    setDescription(description){
      this.description=description;
    }
    getPrepaye(){
      return this.prepaye;
    }
    setPrepaye(prepaye){
      this.prepaye=prepaye;
    }
    getDate(){
      return this.date;
    }
    setDate(date){
      this.date=date;
    }
    getLat(){
      return this.lat;
    }
    setLat(lat){
      this.lat=lat;
    }
    getLng(){
      return this.lng;
    }
    setLng(lng){
      this.lng=lng;
    }
    getNb_abonnees(){
      return this.nb_abonnees;
    }
    setNb_abonnees(nb_abonnees){
      this.nb_abonnees=nb_abonnees;
    }
    getStatut(){
      return this.statut;
    }
    setStatut(statut){
      this.statut=statut;
    }


}
