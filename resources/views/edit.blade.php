<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>店舗編集</title>
  <link rel="stylesheet" href="/css/reset.css">
  <link rel="stylesheet" href="/css/edit.css">
</head>

<body>
  @include('layouts.header')
  <main>
    <div class="content">
      <div class="edit">
        <div class="shop_name">{{$shop->name}}</div>
        <form action="/edit/update?id={{$shop->id}}" method="post">
          @csrf
          <table>
            <div class="form-item">
              <p>店名</p>
              <input type="text" name="name" value="{{$shop->name}}">
            </div class="form-item">
            @can('isManager')
            <div class="form-item">
              <p>店舗代表者</p>
              <select name="user_id" id="">
                <option value="{{$shop->user_id}}">{{$shop->user->name}}</option>
                @foreach($admins as $admin)
                <option value="{{$admin->id}}">{{$admin->name}}</option>
                @endforeach
              </select>
            </div class="form-item">
            @endcan
            <div class="form-item">
              <p>都道府県</p>
              <select name="area_id" id="">
                <option value="{{$shop->area->id}}">{{$shop->area->area}}</option>
                @foreach($areas as $area)
                <option value="{{$area->id}}">{{$area->area}}</option>
                @endforeach
              </select>
            </div class="form-item">
            <div class="form-item">
              <p>ジャンル</p>
              <select name="genre_id" id="">
                <option value="{{$shop->genre->id}}">{{$shop->genre->genre}}</option>
                @foreach($genres as $genre)
                <option value="{{$genre->id}}">{{$genre->genre}}</option>
                @endforeach
              </select>
            </div class="form-item">
            <div class="form-item">
              <p>店舗概要</p>
              <textarea name="description" id="" cols="30" rows="10">{{$shop->description}}</textarea>
            </div class="form-item">
            <div class="form-item">
              <p>店舗画像(url)</p>
              <input type="text" name="image_url" value="{{$shop->image_url}}">
            </div class="form-item">
          </table>
          <div class="update_submit">
            <input type="submit" class="update_btn" value="更新">
          </div>
        </form>
      </div>
    </div>
  </main>
</body>

</html>