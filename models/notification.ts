
class Notification {

      constructor(titre,type,texte,target_client,source_client_id,source_client_name,source_client_photo,date,vu){
      this.titre=titre;
      this.type=type;
      this.texte=texte;
      this.target_client=target_client;
      this.source_client_id=source_client_id;
      this.source_client_name=source_client_name;
      this.source_client_photo=source_client_photo;
      this.date=date;
      this.vu=vu;
    }
    getId(){
      return this.id;
    }
    setId(id){
    this.id=id;
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
    getTexte(){
      return this.texte;
    }
    setTexte(texte){
      this.texte=texte;
    }
    getTarget_client(){
      return this.target_client;
    }
    setTarget_client(target_client){
      this.target_client=target_client;
    }
    getSource_client_id(){
      return this.source_client_id;
    }
    setSource_client_id(source_client_id){
      this.source_client_id=source_client_id;
    }
    getSource_client_name(){
      return this.source_client_name;
    }
    setSource_client_name(source_client_name){
      this.source_client_name=source_client_name;
    }
    getSource_client_photo(){
      return this.source_client_photo;
    }
    setSource_client_photo(source_client_photo){
      this.source_client_photo=source_client_photo;
    }
    getDate(){
      return this.date;
    }
    setDate(date){
      this.date=date;
    }
    getVu(){
      return this.vu;
    }
    setVu(vu){
      this.vu=vu;
    }

}
