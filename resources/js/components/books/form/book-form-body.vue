<template>
    <div class="container">
        <div v-if='this.formConfig.type=="see"'>
            <div v-for="(e, i) in this.bookItem" :key="i">
                <div v-if="e==this.bookItem.author||e==this.bookItem.category">
                    <hr>
                    <div v-for="(el, it) in e" :key="it" class="d-flex justify-content-center">
                        <p class="text fs-4 fw-bold m-1 p-1 text-center" v-if="el==this.bookItem.author.id">{{ el }}</p>
                        <p class="text fs-4 fw-bold m-1 p-1 text-center" v-else-if="el==this.bookItem.category.id">{{ el }}</p>
                        <p class="text fs-5 fst-italic m-1 p-1 text-center" v-else-if="el==this.bookItem.author.biography">{{ el }}</p>
                        <p class="text fs-5 m-1 p-1 text-center" v-else>{{ el }}</p>
                    </div>
                </div>
                <div v-else class="d-flex justify-content-center">
                    <p class="text fs-4 fw-bold m-1 p-1 text-center" v-if="e==this.bookItem.id">{{ e }}</p>
                    <p class="text fs-5 fst-italic m-1 p-1 text-center" v-else-if="e==this.bookItem.description">{{ e }}</p>
                    <p class="text fs-5 m-1 p-1 text-center" v-else>{{ e }}</p>
                </div>
            </div>
        </div>
        <div id="deleteBookForm" v-if='this.formConfig.type=="delete"'>
            Esta seguro de eliminar el libro N°{{this.bookItem.id}} de nombre {{this.bookItem.title}} del autor {{this.bookItem.author.name}}
            <div class="mb-3" id="passwordIdParent">
                <label class="form-label fs-5 fw-bold" for="passwordId">Autorizacion para eliminar:</label>
                <input
                    class="form-control"
                    name="password"
                    id="passwordId"
                    type="password"
                    placeholder="Contraseña"
                    aria-describedby="passwordIdHelp"
                    v-model="destroy.password">
                    <div id="passwordIdHelp" class="form-help">Ingrese su contraseña</div>
                </div>
            </div>
            <div id="sendBookForm" v-if='this.formConfig.type=="edit"||this.formConfig.type=="store"'>
                <div class="mb-3" id="titleIdParent">
                    <label class="form-label fs-5 fw-bold" for="titleId">Cambir titulo:</label>
                    <input class="form-control" name="title" id="titleId" type="text" placeholder="Titulo" aria-describedby="titleIdHelp" v-model="book.title">
                    <div id="titleIdHelp" class="form-help">Ingrese su Titulo</div>
                </div>
                <div class="mb-3" id="stockIdParent">
                    <label class="form-label fs-5 fw-bold" for="stockId">Cambar la cantidad en el inventario:</label>
                    <input class="form-control" name="stock" id="stockId" type="number" placeholder="Cantidad" aria-describedby="stockIdHelp" v-model="book.stock">
                    <div id="stockIdHelp" class="form-help">Ingrese su Cantidad</div>
                </div>
                <div>
                    <label class="form-label fs-5 fw-bold">Cambiar categoria:</label>
                    <vue-select v-model="book.category_id" :options="categories" :reduce="category => category.id" label="name"></vue-select>
                    <div></div>
                </div>
                <div>
                    <label class="form-label fsz-5 fw-bold">Cambiar autor:</label>
                    <vue-select v-model="book.author_id" :options="authors" :reduce="author => author.id" label="name"></vue-select>
                    <div></div>
                </div>
                <div class="mb-3" id="imageIdParent">
                    <label class="form-label fs-5 fw-bold" for="imageId">Cambiar Caratula:</label>
                    <input  class="form-control" name="image" id="imageId" type="file" placeholder="Archivo" aria-describedby="imageIdHelp" >
                    <div id="imageIdHelp" class="form-help">Ingrese su Archivo</div>
                </div>
                <div class="mb-3" id="descriptionIdParent">
                    <label class="form-label fs-5 fw-bold" for="descriptionId">Cambiar descripcion:</label>
                    <textarea v-model="book.description" class="form-control" name="description" id="descriptionId" type="text" placeholder="Descripcion" aria-describedby="descriptionIdHelp" >
                    </textarea><div id="descriptionIdHelp" class="form-help">Ingrese su Descripcion</div>
                </div>
            </div>
            <div id="lendBookForm" v-if='this.formConfig.type=="lend"'>
                <div class="mb-3" id="titleIdParent">
                    <label class="form-label fs-5 fw-bold" for="titleId">titulo:</label>
                    <div class="form-control" id="titleId" >
                        N°{{ this.bookItem.id}} {{this.bookItem.title }}
                    </div>
                </div>
                <div class="mb-3" id="date_inIdParent">
                    <label class="form-label fs-5 fw-bold" for="date_inId">Cambar fecha inicial:</label>
                    <input class="form-control" name="date_in" id="date_inId" type="date" placeholder="Cantidad" aria-describedby="date_inIdHelp" v-model="lend.date_in">
                    <div id="stockIdHelp" class="form-help">Ingrese su fecha inicial</div>
                </div>
                <div class="mb-3" id="date_outIdParent">
                    <label class="form-label fs-5 fw-bold" for="date_outId">Cambiar fecha final:</label>
                    <input class="form-control" name="date_out" id="date_outId" type="date" placeholder="Archivo" aria-describedby="date_outIdHelp" v-model="lend.dote_out">
                    <div id="imageIdHelp" class="form-help">Ingrese su fecha final</div>
                </div>
            </div>
        </div>
</template>
<script>

export default {
    props:{

        bookItem:{
            type:Object,
            required:true
        },

        formConfig:{
            type:Object,
            required: true,
        },

        formRole:{
            type:String,
            required:true
        },

    },

    data(){
        return {
            message:String,
            inputs:[],
            activeForm:null,
            book:{},
            destroy:{},
            lend:{},
            categories:[],
            authors:[],
        }
    },

    methods:{


        mount(){
            this.getActiveForm().then((resolve)=>{
                this.activeForm=resolve.form
                this.$parent.model=resolve.request
            })
        },

        getActiveForm(){
            return new Promise((resolve)=>{
                setTimeout(()=>{
                    if(this.formConfig.type==="edit"||this.formConfig.type==="store"){
                        resolve({form:window.document.querySelector('#sendBookForm'), request:this.book})
                    }else if(this.formConfig.type==="delete"){
                        resolve({form:window.document.querySelector('#deleteBookForm'), request:this.destroy})
                    }else if(this.formConfig.type==="lend"){
                        resolve({form:window.document.querySelector('#lendBookForm'), request:this.lend})
                    }
                })
            }, 200)
        },


    },

    async created(){
        await window.axios.get('/Category/list').then((resolve)=>{
            this.categories = resolve.data.categories
        })
        await window.axios.get('/Author/list').then((resolve)=>{
            this.authors = resolve.data.authors
        })
    },

    mounted(){
        this.mount()
    },

}
</script>
