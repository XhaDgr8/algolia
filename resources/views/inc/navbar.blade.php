<!-- Image and text -->

<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
  <div class="container">
    {{-- Logo --}}
    <a class="navbar-brand" href="/">
      <img src="{{asset('storage/siteAssets/logo.png')}}" width="auto" height="30" 
        class="d-inline-block align-top" alt="" loading="lazy">
    </a>
    {{-- Logo End --}}

    {{-- Expander Button --}}
    <button class="navbar-toggler" type="button" data-toggle="collapse" 
      data-target="#navControlles"
      aria-controls="navControlles" 
      aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    {{-- Expander Button End --}}

    <div class="collapse navbar-collapse" id="navControlles">
      <ul class="navbar-nav mr-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/search">Search</a>
        </li>
      </ul>
      <form class="d-flex">
        <input class="form-control mr-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>