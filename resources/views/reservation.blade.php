<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>予約情報</title>
  <link rel="stylesheet" href="/css/reset.css">
  <link rel="stylesheet" href="/css/reservation.css">
</head>

<body>
  @include('layouts.header')
  <main>
    <div class="content">
      @if($admin->shops != null)
      <div class="all-reservations">
        @foreach($admin->shops as $shop)
        <div class="reservations">
          <p class="shop_name">{{$shop->name}}</p>
          <table>
            <tr>
              <td>予約時間</td>
              <td>お名前</td>
              <td>人数</td>
            </tr>
            @foreach($shop->reservations as $reservation)
            <tr>
              <td>{{\Carbon\Carbon::parse($reservation->start_at)->format("m/d H:i")}}</td>
              <td>{{$reservation->user->name}}</td>
              <td>{{$reservation->num_of_users}}</td>
            </tr>
            @endforeach
          </table>
        </div>
        @endforeach
      </div>
      @endif
    </div>

  </main>
</body>

</html>