const baseUrl = 'http://localhost:8000'

const app = Vue.createApp({
  data: function () {
    return {
      title: 'Byte Moment Forum',
      token: '',
      user: {},
      posts: [],
      showNewPost: false,
      showEditPost: false,
      loginForm: {
        email: '',
        password: ''
      },
      postForm: {
        title: '',
        content: ''
      },
      editForm: {
        title: '',
        content: ''
      }
    }
  },
  created: async function () {
    this.token = sessionStorage.getItem('token') || ''
    this.user = JSON.parse(sessionStorage.getItem('user') || {})
    this.getPosts()
  },
  methods: {
    login: async function () {
      try {
        const response = await fetch(`${baseUrl}/login`, {
          method: 'post',
          headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json'
          },
          body: JSON.stringify(this.loginForm)
        })

        const json = await response.json()
        this.token = json.token
        this.user = json.user
        sessionStorage.setItem('token', this.token)
        sessionStorage.setItem('user', JSON.stringify(json.user))
        this.getPosts()

      } catch (error) {
        console.log(error)
      }
    },

    getPosts: async function () {
      try {
        // if (this.user.id && this.token) {
        // baseaUrl/api/users/{id}/posts
        const response = await fetch(`${baseUrl}/api/users/${this.user.id}/posts`, {
          method: 'get',
          headers: {
            'Accept': 'application/json',
            'Authorization': `Bearer ${this.token}`
          }
        })
        this.posts = await response.json()
        // }

      } catch { error } {
        console.log(error)
      }


    },
    addPost: async function () {
      try {
        // url: baseUrl/api/users/{id}/posts
        const response = await fetch(`${baseUrl}/api/users/${this.user.id}/posts`, {
          method: 'post',
          headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
            'Authorization': `Bearer ${this.token}`
          },
          body: JSON.stringify(this.postForm)
        })

        const json = await response.json()
        this.posts.push(json)
        this.showNewPost = false

      } catch (error) {
        console.log(error)
      }


    },
    editPost: function (post) {
      this.editForm.title = post.title;
      this.editForm.content = post.content;
      this.editForm.id = post.id;

      // Show the edit post form
      this.showEditPost = true;


    },
    updatePost: async function () {
      try {
        const response = await fetch(`${baseUrl}/api/users/${this.user.id}/posts/${this.editForm.id}`, {
          method: 'put',
          headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
            'Authorization': `Bearer ${this.token}`
          },
          body: JSON.stringify(this.editForm)
        })

        const updatedPost = await response.json();

        // Find the index of the updated post in the posts array
        const index = this.posts.findIndex(post => post.id === updatedPost.id);

        if (index !== -1) {
          // Update the posts array with the updated post
          this.posts.splice(index, 1, updatedPost);
        }

        // Hide the edit post form
        this.showEditPost = false;

      } catch (error) {
        console.log(error);
      }

    },
    // deletePost: async function (post) {
    //   try {
    //     const response = await fetch(`${baseUrl}/api/users/${this.user.id}/posts/${post.id}`, {
    //       method: 'delete',
    //       headers: {
    //         'Authorization': `Bearer ${this.token}`
    //       }
    //     });

    //     if (response.ok) {
    //       // Remove the deleted post from the posts array
    //       this.posts = this.posts.filter(n => n.id !== post.id);
    //     }

    //   } catch (error) {
    //     console.log(error);
    //   }
    // },
    deletePost: async function (post) {
      try {
        const response = await fetch(`${baseUrl}/api/users/${this.user.id}/posts/${post.id}`, {
          method: 'DELETE',
          headers: {
            'Authorization': `Bearer ${this.token}`
          }
        });
        if (response.ok) {
          this.posts = this.posts.filter(i => i.id !== post.id)
        }
      } catch (error) {
        console.log(error)
      }


    },
    getComments: async function (user_id, post_id) {
      try {
        const response = await fetch(`${baseUrl}/api/users/${user_id}/posts/${post_id}/comments`, {
          method: 'get',
          headers: {
            'Accept': 'application/json',
            'Authorization': `Bearer ${this.token}`
          }
        });

        if (response.ok) {
          const comments = await response.json();
          this.comments = comments;
        }

      } catch (error) {
        console.log(error);
      }
    },


    logout: async function () {
      sessionStorage.removeItem('token');
      sessionStorage.removeItem('user');

      // Clear data
      this.token = '';
      this.user = {};
      this.posts = [];

      window.location.href = '/login';



    }

  }
})

app.mount('#app')
