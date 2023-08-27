<template>
  <div>
    <br />
    <div class="container">
      <div class="row">

        <div class="col-md-6">

          <div class="card">
            <div class="card-header">
              <i class="bi bi-graph-up-arrow"></i> Sell
              <button class="btn btn-primary btn-sm" style="float: right;" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"><i class="bi bi-folder-plus"></i></button>

            </div>
            <div class="card-body">
              <h5 class="card-title">500000+ Shares For Sale!</h5>
              <p class="card-text">Access Seller Central Create an account and begin exploring, selling and much more.</p>
              <a href="#" class="btn btn-primary"><i class="bi bi-arrow-up-right-square"></i> Go Seller Central </a>
            </div>
          </div>

        </div>

        <div class="col-md-6">

          <div class="card">
            <div class="card-header">
              <i class="bi bi-graph-down-arrow"></i> Buy
              <button class="btn btn-primary btn-sm" style="float: right;" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"><i class="bi bi-folder-plus"></i></button>

            </div>
            <div class="card-body">
              <h5 class="card-title">6580+ Shares Sold Today</h5>
              <p class="card-text">Go to Market Index, sign in using your account, and start buying shares as you wish.</p>
              <a href="#" class="btn btn-primary"><i class="bi bi-arrow-up-right-square"></i> Go to Market Index</a>
            </div>
          </div>

        </div>

      </div>
      <br />
      <div class="row">
        <div class="col-md-6">

          <div class="card">
            <div class="card-header">
              <i class="bi bi-diagram-3"></i> Auction
              <button class="btn btn-primary btn-sm" style="float: right;" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"><i class="bi bi-folder-plus"></i></button>

            </div>
            <div class="card-body">
              <h5 class="card-title">250+ Shares listed for Auction</h5>
              <p class="card-text">Simply go to the auction portal and bid your price to purchase shares. </p>
              <a href="#" class="btn btn-primary"><i class="bi bi-arrow-up-right-square"></i> Go Auction Portal</a>
            </div>
          </div>

        </div>

        <div class="col-md-6">

          <div class="card">
            <div class="card-header">
              <i class="bi bi-people-fill"></i> Agents 
              <button class="btn btn-primary btn-sm" style="float: right;" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"><i class="bi bi-folder-plus"></i></button>

            </div>
            <div class="card-body">
              <h5 class="card-title">125+ Registered Stock Agents</h5>
              <p class="card-text">Contact with stock market agents easily via agent port.</p>
              <a href="#" class="btn btn-primary"><i class="bi bi-arrow-up-right-square"></i> Go to Agents Portal</a>
            </div>
          </div>

        </div>

      </div>
    </div>
  </div>
</template>

<script>

import { ref, onMounted, onUpdated, onBeforeUnmount } from 'vue';


export default {
  components:{
   
  },
  props: {
    AppName:String
  },
  data() {
    return {
      // variable1: 'Hello',
      // variable2: 'World',
      // colorList: ['Red', 'Green', 'Blue', 'Yellow', 'Orange'],
      //AppName: 'StockifyTrade'
    };
  }
  ,setup()
  {
    onMounted(() => {
      console.log('Component mounted');
    });

    onUpdated(() => {
      console.log('Component updated');
    });

    onBeforeUnmount(() => {
      console.log('Component will unmount');
    });
  }
};
</script>