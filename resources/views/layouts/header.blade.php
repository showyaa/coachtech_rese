<link rel="stylesheet" href="/css/reset.css">
<link rel="stylesheet" href="/css/header.css">
<header>
  <nav class="nav" id="nav">
    @if(Auth::check())
    <ul class="outline">
      <li><a href="/">Home</a></li>
      <li><a href="/logout">Logout</a></li>
      <li><a href="/mypage">Mypage</a></li>
      <li><a href="/review">Review</a></li>
    </ul>
    @else
    <ul class="outline">
      <li><a href="/">Home</a></li>
      <li><a href="/register">Register</a></li>
      <li><a href="/login">Login</a></li>
    </ul>
    @endif
  </nav>
  <div class="menu" id="menu">
    <span class="menu__line--top"></span>
    <span class="menu__line--middle"></span>
    <span class="menu__line--bottom"></span>
  </div>
  <div class="title"><a href="/index.php">Rese</a></div>
</header>
<script src="/js/header.js"></script>