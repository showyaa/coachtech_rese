<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <div class="reserve_lists"></div>
  <div class="like_lists">
    @foreach($likes as $like)
    <div>{{$like->shop->name}}</div>
    @endforeach
  </div>
</body>
</html>