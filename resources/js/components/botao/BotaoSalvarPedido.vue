<template>
  <div class="button">
        <div class="btn-detalhes" :class="{abrirmaisopcoes: !abrirmaisopcoes }">
            <slot name="p" ></slot><button @click="abrirmaisopcoes = !abrirmaisopcoes" class="btn-mais-detalhes"><svg width="18px" height="18px" viewBox="0 0 900 300"><path d="M312 251l222 -236c10,-9 23,-15 37,-15l1 0c29,0 53,24 53,53 0,14 -6,27 -17,38l-258 274c-8,7 -17,12 -27,14 -4,1 -7,1 -11,1 -3,0 -7,0 -10,-1 -11,-2 -20,-7 -26,-13l-261 -276c-10,-10 -15,-23 -15,-37 0,-29 24,-53 53,-53l1 0c14,0 27,6 35,15l223 236z" class="fillButton"></path></svg></button>
        </div>
        <div class="lista" v-show="!abrirmaisopcoes">
            <ul @click="abrirmaisopcoes = !abrirmaisopcoes">
                <li><slot name="slot1"></slot></li>
                <li><slot name="slot2"></slot></li>
                <li><slot name="slot3"></slot></li>
                <li><slot name="slot4"></slot></li>
                <li><slot name="slot5"></slot></li>
                <li><slot name="slot6"></slot></li>

            </ul>            
        </div>
  </div>
</template>

<script>
export default {
    data(){
        return {
            abrirmaisopcoes: true
        }
    }
}
</script>

<style scoped>
    .cadastrar-gravar{
        display: flex;
        width: 220px;
        height: 40px;
        border-radius: 20px;
        font-size: 15px;
        color: #fff;
        background-color: rgb(0, 132, 255);
        justify-content: center;
        align-items: center;
    }
    .abrirmaisopcoes{
        border-radius: 20px 20px 0 0;      
        background-color: rgb(0, 132, 255);
    }
    .button{
        position: relative;
        height: 40px;
        width: 100%;
        z-index: 58;

    }
    .btn-detalhes{
        position: relative;
        width: 100%;

    }
    .btn-mais-detalhes{
        position: absolute;
        display: flex;
        align-items: center;
        justify-content: center;
        width: 50px;
        height: 40px;
        right: 0;
        top: 0;
        border-radius: 25px;
        background-color: rgb(0, 132, 255);
    }
    .btn-mais-detalhes:hover{
        background-color: rgb(29, 146, 255);
    }
    svg{
        fill:white
    }
    .lista{
        position: absolute;
        top: 40;
        width: 100%;
        height: 100%;
        border-radius: 0 0 20px 20px;
    }
    .lista ul{
        border-top:1px solid rgba(6, 104, 216, 0.781);
        background-color:  rgb(0, 132, 255);
        border-radius:0 0 20px 20px ;
        padding-bottom: 20px;
    }
    li{
        margin: 0;
        list-style: none;
        width: 100%;
    }
    button:hover{
        background-color: rgba(6, 104, 216, 0.781);;
     }

    button{
        width: 100%;
        height: 120%;
        background-color: rgb(0, 132, 255);
        color:white;
    }

</style>