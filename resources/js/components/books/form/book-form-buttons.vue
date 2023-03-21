<template>
    <div id="buttons" class="container-sm d-flex justify-content-around">
    </div>
</template>

<script>
export default {

    props:{
        formConfig:{
            type:Object,
            required:true
        },

        formRole:{
            type:String,
            required:true
        }

    },

    methods:{

        init(){
            this.buttonSection = window.document.querySelector('#buttons')
            this.getButtons()
        },

        /**
          @param attr array with an object with all attributes to set {class:"myclass"}
          @param message input text
          @param submit type submit input
         */
        createButton(id, type, message){
            let newButton = window.document.createElement('button'), attr = {
                id:id,
                class:`btn btn-${type}`,
                type:'submit',
                'data-bs-dismiss':'modal',
            }
            for(const [k, v] of Object.entries(attr)){
                newButton.setAttribute(k, v)
            }
            newButton.innerHTML=message
            this.buttons.push(newButton)
        },

        getButtons(){
            switch(this.formConfig.type){
                case 'lend':
                    this.createButton('lendButton', 'primary', 'Pedir')
                break;
                case 'store':
                    this.createButton('createButton', 'primary',  'Crear')
                break;
                case 'edit':
                    this.createButton('editButton', 'warning',  'Editar')
                break;
                case 'delete':
                    this.createButton('deleteButton', 'danger', 'Eliminar')
                break;
            }
            this.buttons.forEach((e)=>{
                this.buttonSection.append(e)
            })
        },

        destroyModal(){
            this.$parent.$parent.destroyBookModal()
        },

    },

    data(){
        return{
            buttons:[],
            buttonSection:null,
        }
    },

    mounted(){
        this.init()
    }

}
</script>
