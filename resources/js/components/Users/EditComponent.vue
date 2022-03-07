<template>
    <div>

<div class="min-h-screen bg-red-800 py-5">
    <div class='overflow-x-auto w-full'>
	
		<!-- Create Main modal -->
				<div id="" aria-hidden="true" style="margin: 0 auto; width: 30%;" class=" h-modal md:h-full md:inset-0">
					<div class="relative px-4 w-full max-w-md h-full md:h-auto">
						<!-- Modal content -->
						<div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
							<div class="flex justify-end p-2">
								<button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white">
									<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>  
								</button>
							</div>
							
							<form @submit.prevent="update()" class="px-6 pb-4 space-y-6 lg:px-8 sm:pb-6 xl:pb-8">
								<h3 class="text-xl font-medium text-gray-900 dark:text-white">Edit Developer</h3>
								<div>
									<input type="hidden" name="id" id="name" placeholder="id" v-model="user.id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" >
								</div>
								<div>
									<label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Name</label>
									<input type="text" name="name" id="name" placeholder="name" v-model="user.name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" >
								</div>
								<div>
									<label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Company</label>
									<input type="text" name="company" id="company"  placeholder="company" v-model="user.company" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" >
								</div>
								<div>
									<label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">No of Repos</label>
									<input type="text" name="repos" id="repos"  placeholder="company" v-model="user.repos" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" >
								</div>
								<div>
									<label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Url</label>
									<input type="text" name="url" id="url"  placeholder="url" v-model="user.url" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" >
								</div>
								<button type="submit"  class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
							</form>
						</div>
					</div>
				</div>
			

			
	
        
	
    </div>
</div>
	
	</div>  
	</template>  
  


<script>

export default {
    data() {
        return {
			user: [],
            isLoading: false,
			saving: false,
			form: {
				id: ''
			},
			isSubmitting: false
			//repos: this.repo,
			
			
        };
    },
	 props: [
            'id'
        ],

	mounted(){
		this.fetchUserById();
	},


    methods: {
		 async fetchUserById() {
            this.isLoading = true;
            try {
                const response = await axios.get(`${window.location.origin}/api/user/edit/${this.id}`);
                if (response.status === 200) {
                    this.isLoading = false;

                    this.user = response.data
                }
            } catch (error) {}
            this.isLoading = false;
        },

		update() {
				this.saving = true ;
				axios.post(`${window.location.origin}/api/user/update/${this.id}`, {"name": this.user.name, "company": this.user.company, "url": this.user.url, "repos": this.user.repos})
                    .then(function (response) {
					 window.location = `${window.location.origin}`
                    })
                    .catch((err) => {
                        this.saving = false ;
                
                    });
            },

	
    }
};
</script>


