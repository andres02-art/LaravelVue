<template>
    <div id="M1"
        class="modal modal-lg fade"
        data-bs-backdrop="static"
        data-bs-keyboard="false"
        tabindex="-1"
        aria-labelledby="staticBackdropLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header d-flex justify-content-between">
                    <book-form-title :form-config="this.bookFormConfig"/>
                </div>
                <form @submit.prevent="sendForm" enctype="multipart/form-data">
                    <div class="modal-body">
                        <book-form-body :form-config="this.bookFormConfig" :form-role="this.bookFormRole" :book-item="this.bookItem"/>
                    </div>
                    <div class="modal-footer">
                        <book-form-buttons :form-config="this.bookFormConfig" :form-role="this.bookFormRole" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
import bookFormBodyVue from "./form/book-form-body.vue"
import bookFormButtonsVue from "./form/book-form-buttons.vue"
import bookFormTitleVue from "./form/book-form-title.vue"
export default {
    props:{
        bookItem:{
            required:true
        },
        bookFormConfig:{
            type:Object,
            required:true
        },
        bookFormRole:{
            type:String,
            required:true
        }
    },
    components:{
        'book-form-buttons':bookFormButtonsVue,
        'book-form-body':bookFormBodyVue,
        'book-form-title':bookFormTitleVue
    },
    data(){
        return {
            'model':null,
            'modal':null,
            'file':null,
        }
    },
    methods:{
        sendForm(){
            switch(this.bookFormConfig.type){
                case 'edit':
                    window.axios.post(`/Book/Root/${this.bookFormConfig.type}/${this.bookItem.id}`, this.createFormData())
                break;
                case 'store':
                    window.axios.post(`/Book/Root/${this.bookFormConfig.type}`, this.createFormData())
                break;
                case 'lend':
                    window.axios.post(`/Book/Root/${this.bookFormConfig.type}/${this.bookItem.id}`, this.model)
                break;
                case 'delete':
                    window.axios.delete(`/Book/Root/${this.bookFormConfig.type}/${this.bookItem.id}`)
                break;
            }
            this.$parent.destroyBookModal();
        },
        createFormData(){
            const formData = new FormData()
            console.log(this.file)
            if(this.file) formData.append('image', this.file, this.file.name);
            for (const [k, v] of Object.entries(this.model)){
                formData.append(k, v)
            }
            console.log(formData)
            return formData
        }
    },
    mounted(){
        this.modal = window.document.querySelector('#M1')
    },
}
</script>
