<template>
  <div class="status">
        <fieldset :class="{ ativarstatus: displaystatus}"><legend>Status</legend>
            <input readonly="readonly" @click="displaystatus = !displaystatus" type="text" name="status" :value="status">
            <button class="btn"  @click="displaystatus = !displaystatus"><svg width="18px" height="18px" viewBox="0 0 900 300"><path d="M312 251l222 -236c10,-9 23,-15 37,-15l1 0c29,0 53,24 53,53 0,14 -6,27 -17,38l-258 274c-8,7 -17,12 -27,14 -4,1 -7,1 -11,1 -3,0 -7,0 -10,-1 -11,-2 -20,-7 -26,-13l-261 -276c-10,-10 -15,-23 -15,-37 0,-29 24,-53 53,-53l1 0c14,0 27,6 35,15l223 236z" class="fillButton"></path></svg></button>
        </fieldset>
        <div  @click="displaystatus = !displaystatus" v-show="displaystatus" class="stat">
            <ul>
                <li @click="status = 'Aberto'">Aberto</li>
                <li @click="status = 'Cancelado'">Cancelado</li>
                <li @click="status = 'Finalizado'">Finalizado</li>
            </ul>
      </div>
  </div>

</template>

<script>
export default {
    data(){
        return {
            status: 'Aberto',
            displaystatus: false
        }
    }
}
</script>

<style>
    .status{
        position: relative;
        margin-top: 10px;
    }
    .stat{      
        display: block;
        position: absolute;  
        width: calc(100% - 2px);
        border: 1px solid #dcdcdc;
        background-color: #fff;
        border-top: none;
        border-bottom-left-radius: 30px;
        border-bottom-right-radius: 30px;
        cursor: pointer;
        padding-bottom: 20px;
    }
    input{
        position: absolute;
        z-index: 1;
        top: 15px;
        margin: 0 20px 0 20px ;
        display: flex;
        align-items: center;
        justify-content: center;
        width: calc(100% - 45px);
        font-size: 16px;
        height: 35px;
        outline: 0;
        cursor: pointer;
        color: rgba(0, 0, 0, 0.75);
    }
    .ativarstatus{
        border: 1px solid rgba(0, 0, 0, 0.527);
        border-radius:20px 20px 0 0 ;
        border-bottom: none;
        height: 55px;
        border: 1px solid #dcdcdc;
        border-bottom: none;
    }
    fieldset{
        border: 1px solid rgba(0, 0, 0, 0.5);
        border-radius: 25px;
        height: 55px;
        border: 1px solid #dcdcdc;
    }
    li{
        list-style: none;
        padding: 10px;
    }
     li:hover{
         background-color: rgb(25, 87, 255);
         color: white;
     }
    .btn{
        position: absolute;
        top: 25px;
        right: 15px;
        background-color: white;
        z-index: 55;
        cursor: pointer;
        fill: rgba(0, 0, 0, 0.65);
    }
</style>