<template>
    <div class="container-sm card mt-5 p-3">
        <div class="card-head d-flex justify-content-between">
            <h1>Libros</h1>
            <button @click="this.openModal('store', 1)" class="btn btn-primary" v-if='this.role=="admin"'>Crear</button>
            <button class="btn btn-secondary" v-if='this.role=="user"'>Atras</button>
        </div>
        <div class="card-body">
            <table  id="t1" class="table table-striped table-ligth table-borderless caption-top">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Author</th>
                        <th scope="col">Stock</th>
                        <th scope="col">actions</th>
                    </tr>
                </thead>
                <tbody v-if='this.role == "admin"'>
                    <books-item-admin v-for="(e, i) in this.books" :key="i" :bookItem="e" ></books-item-admin>
                    <div v-elsefor class="spinner-border " role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </tbody>
                <tbody v-else-if='this.role == "user"'>
                    <books-item-user v-for="(e, i) in this.books" :key="i" :bookItem="e" ></books-item-user>
                    <div v-elsefor class="spinner-border " role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </tbody>
            </table>
        </div>
        <div id="book_modal">
        </div>
        <section v-if="this.book_modal.load">
            <books-form :book-form-role="this.role" :book-item="this.books[this.book_modal.id - 1]" :book-form-config="this.book_modal"></books-form>
        </section>
    </div>
</template>
<script>
import bookItemAdminVue from "./books/book-item-admin.vue"
import bookItemUserVue from "./books/book-item-user.vue"
import booksFormVue from "./books/books-form.vue"
export default {
    props:{
        'roleData':{
            'type':String,
            'required':true
        },
        'user':{
            'type':Number,
            'required':true
        }
    },
    components: {
        'books-item-admin':bookItemAdminVue,
        'books-item-user':bookItemUserVue,
        'books-form':booksFormVue
    },
    methods:{
        init(){
            this.book_modal.type = null
            this.book_modal.load = false
            this.book_modal.id = null
            this.book_modal.container = null
        },
        fetchBooks(){
            return new Promise ((resolve)=>{
                window.axios.get('/Book/list').then(response =>{
                    resolve(response.data.books)
                }).catch((error)=>{
                    console.error(error)
                })
            })
        },
        createDatatable(){
            $('#t1').DataTable()
        },
        createBookModal(type, id){
            return new Promise((resolve)=>{
                this.book_modal.load = true
                this.book_modal.id = id
                this.book_modal.type = type
                setTimeout(()=>{
                    if(window.document.querySelector('#M1')){
                        resolve(window.document.querySelector('#M1'))
                    }
                }, 500)
            })
        },
        openModal(type, id){
            this.createBookModal(type, id).then((resolve)=>{
                this.book_modal.container = resolve
                this.book_modal.modal = new bootstrap.Modal(this.book_modal.container, { keyboard:false })
                this.book_modal.container.addEventListener('hidden.bs.modal', ()=>{
                    this.book_modal.load = false
                })
                this.book_modal.modal.show()
            })
        },

        destroyBookModal(){
            this.book_modal.load = false
            this.book_modal.type = null
            this.book_modal.id = null
            this.book_modal.container = null
            this.fetchBooks().then((resolve)=>{
                this.books={ ...resolve }
            });
        }
    },
    created(){
        this.init()
        this.fetchBooks().then((resolve)=>{
            this.books= { ...resolve }
        })
    },
    data(){
        return {
            'books': Object,
            'books_data': Object,
            'role': this.roleData,
            'book_modal': {
                'type':String,
                'load':Boolean,
                'id':Number,
                'modal':null,
                'container':null,
            },
            'restore': null,
        }
    },
}
</script>
