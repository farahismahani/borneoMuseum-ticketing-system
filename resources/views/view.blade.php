@extends('layouts.app')

@section('content')
    <h1>Edit Form</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('form.update', $form->id) }}" method="POST">
        @csrf
        @method('PUT') <!-- This is important for PUT requests -->
        
        <div class="form-group">
            <label for="name">Full Name:</label>
            <input type="text" id="name" name="name" value="{{ old('name', $form->name) }}" required>
        </div>
        
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="{{ old('email', $form->email) }}" required>
        </div>
        
        <div class="form-group">
            <label for="type">Ticket Type:</label>
            <select id="type" name="type" required>
                <option value="Adult" {{ $form->type == 'Adult' ? 'selected' : '' }}>Adult</option>
                <option value="Teenager/Student" {{ $form->type == 'Teenager/Student' ? 'selected' : '' }}>Teenager/Student</option>
                <option value="Family" {{ $form->type == 'Family' ? 'selected' : '' }}>Family</option>
            </select>
        </div>
        
        <div class="form-group">
            <label for="nationality">Nationality:</label>
            <select id="nationality" name="nationality" required>
                <option value="sarawakian-malaysian" {{ $form->nationality == 'sarawakian-malaysian' ? 'selected' : '' }}>Sarawakian Malaysian</option>
                <option value="non-sarawakian -malaysian" {{ $form->nationality == 'non-sarawakian-malaysian' ? 'selected' : '' }}>Non-Sarawakian Malaysian</option>
                <option value="foreigner" {{ $form->nationality == 'foreigner' ? 'selected' : '' }}>Foreigner</option>
            </select>
        </div>
        
        <div class="form-group">
            <label for="date">Date:</label>
            <input type="date" id="date" name="date" value="{{ old('date', $form->date) }}" required>
        </div>
        
        <div class="form-group">
            <label for="time">Time:</label>
            <input type="time" id="time" name="time" value="{{ old('time', $form->time) }}" required>
        </div>
        
        <div class="form-group">
            <label for="quantity">Quantity:</label>
            <input type="number" id="quantity" name="quantity" value="{{ old('quantity', $form->quantity) }}" required>
        </div>
        
        <button type="submit" class="btn btn-primary">Update</button>
    </form>

    <form action="{{ route('forms.destroy', $form->id) }}" method="POST" style="margin-top: 20px;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete</button>
    </form>
@endsection