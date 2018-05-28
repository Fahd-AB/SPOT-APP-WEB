
class Message {

      constructor(emetteur,recepteur,texte,date,vu){
      this.emetteur=emetteur;
      this.recepteur=recepteur;
      this.texte=texte;
      this.date=date;
      this.vu=vu;
    }
    getId(){
      return this.id;
    }
    setId(id){
    this.id=id;
    }
    getEmetteur(){
      return this.emetteur;
    }
    setEmetteur(emetteur){
      this.emetteur=emetteur;
    }
    getRecepteur(){
      return this.recepteur;
    }
    setRecepteur(recepteur){
      this.recepteur=recepteur;
    }
    getTexte(){
      return this.texte;
    }
    setTexte(texte){
      this.texte=texte;
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
