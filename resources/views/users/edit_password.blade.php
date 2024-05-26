@extends('layouts.app')

@section('content')
<div>
  <form method="POST" action="{{route('mypage.update_password')}}">
    @csrf
    <input type="hidden" name="_method" value="PUT">
    <div>
      <lavel for="password">新しいパスワード</label>

            <div class="">
                <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                @error('password')
                <span class="" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="">
            <label for="password-confirm" class="">確認用</label>

            <div class="">
                <input id="" type="password" class="" name="password_confirmation" required autocomplete="new-password">
            </div>
        </div>

        <div class="">
            <button type="submit" class="btn">
                パスワード更新
            </button>
        </div>
    </form>
</div>
@endsection