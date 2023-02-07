<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.3.1/axios.min.js" integrity="sha512-NbjaUHU8g0+Y8tMcRtIz0irSU3MjLlEdCvp82MqciVF4R2Ru/eaXHDjNSOvS6EfhRYbmQHuznp/ghbUvcC0NVw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="./css/style.css">
    </head>
    <body>
        <div id="app" class="mt-5">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="centered-content">
                                <h3>Todo List</h3>
                                <ul class="list-unstyled w-75">
                                    <li class="py-3 px-2 border-solid-grey" v-for="(todo, index) in todoList">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <div v-if="clicked != index">{{todo.language}}</div>
                                                <div v-else>
                                                    <div class="row">
                                                        <div class="col-9">
                                                            <input type="text" v-model="todo.language" :placeholder="(errorMessage != '') ? errorMessage : 'Linguaggio'" class="form-control">
                                                        </div>
                                                        <div class="col-3">
                                                            <button class="btn btn-primary" @click="confirmUpdate(todo.language, index)">Conferma</button>
                                                        </div>
                                                    </div>
                                                </div>  
                                            </div> 
                                            <div>
                                                <button class="m-1 btn btn-square btn-warning" @click="editTodo(index)">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                                <button class="m-1 btn btn-square btn-danger" @click="deleteTodo(index)">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                                <div class="w-50 mt-3">
                                    <div class="row">
                                        <div class="col-9">
                                            <input type="text" v-model="language" :placeholder="(errorMessage != '') ? errorMessage : 'Linguaggio'" class="form-control">
                                        </div>
                                        <div class="col-3">
                                            <button class="btn btn-primary" @click="addTodo">Inserisci</button>
                                        </div>
                                    </div>
                                    <div class="row" v-if="errorMessage != ''">
                                        <p class="mt-2 text-danger text-center"><strong>{{ errorMessage }}</strong></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <script src="./js/script.js"></script>
    </body>
</html>