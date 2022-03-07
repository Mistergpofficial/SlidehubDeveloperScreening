<template>
    <div>

<div class="min-h-screen bg-red-800 py-5">
    <div class='overflow-x-auto w-full'>
	<div class="align-self-center">
					<button class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button" data-modal-toggle="authentication-modal">
						Add New 
					  </button>
    </div>


					<!-- Create Main modal -->
				<div id="authentication-modal" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed right-0 left-0 top-4 z-50 justify-center items-center h-modal md:h-full md:inset-0">
					<div class="relative px-4 w-full max-w-md h-full md:h-auto">
						<!-- Modal content -->
						<div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
							<div class="flex justify-end p-2">
								<button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="authentication-modal">
									<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>  
								</button>
							</div>
							
							<form  @submit.prevent="next" class="px-6 pb-4 space-y-6 lg:px-8 sm:pb-6 xl:pb-8">
								<h3 class="text-xl font-medium text-gray-900 dark:text-white">Add Developer</h3>
								<div>
									<label for="username" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Your Username</label>
									<input type="text" name="username" id="username" v-model="form.username" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="kkkkkkkkk" required>
									<br>
									<a @click="fetchUser()" class="btn btn-primary">Retrieve</a> <span>Click here to retrieve user</span>
								</div>
								<div>
									<label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Name</label>
									<input type="text" name="name" id="name" placeholder="name" v-model="user.name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" >
								</div>
								<div>
									<label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Company</label>
									<input type="text" name="company" id="company" v-model="user.company" placeholder="company" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" >
								</div>
								<div>
									<label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">No of Repos</label>
									<input type="text" name="repos" id="repos" v-model="repositories.length" placeholder="company" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" >
								</div>
								<div>
									<label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Url</label>
									<input type="text" name="url" id="url" v-model="user.url" placeholder="url" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" >
								</div>
								<button type="submit"  class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
							</form>
						</div>
					</div>
				</div>

			
	<template v-if="usersList.length > 0">
        <table class='mx-auto max-w-4xl w-full whitespace-nowrap rounded-lg bg-white divide-y divide-gray-300 overflow-hidden'>
            <thead class="bg-gray-900" style="width:100%;">
                <tr class="text-white text-left">
                    <th class="font-semibold text-sm uppercase px-6 py-4"> Developer candidates </th>
					<th class="font-semibold text-sm uppercase px-6 py-4 text-center"> Stats </th>
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center"> Repos </th>
                    <th class="font-semibold text-sm uppercase px-6 py-4"> Admin </th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                <tr v-for="(users, index) in usersList" :key="index">
                   <td class="px-6 py-4">
                        <p class="">  </p>
                        <p class="text-gray-500 text-sm font-semibold tracking-wide"> {{ users.name }} </p><br>
						 <p class="btn btn-primary"> {{ users.company }} &nbsp; {{ users.url }}</p>
                    </td>
				<!--	<td class="px-6 py-4" v-for="(repo, index) in distinctLanguage" :key="index">
                        <small> {{ repo }}</small>
                    </td> -->
					<td class="px-6 py-4">
                        <p class="">  </p>
                        <p class="btn btn-primary"> {{ JSON.parse(users.language) }}</p>
                    </td>
					<td class="px-6 py-4">
                        <p class="">  </p>
                        <p class="btn btn-primary"> {{ users.repos }}</p>
                    </td>
					 <td class="px-6 py-4 text-center">
					  <a v-bind:href="editLink + users.id" class="text-purple-800 hover:underline" ><i class="fa fa-pencil"></i></a>
					  <a @click="deleteUser" class="text-purple-800 hover:underline" type="button" data-modal-toggle="authentication2-modal"><i class="fa fa-trash"></i></a>
					   </td>
                </tr>


            </tbody>
        </table>
	</template>
	<template v-else>
	 <table class='mx-auto max-w-4xl w-full whitespace-nowrap rounded-lg bg-white divide-y divide-gray-300 overflow-hidden'>
            <thead class="bg-gray-900">
                <tr class="text-white text-left">
                    <th class="font-semibold text-sm uppercase px-6 py-4"> Name </th>
                    <th class="font-semibold text-sm uppercase px-6 py-4"> Company </th>
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center"> Url </th>
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center"> role </th>
                    <th class="font-semibold text-sm uppercase px-6 py-4"> </th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                <tr>
				<td> <h5><Center>No record found</Center></h5></td>
				</tr>
            </tbody>
        </table>
            </template>
    </div>
</div>
	
	</div>    
  
</template>

<script>
import uniq from 'lodash/uniq'
export default {
    data() {
        return {
			repositories: [],
            user: [],
			usersList: {},
			//repos: {},
            isLoading: false,
			saving: false,
			form : {
				username: '',			
			},
			isSubmitting: false
        };
    },
	 props: [
            'id'
        ],

	mounted(){
		this.getUsersFromDatabase();
		this.getRepositories();
	},
	computed: {
        editLink() {
            return `${window.location.origin}/user/edit/`;
        },
		
	 distinctLanguage () {
    	return uniq(_.filter(this.repositories.map(({ language }) => language)))

		//return _.filter(sourceData, ['is_default', null ]);
  		}

		
	},


	methods: {
		async getUsersFromDatabase() {
            this.isLoading = true;
            try {
             const response= await axios.get(`${window.location.origin}/api/users`);

                if (response.status === 200) {
                    this.isLoading = false;

                    this.usersList = response.data.data
                }
            } catch (error) {}
            this.isLoading = false;
        },

		 async fetchUser() {
            this.isLoading = true;
			let username = this.form.username || [];
            try {
                const response = await axios.get(`https://api.github.com/users/${this.form.username}`);

               // console.log(response);

                if (response.status === 200) {
                    this.isLoading = false;

                    this.user = response.data

					localStorage.setItem('username', username);

					this.getRepositories();
                }
            } catch (error) {}
            this.isLoading = false;
        },

		 getRepositories() {
          //  this.isLoading = true;

		  let username = localStorage.getItem('username') || [];
		
             axios.get(`https://api.github.com/users/${username}/repos`).then(response =>{
               this.repositories = response.data
			 }).catch(err => {
				 console.log(err);
			 });

        
        },

		next() {
				this.saving = true ;
				axios.post(`${window.location.origin}/api/submit-form`, {"name": this.user.name, "company": this.user.company, "url": this.user.url, "repos": this.user.public_repos, "language": this.distinctLanguage})
                    .then(function (response) {
                     window.location = `${window.location.origin}`
                    })
                    .catch((err) => {
                        this.saving = false ;
                      //  console.log(err)
                    });
            },
		deleteUser(){
			let shouldDelete = confirm('Are you sure you want to delete this user');
              if (!shouldDelete) return;
              axios.post(`${window.location.origin}/api/user/delete/${this.id}`, this.company).then(response => {
                      alert("Successfully Deleted !!");
                       window.location = `http://localhost:8000`
                  })
                  .catch(() => {
                      alert('error', "could not delete !!");
                  })
		},

		created() {
		this.fetchUser();
		this.getRepositories();
	},


	}

	
};
</script>


