<template>
<div>

<multiselect v-model="retorno" :options="listaA"
track-by="name" label="name" :multiple="true"  placeholder="Selecione"
selectLabel="Escolha" key="id"/>
<input type="hidden" :value="ids" id="cats" name="cats"/>

</div>

</template>

<script>

import Multiselect from 'vue-multiselect';
export default {
    components: { Multiselect },
    props:[
'data',
'storedcategoria'
    ]
       
    ,
    data() {
        return {
            selectedCat : [] ,

            ids : []
        }
    },
    computed:{
        listaA : function(){
            return JSON.parse(this.data);
        },
        retorno : {
            get: function () {
                    if(this.storedcategoria == "[]")// não tiver categoria
                        {
                           
                            return  this.selectedCat ;//retorna a propria lista
                        }else{// se tiver
                            if(this.storedcategoria){//so entra da primeira vez
                                this.selectedCat =  JSON.parse(this.storedcategoria)
                                this.storedcategoria = null
                            }
                            return this.selectedCat//retorna o valor que foi setado da balde
                           // return JSON.parse(this.storedcategoria).pop()//retorna o valor que foi setado da balde
            
                        }
            },
             set: function (newValue) { //seta os valores selecionados no
                this.ids = []
                this.selectedCat = newValue
                newValue.forEach(element => {
                    this.ids.push( element.id)
                });
             }
   
            
            
        }
    },
    created:function(){
        
           
 
              
            
    },
    mounted:function(){
        
    }
    

}
</script>