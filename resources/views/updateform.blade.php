<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buy Ticket Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }
        .form-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            margin: auto;
        }
        h2 {
            text-align: center;
        }
        .form-group {
            margin-bottom: 20px; /* Increased margin for better spacing */
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input, select {
            width: 100%;
            padding: 12px; /* Increased padding for a neater look */
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box; /* Ensures padding is included in width */
        }
        button {
            width: 100%;
            padding: 12px; /* Increased padding for the button */
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px; /* Increased font size for better readability */
        }
        button:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>

    <!-- Heading -->
<h1 class="display-4 fw-bold text-center"><br><strong>Update Feedback Form</strong><br><br></h1>
<div class="form-container">
    <h2>Buy Ticket</h2>
    <form action="{{route('update', $data->id)}}" method="POST"> class='Form'>
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="name">Full Name:</label>
            <input type="text" id="name" name="name" value="{{$data->name}}" disabled>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="{{$data->email}}" disabled>
        </div>
        <div class="form-group">
            <label for="t_type">Ticket Type:</label>
            <select id="t_type" name="t_type">
                <option value="">Select a ticket type</option>
                <option value="Adult">Adult</option>
                <option value="Teenager/Student">Teenager/Student</option>
                <option value="Family">Familiy</option>
            </select>
        </div>
        <div class="form-group">
            <label for="nationality">Nationality:</label>
            <select id="nationality" name="nationality" disabled>
                <option value="">Select your nationality</option>
                <option value="sarawakian-malaysian">Sarawakian Malaysian</option>
                <option value="non-sarawakian-malaysian">Non-Sarawakian Malaysian</option>
                <option value="foreigner">Foreigner (International)</option>
            </select>
        </div>
        <div class="form-group">
            <label for="date">Event Date:</label>
            <input type="date" id="date" name="date" value= "{{$data->date}}">
        </div>
        <div class="form-group">
            <label for="time">Event Time:</label>
            <input type="time" id="time" name="time" value= "{{$data->time}}">
        </div>
        <div class="form-group">
            <label for="quantity">Quantity:</label>
            <input type="number" id="quantity" name="quantity" min="1" max="10" value= "{{$data->quantity}}">
        </div>
        <button type="submit" name="update">Update</button>
    </form>
</div>

</body>
</html>