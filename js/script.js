const { createApp } = Vue;

createApp({
    data() {
        return {
            apiUrl: 'server.php',
            todoList: [],
            language: '',
            errorMessage: '',
            clicked: ''
        }
    },
    methods: {
        addTodo() {

            const data = {
                language: this.language,
                done: false,
            }

            if (this.language.trim() != '' && this.language != '') {
                axios.post(this.apiUrl, data, {
                    headers: { 'Content-Type': 'multipart/form-data' }
                }).then((response) => {
                    this.language = '';

                    this.todoList = response.data;
                    this.errorMessage = '';
                })
            }
            else {
                this.errorMessage = 'Non puoi inserire una stringa vuota';
            }
        },
        deleteTodo(index) {

            const ciccio = {
                delete: index
            }

            axios.post(this.apiUrl, ciccio, {
                headers: { 'Content-Type': 'multipart/form-data' }
            }).then((response) => {
                this.todoList = response.data
            });
        },
        editTodo(index) {
            this.clicked = index
        },
        confirmUpdate(string, index) {
            const data = {
                edit: index,
                language_edit: string
            }

            axios.post(this.apiUrl, data, {
                headers: { 'Content-Type': 'multipart/form-data' }
            }).then((response) => {
                this.todoList = response.data
                this.clicked = ''
            });
        }
    },
    mounted() {
        axios.get(this.apiUrl).then((response) => {
            this.todoList = response.data;
        });
    }
}).mount('#app');