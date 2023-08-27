<template>
    <div>
      <table id="datatable">
        <thead>
          <tr>
            <th>Company</th>
            <th>Number Of Shares</th>
            <th>Cost Per Shares</th>
            <th>Total</th>
            <th>Contact Person</th>
            <th>Action</th>
            <!-- Add more column headers here -->
          </tr>
        </thead>
        <tbody>
          <tr v-for="product in products" :key="product.id">
            <td>{{ product.company_name }}</td>
            <td>{{ product.number_of_shares }}</td>
            <td>${{ product.cost_per_share }}</td>
            <td>${{ product.cost_per_share * product.number_of_shares }} </td>
            <td>{{ product.name }}</td>
            <td>

                <button class="btn btn-primary"  @click="ClickViewAds(product)"  type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                    <i class="bi bi-eye"></i>
                </button>
            </td>
            <!-- Add more column data here -->
          </tr>
        </tbody>
      </table>

      <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasExampleLabel"><i class="bi bi-bookmark-check"></i> Shares Information</h5>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">

        <div class="card text-dark bg-light mb-3" style="width: 100%;">
        <div class="card-header"><i class="bi bi-megaphone"></i> {{ NumberOfShares }} Shares for Sale!</div>
        <div class="card-body">
            <h5 class="card-title">{{ CompanyName }}</h5>
                <p></p>
                <p>Number Of Shares: {{ NumberOfShares }}</p>

                <p>Per Share Cost: ${{ PerShareCost }}</p>

                <p>Total Cost: ${{ NumberOfShares *  PerShareCost}}</p>
        </div>
        </div>

        <div class="card text-dark bg-light mb-3" style="width: 100%;">
            <div class="card-header"><i class="bi bi-bag-check"></i> Make Your Bid</div>
            <div class="card-body">
                <form v-on:submit="">

                    <div class="row">
                        <div class="col-md-6">
                            <label>Shares Qty</label>
                            <input type="number" class="form-control input-sm" placeholder="Shares" required />
                        </div>
                        <div class="col-md-6">
                            <label>Cost Per Share</label>
                            <input type="number" class="form-control input-sm" placeholder="Cost Pes Share" required />
                        </div>
                        <div class="col-md-12">
                            <label>Email</label>
                            <input type="email" class="form-control input-sm" placeholder="Buyer Email" required />
                        </div>
                        <div class="col-md-12">
                            <br />
                            <button class="btn btn-primary" style="float: right;"><i class="bi bi-clipboard-check"></i> Bid Now</button>
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
  import { ref, onMounted, nextTick  } from 'vue';
  import axios from 'axios';
  import 'datatables.net-dt/js/dataTables.dataTables';
  import 'datatables.net-dt/css/jquery.dataTables.min.css';

  import * as $ from 'jquery'; // Import jQuery using ES6 import
  window.$ = window.jQuery = $;
  
  export default {
    data() {
    return {
      CompanyName:'',
      CreatedAt:'',
      NumberOfShares:0,
      PerShareCost:0,
      SellerName:'',
      SellerEmail:'',
      SellerPhone:''
    };
  },
    setup() {
      const products = ref([]);
  
      onMounted(async () => {
        try {
          const response = await axios.get("http://localhost:8000/api/shares");

          const arr = response.data.map(r => (r));

          products.value = arr;
  
          $(document).ready(() => {
      $("#datatable").DataTable();
    });
        } catch (error) {
          console.error(error);
        }
      });
  
      return {
        products,
      };
    },
    methods:{
    ClickViewAds(resp)
   {
        this.CompanyName = resp.company_name;

        const date = new Date(resp.created_at);

        const year = date.getFullYear();

        const month = String(date.getMonth() + 1).padStart(2, '0'); 
      
        const day = String(date.getDate()).padStart(2, '0'); 
      
        this.CreatedAt = month+"/"+day+"/"+year;

        this.SellerName = resp.name;

        this.SellerEmail = resp.email;

        this.SellerPhone = resp.mobile;

        this.NumberOfShares = resp.number_of_shares;

        this.PerShareCost = resp.cost_per_share;
   },
    }
  };
  </script>
  
  <style>
  /* Add your styling here */
  </style>
  