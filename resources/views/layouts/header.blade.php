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
      @can('isManager')
      <li><a href="">店舗作成</a></li>
      <li><a href="/admin/register">店舗代表者作成</a></li>
      @elsecan('isAdmin')
      <li><a href="/admin">店舗作成・更新</a></li>
      @endcan
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
  @can('isAdmin')
  <div class="confirm_reservation"> <a href="/admin/reservation">予約情報</a> </div>
  @endcan
  @can('isManager')
  <div class="confirm_reservation"> <a href="/admin/reservation">予約情報</a> </div>
  @endcan
</header>
<script src="/js/header.js"></script>