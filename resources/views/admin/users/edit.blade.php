@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit User</h2>
    <form method="POST" action="{{ route('admin.users.update', $user->id) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="name" value="{{ $user->name }}" class="form-control">
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" value="{{ $user->email }}" class="form-control">
        </div>
        <div class="mb-3">
            <label>Role</label>
            <select name="role" class="form-control">
                <option value="guru" {{ $user->role === 'guru' ? 'selected' : '' }}>Guru</option>
                <option value="orangtua" {{ $user->role === 'orangtua' ? 'selected' : '' }}>Orangtua</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Password (biarkan kosong jika tidak diubah)</label>
            <input type="password" name="password" class="form-control">
        </div>
        <button class="btn btn-success">Update</button>
    </form>
</div>
@endsection
