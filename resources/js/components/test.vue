<template>
  <ais-instant-search
    index-name="instant_search"
    :search-client="searchClient"
  >
    <!-- Widgets -->
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
  };
</script>
