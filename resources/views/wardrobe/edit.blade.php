<title>Edit Item</title>
<head>
<style>
    body {
        background-color: white; /* Baby blue background color */
    }

    .form-container {
        max-width: 500px; /* Adjust the form container width as needed */
        margin: 30px auto; /* Increase the margin for vertical spacing */
        padding: 60px 10px; /* Increase the padding for vertical spacing */
        background-color: #fff;
        border: 1px solid #ddd;
        border-radius: 5px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        display: flex;
        flex-direction: column;
        gap: 10px;
    }
    .form-container label {
        display: block;
    }

    .form-container input[type="text"],
    .form-container textarea {
        width: 80%;
        padding: 8px;
        border: 1px solid #ddd;
        border-radius: 4px;
    }
    .form-container button[type="submit"] {
        padding: 4px 8px; /* Adjust the padding to reduce button size */
        font-size: 14px; /* Adjust the font size as needed */
    }
    label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
}

input[type="text"],
textarea {
    width: 100%;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

button[type="submit"] {
    background-color: black;
    color: #fff;
    padding: 10px 16px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

 nav {
            background-color: #e6f7ff; 
            padding: 10px 0;
            text-align:right;
        
        }
  nav ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }
 nav ul li {
            display: inline-block;
        }

 nav ul li a {
            display: block;
            padding: 10px 30px;
            text-decoration: none;
            color: black; /* Black links */
            transition: color 0.3s ease; /* Transition color change on hover */
        }

 nav ul li a:hover {
            color: green; /* Green links on hover */
        }

 .container {
            margin-top: 20px; /* Adjust the margin as needed */
        }

 .sub-menu {
            display: none;
            position: absolute;
            background-color: #fff; 
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2); 
            padding: 10px;
            min-width: 120px; 
            z-index: 1;
        }

.has-submenu:hover .sub-menu {
            display: block;
        }

    </style>
</head>
<body>
    <nav>
        <ul>
            <li><a href="{{ route('home') }}">Home</a></li>
            <li class="has-submenu">
                <a href="#" class="submenu-toggle">Wardrobe</a>
                <ul class="sub-menu">
                    <li><a href="{{ route('wardrobe.create') }}">Create</a></li>
                    <li><a href="{{ route('wardrobe.index') }}">My Items</a></li>
                </ul>
            </li>
            <li><a href="{{ route('outfit.create') }}">Outfit</a></li>
            <li><a href="#">Account</a></li>
            <li><a href="#">Logout</a></li>
            <li><div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
            </div></li>
        
        </ul>

    </nav>
    <h3 style="text-align: center;">Edit Item</h3>
<form action="{{ route('wardrobe.update', $wardrobeItem->id) }}" method="POST">
    @csrf
    @method('PATCH')
    <div class="form-container">
        <div>
            <label for="category">Category:</label>
            <input type="text" name="category" id="category" value="{{ $wardrobeItem->category }}" required>
        </div>
        <div>
            <label for="description">Description:</label>
            <textarea name="description" id="description" rows="4" required>{{ $wardrobeItem->description }}</textarea>
        </div>
        <div>
            <label for="date_added">Date Added:</label>
            <input type="date" name="date_added" id="date_added" value="{{ $wardrobeItem->date_added }}" required>
        </div>
        <button type="submit">Update</button>
    </div>
</form>




