<template>
    <div class="row" v-if="login">
        <div class="col-12 mb-2">
            <router-link :to='{name:"newUser"}' class="btn btn-success"><i class="fas fa-plus-circle"></i></router-link>
        </div>
        <div class="col-12">             
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="bg-primary text-white">
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>User Name</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="user in users" :key="user.id">
                                    <td>{{ user.id }}</td>
                                    <td>{{ user.name }}</td>
                                    <td>{{ user.user_name }}</td>
                                    <td>
                                        <router-link :to='{name:"editUser",params:{id:user.id}}' class="btn btn-info"><i class="fas fa-edit"></i></router-link>
                                        <a type="button" @click="userDelete(user.id)" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                            </tbody>
                            
                        </table>
                    </div>                          
        </div>
    </div>
</template>

<script>
export default {
    name:"users",
    data(){
        return {
            users:[],
            login:"",
        }
    },
    mounted(){
        this.showUsers()

        // this.loginValidate()
    },
    methods:{
        async showUsers(){
            await this.axios.get('/api/users').then(response=>{
                this.users = response.data
                this.login = true   
            }).catch(error=>{
                console.log(error)
                this.users = []
            })
        },
        userDelete(id){
            if(confirm("Are you sure you want to delete the user?")){
                this.axios.delete(`/api/users/${id}`).then(response=>{
                    this.showUsers()
                }).catch(error=>{
                    console.log(error)
                })
            }
        },
        // async loginValidate(){
        //     await this.axios.get('/api/login-validate').then(response=>{
        //         this.login = response.data.login
        //     }).catch(error=>{
        //         console.log(error)
        //         this.login = ""
        //     })
        // },
    }
}
</script>