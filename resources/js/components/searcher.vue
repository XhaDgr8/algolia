<template>
  <ais-instant-search
    index-name="data"
    :search-client="searchClient" >
    <!-- Widgets -->
    
      <ais-search-box>
        <div slot-scope="{ currentRefinement, isSearchStalled, refine }">
          <input
            type="search" class="form-control mb-5"
            v-model="currentRefinement"
            @input="refine($event.currentTarget.value)"
          >
          <span :hidden="!isSearchStalled">Loading...</span>
        </div>
      </ais-search-box>


      
      <ais-infinite-hits>
        <div class="row" slot-scope="{ items, refinePrevious, refineNext }">

          <div class="col-md-4 mb-3" v-for="item in items" :key="item.objectID">
            <div class="container shadow-sm border border-info rounded-lg">
                <div class="row bg-light">
                    <div class="row mx-auto border-bottom shadow-sm">
                        <div class='col-4 p-2'><img class='img-fluid' v-bind:src='item.b_image'></div>
                        <div class="col-8 pt-2">
                            <h5>{{ item.b_name }}</h5>
                        </div>
                    </div>
                    <div class='col-12'>
                        <ul class='m-1'>
                            <li>Addr: {{ item.b_address }}</li>
                            <li>Email: {{ item.b_email }}</li>                                                
                            <li>Ph.no-1: {{ item.b_number_1 }}</li>
                            <li>Ph.no-2: {{ item.b_number_2 }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
          <button class="float-left btn btn-primary shadow-sm" @click="refinePrevious">
            Show previous results
          </button>
          <button class="float-right btn btn-primary shadow-sm" @click="refineNext">
            Show more results
          </button>
        </div>

      </div>
        
      </ais-infinite-hits>

  </ais-instant-search>
</template>

<script>
  import algoliasearch from 'algoliasearch/lite';

  export default {
    data() {
      return {
        searchClient: algoliasearch(
          'DQUMVY86B5',
          '42e01a3effe028fc0042d169e1f20fe1'
        ),
      };
    },
    methods: {
      transformItems(items) {
        return items.map(item => ({
          ...item,
          name: item.name.toUpperCase(),
        }));
      },
    },
  };
</script>
