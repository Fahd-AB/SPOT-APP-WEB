
class Payement {

      constructor(montant,methode,email,page_url){
      this.montant=montant;
      this.methode=methode;
      this.email=email;
      this.page_url=page_url;
    }
    getId(){
      return this.id;
    }
    setId(id){
    this.id=id;
    }
    getMontant(){
      return this.montant;
    }
    setMontant(montant){
      this.montant=montant;
    }
    getMethode(){
      return this.methode;
    }
    setMethode(methode){
      this.methode=methode;
    }
    getEmail(){
      return this.email;
    }
    setEmail(email){
      this.email=email;
    }
    getPage_url(){
      return this.page_url;
    }
    setPage_url(page_url){
      this.page_url=page_url;
    }

}
