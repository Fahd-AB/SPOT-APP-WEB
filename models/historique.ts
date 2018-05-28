class Historique {
          constructor(client_id,device,ip,date,statut) {
            this.client_id=client_id;
            this.device = device;
            this.ip = ip;
            this.date = date;
            this.statut = statut;
          }
          getId(){
            return this.id;
          }
          setId(id){
          this.id=id;
          }
          getClient_id(){
            return this.client_id;
          }
          setClient_id(client_id){
          this.client_id=client_id;
          }
          getDevice(){
            return this.device;
          }
          setDevice(device){
          this.device=device;
          }
          getIp(){
            return this.ip;
          }
          setIp(ip){
          this.ip=ip;
          }

          setDate(date){
          this.date=date;
          }
          getDate(){
            return this.date;
          }
          setStatut(statut){
          this.statut=statut;
          }
          getStatut(){
            return this.statut;
          }

}
