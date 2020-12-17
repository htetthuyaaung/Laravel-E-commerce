<template>
  <div class="container my-5">
    <!--create-->
    <div class="row justify-content-end mb-5">
      <div class="col-4">
        <button class="btn btn-primary" @click="create">
          <i class="fas fa-plus-circle mr-1"></i>Create
        </button>
      </div>
      <div class="col-4">
        <form @submit.prevent="view">
          <div class="input-group">
            <input v-model="search" type="text" placeholder="Search" class="form-control" />
            <div class="input-group-append">
              <button type="submit" class="btn btn-primary">
                <i class="fas fa-search"></i>
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
    <!--end create-->
    <!--table-->
    <div class="row">
      <div class="col-4">
        <div class="card">
          <div class="card-header">
            <h3>{{isEditMode? 'Edit': 'Create'}}</h3>
          </div>
          <div class="card-body">
            <alert-error :form="product" v-bind:message="message"></alert-error>
            <form @submit.prevent="isEditMode? update() : store()">
              <div class="form-group">
                <label for>Name:</label>
                <input
                  v-model="product.name"
                  type="name"
                  name
                  class="form-control"
                  :class="{ 'is-invalid': product.errors.has('name') }"
                />
                <has-error :form="product" field="name"></has-error>
              </div>
              <div class="form-group">
                <label for>Price:</label>
                <input
                  v-model="product.price"
                  type="number"
                  name
                  class="form-control"
                  :class="{ 'is-invalid': product.errors.has('price') }"
                />
                <has-error :form="product" field="price"></has-error>
              </div>

              <button class="btn btn-primary" type="submit">
                <i class="fas fa-save mr-1"></i>Save
              </button>
            </form>
          </div>
        </div>
      </div>
      <div class="col-8">
        <table class="table">
          <thead>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Price</th>
              <th>Action</th>
            </tr>
          </thead>

          <tbody>
            <tr v-for="product in products.data" :key="product.id">
              <td>{{ product.id }}</td>
              <td>{{ product.name }}</td>
              <td>{{ product.price }}</td>
              <td>
                <button class="btn btn-success btn-sm" @click="edit(product)">
                  <i class="fas fa-edit mr-1"></i> Edit
                </button>
                <button class="btn btn-danger btn-sm" @click="destroy(product.id)">
                  <i class="fas fa-trash-alt mr-1"></i> Delete
                </button>
              </td>
            </tr>
            <!-- <tr>
                           <td>1</td>
                           <td>Oishi</td>
                           <td>200</td>
                           <td>
                               <button class="btn btn-success btn-sm">
                                    <i class="fas fa-edit mr-1"></i>  Edit
                                </button>
                               <button class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash-alt mr-1"></i>  Delete 
                               </button>
                           </td>
            </tr>-->
          </tbody>
        </table>
        <pagination :data="products" @pagination-change-page="view"></pagination>
      </div>
    </div>
    <!--table end-->

    <!--loading-->
      
    <!--loading end-->
  </div>
</template>

<script>

export default {
  name: "ProductComponent",
   
  data() {
    return {
     
      isEditMode: false,
      products: {},
      search: "",
      message: "",
      product: new Form({
        id: "",
        name: "",
        price: ""
      })
    };
  },
   
  methods: {
    // searchProduct(){
    //     axios.get('/api/product?search=' + this.search)
    //     .then(response=>{
    //     this.products = response.data
    //         })
    // },
    view(page = 1) {
      //  axios.get('/api/product?page=' +page)
        this.$Progress.start();
        let loader = this.$loading.show({
            color:'#3490dc',
            height:'50px',
            width:'50px',
            blur:'5px'
        });
                
      axios
        .get(`/api/product?page=${page}&search=${this.search}`)
        .then(response => {
          this.products = response.data;
           this.$Progress.finish();
            loader.hide();
        })
        .catch(error=>{
            this.$Progress.fail();
            loader.hide();
        });
    },
    create() {
      this.product.clear();
      this.isEditMode = false;
      // this.product.id = '';
      // this.product.name ='';
      // this.product.price = '';

      this.product.reset();
    },
    store() {
      this.product
        .post("/api/product")
        .then(response => {
          this.view();
          // this.product.id = '';
          // this.product.name = '';
          // this.product.price = '';
          this.product.reset();
           Toast.fire({
              icon: "success",
              title: "Created successfully"
            });
        })
        .catch(error => {
          this.message = error.response.data.message;
        });
    },
    edit(product) {
      this.product.clear();
      this.isEditMode = true;
      this.product.fill(product);
      // this.product.id = product.id;
      // this.product.name = product.name;
      // this.product.price = product.price;
    },
    update() {
      this.product.put(`/api/product/${this.product.id}`).then(response => {
        this.view();
        // this.product.id = "";
        // this.product.name = "";
        // this.product.price = "";
          this.product.reset();
         Toast.fire({
              icon: "success",
              title: "Updated successfully"
            });
      });
    },
    destroy(id) {
      Swal.fire({
        title: "Are you sure?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!"
      }).then(result => {
        if (result.isConfirmed) {
          axios.delete(`/api/product/${id}`).then(response => {
            this.view();
            Swal.fire({
              title: "Deleted!",
              icon: "success"
            });
            Toast.fire({
              icon: "success",
              title: "Deleted successfully"
            });
          });
        }
      });
    }
  },

  created() {
    this.view();
  }
};
</script>

