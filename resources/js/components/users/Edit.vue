<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header"><h4>Edit User Account</h4></div>
                <div class="card-body">
                    <form @submit.prevent="updateUser">
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
                                <button type="submit" class="btn btn-primary">Save</button>
                                <router-link :to='{name:"showUsers"}' class="btn btn-info">Cancel</router-link>
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
    name:"edit-user",
    data(){
        return {
            user:{
                name:"",
                user_name:"",
                password:"",
            }
        }
    },
    mounted(){
        this.showUserInfo()
    },
    methods:{
        async showUserInfo(){
            await this.axios.get(`/api/users/${this.$route.params.id}`).then(response=>{
                const { name, user_name ,password } = response.data
                this.user.name = name
                this.user.user_name = user_name
                this.user.password = password
            }).catch(error=>{
                console.log(error)
            })
        },
        async updateUser(){
            await this.axios.put(`/api/users/${this.$route.params.id}`,this.user).then(response=>{
                this.$router.push({name:"showUsers"})
            }).catch(error=>{
                console.log(error)
            })
        }
    }
}
</script>