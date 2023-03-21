<template>
    <tr >
        <td>{{ this.book.title }}</td>
        <td>{{ this.book.author.name }}</td>
        <td>{{ this.book.stock }}</td>
        <td>
            <div class="d-flex gap-2">
                <button @click="this.$parent.openModal('see', this.book.id)"  id="i1" class="btn btn-primary">Ver</button>
                <button @click="this.$parent.openModal('lend', this.book.id)" id="i2" class="btn btn-secondary">Prestar</button>
            </div>
        </td>
    </tr>
</template>
<script>
export default {
    created(){
        this.init()
    },
    mounted(){
        this.createDatatable()
    },
    props:[
        'bookItem'
    ],
    data(){
        return {
            book:{}
        }
    },
    methods: {
        init(){
            this.book = this.bookItem
        },
        createDatatable(){
            this.$parent.createDatatable(true)
        },
    }
}
</script>
