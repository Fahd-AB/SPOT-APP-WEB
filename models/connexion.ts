
class Connexion {

      constructor(){
    }
    sendData(Data){
      $.getJSON("/webapi.php",{client_req:Data},this.getResponse);
    }
    getResponse(json) {
     if(json==null){
       console.log("Erreur Connexion, ou réponse vide !");
     }
     else{
      this.resp=json;
     }
   }
   getResut(){
     return this.resp;
   }


}
