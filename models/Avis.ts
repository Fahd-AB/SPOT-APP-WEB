
class Avis {

      constructor(id_client,id_lieu,note,commentaire,date){
      this.id_client=id_client;
      this.id_lieu=id_lieu;
	  this.note=note;
	  this.commentaire=commentaire;
      this.date=date;
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
	getId_lieu(){
      return this.id_lieu;
    }
    setId_lieu(id_lieu){
      this.id_lieu=id_lieu;
    }
	 getNote(){
      return this.note;
    }
    setNote(note){
      this.note=note;
    }
	
	 getCommentaire(){
      return this.commentaire;
    }
    setCommentaire(commentaire){
      this.commentaire=commentaire;
    }
	
    getDate(){
      return this.date;
    }
    setDate(date){
      this.date=date;
    }
   
   

}
