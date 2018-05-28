
class Lieu {

      constructor(id_client,nom,type,region,description,photo,lat,lng){
      this.id_client=id_client;
      this.nom=nom;
      this.type=type;
      this.region=region;
      this.description=description;
      this.photo=photo;
      this.lat=lat;
      this.lng=lng;
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
    getNom(){
      return this.nom;
    }
    setNom(nom){
      this.nom=nom;
    }
    getType(){
      return this.type;
    }
    setType(type){
      this.type=type;
    }
    getRegion(){
      return this.region;
    }
    setRegion(region){
      this.region=region;
    }
    getDescription(){
      return this.description;
    }
    setDescription(description){
      this.description=description;
    }
    getPhoto(){
      return this.photo;
    }
    setPhoto(photo){
      this.photo=photo;
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
    

}
