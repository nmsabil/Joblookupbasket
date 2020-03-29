<form method="POST" action="{{ route('admin.login') }}">
    <p>email<input name="email"></p>

    <p>pass<input name="password" type="password"></p>

    {{ csrf_field() }}
    <button type="submit">Login</button>
</form>
