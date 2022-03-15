<template>
    <div class="form">
        <div class="div-flex">  
            <fieldset class="input  cl-3">
                <legend><label for="cnpjcpf">CNPJ/CPF</label></legend>  
                <input type="text"  name="cnpjcpf" id="cnpjcpf">
            </fieldset>

            <fieldset class="input cl-5">
                <legend><label for="nome">Nome</label></legend>  
                <input type="text" name="nome" id="nome">
            </fieldset>                                            
        </div>
        <div class="div-flex">  
            <fieldset class="input cl-3">
                <legend><label for="telefone">Telefone</label></legend>
                <input type="text" name="telefone" id="telefone">
            </fieldset>
            <fieldset class="input cl-5">
                <legend><label for="telefone">E-mail</label></legend>
                <input type="email" name="email" id="email">
            </fieldset>
        </div>
        <div class="endereco div-flex">
            <fieldset class="input cep cl-3">
                <legend><label for="cep">CEP</label></legend>
                <input v-model="consultaCep" type="text" name="cep" id="cep">
                <i @click.prevent="consultarCep"><svg width="18px" height="18px" viewBox="0 0 2117 2117"><g id="Camada_x0020_1"><path d="M1360 1499c-148,118 -330,181 -520,181 -463,0 -840,-377 -840,-840 0,-463 377,-840 840,-840 463,0 840,377 840,840 0,190 -63,372 -181,520l589 588c38,39 38,101 0,140 -19,18 -44,29 -70,29 -26,0 -51,-11 -70,-29l-588 -589zm-520 -16c355,0 643,-288 643,-643 0,-354 -288,-643 -643,-643 -354,0 -643,289 -643,643 0,355 289,643 643,643z" class="fillButton"></path></g></svg></i>
            </fieldset> 

            <fieldset class="input uf cl">
                <legend><label for="uf">UF</label></legend>
                <input v-model="apiCep.uf" type="text" name="UF" id="UF">
                <i @click.prevent=""><svg width="18px" height="18px" viewBox="0 0 900 300"><path d="M312 251l222 -236c10,-9 23,-15 37,-15l1 0c29,0 53,24 53,53 0,14 -6,27 -17,38l-258 274c-8,7 -17,12 -27,14 -4,1 -7,1 -11,1 -3,0 -7,0 -10,-1 -11,-2 -20,-7 -26,-13l-261 -276c-10,-10 -15,-23 -15,-37 0,-29 24,-53 53,-53l1 0c14,0 27,6 35,15l223 236z" class="fillButton"></path></svg></i>
            </fieldset> 

            <fieldset class="input cl-4">
                <legend><label for="municipio">Município</label></legend>
                <input v-model="apiCep.localidade" type="text" name="municipio" id="municipio">
            </fieldset>
        </div>
        <div class="div-flex">  
              <fieldset class="input cl-6">
                <legend><label for="endereco">Endereço</label></legend>
                <input v-model="apiCep.logradouro" type="text" name="endereco" id="endereco">
            </fieldset>
              <fieldset class="input uf cl">
                <legend><label for="numero">Nº</label></legend>
                <input type="text" name="numero" id="numero">
            </fieldset>
        </div>
        <div class="div-flex">  
              <fieldset class="input cl-4">
                <legend><label for="bairro">Bairro</label></legend>
                <input v-model="apiCep.bairro" type="text" name="bairro" id="bairro">
            </fieldset>  
            
            <fieldset class="input cl">
                <legend><label for="complemento">Complemento</label></legend>
                <input v-model="apiCep.complemento" type="text" name="complemento" id="complemento">
            </fieldset>
        </div>
        <TesteVini />
    </div>    
</template>


<script>
export default {
    data(){
        return{
            consultaCep:'',
            apiCep:{
                bairro: "",
                cep: "",
                complemento: "",
                ddd: "",
                gia: "",
                ibge: "",
                localidade: "",
                logradouro: "",
                siafi: "",
                uf: "",
            }
        }
    },
    methods:{
        consultarCep(){
             this.$api.get('/ws/'+this.consultaCep+'/json/').then(res => { this.apiCep = res.data, console.log(res.data) })            
        }
    }
}
</script>

<style scoped>
    .div-flex {
        display: flex;
        flex-wrap: wrap;
        max-width: 1280px;
        width: 100%;
    }
    fieldset{
        color: rgba(0, 0, 0, 0.103);
    }
    
    .input{
        border: 1px solid rgb(0 0 0 / 26%) !important;
        margin: 10px !important;
    }
    input{
        font-size: 15px;
    }
    .form{
        display: flex;
        flex-wrap: wrap;
        max-width: 1280px;
        width: 100%;
        padding: 40px;
    }
    .cep{
        position: relative;
        max-width: 250px;
        width: 100%;
    }
    .cep input{
       position: absolute;
       left: 20px;
    }
    .cep i{
        position: absolute;
        display: flex;
        justify-content: center;
        align-items: center;
        top:-9px;
        right: -5px;
        background-color: white;
        width: 50px;
        height: 47px;
        border-radius: 0 25px  25px 0;
        border-top: 1px solid rgba(0, 0, 0, 0.30) !important;        
        border-bottom: 1px solid rgba(0, 0, 0, 0.30) !important;        
        border-right: 1px solid rgba(0, 0, 0, 0.305) !important;  
    }
    .uf{
        max-width: 180x;
        width: 100%;
    }
    .uf input {
        max-width: 65px;
        position: absolute;
        left: 20px;       
    }
      .uf i {
          position: absolute;
          top: 5px;
          right: 10px;
          background-color: rgb(255, 255, 255);
      }
    .uf i svg{
        fill: rgba(0, 0, 0, 0.73);
    }
    .cep i svg{
        fill: rgba(0, 0, 0, 0.73);
    }
    .cl{
        flex-basis: 0;
        flex-grow: 1;
    }
    .cl-3{
        flex: 0 0 32.66666%;
        max-width: 32.666666%;
    }
    .cl-4{
        flex: 0 0 42.66666%;
        max-width: 42.666666%;
    }
    .cl-5{
        flex: 0 0  59.7%;
        max-width: 60.666666%;
    }
     .cl-6{
        flex: 0 0 66.0000%;
        max-width: 66.666666%;
    }
</style>