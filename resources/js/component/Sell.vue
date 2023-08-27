<template>
  <div class="container">
    <br />
    <div class="row">
      <div class="col-md-12">

        <div class="card">
            <div class="card-header">
              <i class="bi bi-graph-up-arrow"></i> Sell
              <button class="btn btn-primary btn-sm" style="float: right;" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                <i class="bi bi-plus-circle-dotted"></i>
              </button>
              

            </div>
            <div class="card-body">
              

              <DataTable></DataTable>


            </div>
          </div>

      </div>
    </div>


    
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
  <div class="offcanvas-header">
    <h5 id="offcanvasRightLabel"><i class="bi bi-bookmark-check"></i> Promote Your Shares</h5>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">


    <div class="card text-dark bg-light mb-3" style="max-width:100%;">
  <div class="card-header"><i class="bi bi-megaphone"></i> Company Shares for Sale!</div>
  <div class="card-body">
    
    <div v-if="showAlert" class="alert alert-success">
      Your promotional advertisement for the sale of shares was added successfully. Please write down your advertisement number <strong style="font-size: 22px;">{{ alertMessage }}</strong> this will allow you to amend and delete your advertisement. 
    </div>

    <form id="SaleForm" @submit.prevent="submitForm">
    
    <div class="row">
      <div class="col-md-12">
       
        <input type="text" v-model="formData.company_name" name="company_name" class="form-control" placeholder="Company Name" required />
      </div>
    </div>
    <br />
    <div class="row">
      <div class="col-md-6">
        <input type="number" v-model="formData.number_of_shares" name="number_of_shares" class="form-control" placeholder="Number Of Shares" required />
      </div>
      <div class="col-md-6">
        <input type="number" v-model="formData.cost_per_share" name="cost_per_share" class="form-control" placeholder="Cost Per Shares" required />
      </div>
    </div>
    <br />
    <div class="row">
      <div class="col-md-12">
        <input type="text" v-model="formData.name" name="name" class="form-control" placeholder="Your Name" required />
      </div>
    </div>
    <br />
    <div class="row">
      <div class="col-md-6">
        <input type="email" v-model="formData.email" name="email" class="form-control" placeholder="Email" required />
      </div>
      <div class="col-md-6">
        <input type="number" v-model="formData.mobile" name="mobile" class="form-control" placeholder="Mobile" required />
      </div>
    </div>
    <br />
    <div class="row">
      <div class="col-md-12">
        <textarea class="form-control" v-model="formData.description" name="description" rows="6" placeholder="Description" required></textarea>
      </div>
    </div>
    <br />
    <div class="row">
      <div class="col-md-12">
        <button type="submit" class="btn btn-primary" style="float: right;"><i class="bi bi-clipboard-check"></i> Sale Your Shares</button>
      </div>
    </div>
  </form>

  </div>
</div>

    



  </div>
</div>


  </div>
</template>
<script>

  import axios from 'axios';
  
  import { ref, onMounted } from 'vue';
  
  import DataTable from './Datatable.vue';


  export default{
    data() {
      
      return {
        formData: {
          adv_type	: 1,
          company_name: '',
          number_of_shares:'',
          cost_per_share:'',
          name:'',
          email:'',
          mobile:'',
          description:''
  
        },
        showAlert:false,
        alertMessage:'Shares Sale Advertise Added!',
        productstemp:null,
        
      };
    }
  ,
    setup(){

      const products = ref([]);

      onMounted(async () => {
      try {
        const response = await axios.get("http://localhost:8000/api/shares");
        const arr = response.data.map(r => ({ id: r.id }));
        console.log(arr);
        products.value = arr; // Assign the value using .value on the ref
        $("#datatable").DataTable();
      } catch (error) {
        console.error(error);
      }
    });

    return {
      products, // Expose the products ref to the template
    };

    },
    components:{
      DataTable
    },
    props:{
      ServerUrl:String
    },
    
  
  methods:{

  

   async submitForm() {
    
    let ApiUrl = `${this.ServerUrl}api/sell/add`;

    console.log(ApiUrl);

    try {
        const response = await axios.post(ApiUrl,this.formData);

        console.log('Response:', response.data.code);

        if(response.data.code == 200)
        {
            this.formData = {
        adv_type	: 1,
        company_name: '',
        number_of_shares:'',
        cost_per_share:'',
        name:'',
        email:'',
        mobile:'',
        description:''

      };

      this.alertMessage=response.data.stock_code;

      this.showAlert=true;

      setTimeout(()=>{

        this.showAlert=false;
        

      },15000);

        }

        // Handle the response data here
      } catch (error) {
        console.error('Error:', error);
        // Handle the error here
      }

    }
  },
  created(){
    

  }



  }

</script>

<style>
.error {
  color: red;
  font-size: 14px;
}
</style>