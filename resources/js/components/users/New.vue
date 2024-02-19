<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header"><h4>Sign up for a new account</h4></div>
                <div class="card-body">
                    <form @submit.prevent="newUser">
                        <div class="row">
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" v-model="user.name">
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>User Name</label>
                                    <input type="text" class="form-control" v-model="user.user_name">
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control" v-model="user.password">
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Sign up</button>
                            </div>
                        </div>                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name:"new-user-account",
    data(){
        return {
            user:{
                name:"",
                user_name:"",
                password:"",
            }
        }
    },
    methods:{
        async newUser(){
            await this.axios.post('/api/users',this.user).then(response=>{
                this.$router.push({name:"showUsers"})
            }).catch(error=>{
                console.log(error)
            })
        }
    }
}
</script>