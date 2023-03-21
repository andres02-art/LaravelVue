<template>
    <h1 >{{ this.message }}</h1>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</template>

<script>
export default {
    props:{
        'formConfig':{
            'type':Object,
            'required': true,
        },
    },
    methods:{
        init(){
            this.getMessage()
        },
        getMessage(){
            switch(this.formConfig.type){
                case 'see':
                    this.message = 'Descripcion'
                break;
                case 'lend':
                    this.message = 'Prestamo'
                break;
                case 'edit':
                    this.message = 'Editar'
                break;
                case 'delete':
                    this.message = 'Eliminar'
                break;
                case 'store':
                    this.message = 'Crear'
                break;
            }
        }
    },
    created(){
        this.init()
    },
    data(){
        return{
            'message':String
        }
    }
}
</script>
