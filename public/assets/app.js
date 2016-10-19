Vue.http.headers.common['X-CSRF-TOKEN'] = document.getElementById('X-CSRF-TOKEN').getAttribute('content');

new Vue({
    
    el: '#searchPage',
    data: {

        query: '',
        users: [],
        
    },
    methods: {
        search: function() {
            
            if (this.query.length < 3)
            {
                this.users = [];
                return false;
            }
            
            this.$http.post('/public/', { query: this.query } ).then(function(response) {
                    this.users = response.body.users;
                }, function(response) {
                    // error callback
                });
        },
    },
});