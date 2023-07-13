<title>My Items</title>
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<style>
        body {
            background-color: white; /* Baby blue background */
            text-align: left; 
        }
       
table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
}

th,
td {
    padding: 10px;
    text-align: left;
    border-bottom: 1px solid #ccc;
}

th {
    background-color: #f2f2f2;
}

/* Form styles */
form {
    margin-bottom: 20px;
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
            <li><a href="#">Outfit</a></li>
            <li><a href="#">Account</a></li>
            <li><a href="#">Logout</a></li>
            <li><div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
            </div></li>
        
        </ul>

    </nav>
    <h3>Wardrobe Items</h3>
    <form action="{{ route('wardrobe.index') }}" method="GET">
    <input type="text" name="search" placeholder="Search by category or description" value="{{ isset($search) ? $search : '' }}" style="width: 25%;">
    <button type="submit">Search</button>
</form>

<form action="{{ route('wardrobe.bulkDelete') }}" method="POST">
    @csrf
    @method('DELETE')
    <table>
        <thead>
            <tr>
                <th><a href="{{ route('wardrobe.index', ['search' => $search, 'sort_by' => 'item']) }}">item</th>
                <th><a href="{{ route('wardrobe.index', ['search' => $search, 'sort_by' => 'category']) }}">Category</th>
                <th>Description</th>
                <th><a href="{{ route('wardrobe.index', ['search' => $search, 'sort_by' => 'date_created']) }}">Date Added</th>
                <th>image</th>
                <th>Actions</th>
        </tr>
    </thead>
            
    @php
$wardrobeItems = $paginator->items();
$totalItems = $paginator->total();
$currentPage = $paginator->currentPage();
$lastPage = $paginator->lastPage()
@endphp
@php
$wardrobeItems = $paginator->items();
if (count($wardrobeItems) > 0) {
    $itemCount = count($wardrobeItems);
    $wardrobeItem = $wardrobeItems[0];
} else {
    $itemCount = 0;
    $wardrobeItem = null;
}
@endphp

    <tbody>
        @foreach ($wardrobeItems as $wardrobeItem)
            <tr>
                <td>{{ $wardrobeItem->item}}</td>
                <td>{{ $wardrobeItem->category }}</td>
                <td>{{ $wardrobeItem->description }}</td>
                <td>{{ $wardrobeItem->date_added }}</td>
                <td><img src="{{ $wardrobeItem->image }}" alt="Wardrobe Item Image" style="max-width: 100px;"></td>
                <td>
                    <a href="{{ route('wardrobe.edit', $wardrobeItem->id) }}">Edit</a>
                    <form action="{{ route('wardrobe.destroy', $wardrobeItem->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                   
                </td>
            
                <td>
                        @php
                        if ($wardrobeItem !== null) {
                            echo "<input type=\"checkbox\" name=\"item_ids[]\" value=\"{{ $wardrobeItem->id }}\">";
                        }
                        @endphp
                    </td>
            
            </tr>
        @endforeach
    </tbody>
</table>
<div class="pagination">
        <p>Showing {{ $paginator->firstItem() }} to {{ $paginator->lastItem() }} of {{ $totalItems }} items</p>
        <p>Page {{ $currentPage }} of {{ $lastPage }}</p>
        {!! $paginator->links() !!}
    </div>
<script>
$(document).ready(function () {
    // Get the pagination links
    var paginationLinks = $(".pagination a");

    // Loop through the pagination links
    paginationLinks.each(function (index, link) {
        // Add the Bootstrap pagination styles to the links
        $(link).addClass("page-link");
    });
});
</script>
<form action="{{ route('wardrobe.index') }}" method="GET">
    <input type="text" name="search" placeholder="Search by category or description" value="{{ isset($search) ? $search : '' }}" style="width: 25%;">
    <select name="sort_by">
        <option value="category"{{ isset($sortBy) && $sortBy === 'category' ? ' selected' : '' }}>Sort by Category</option>
        <option value="date_created"{{ isset($sortBy) && $sortBy === 'date_created' ? ' selected' : '' }}>Sort by Date Created</option>
        <option value="item"{{ isset($sortBy) && $sortBy === 'item' ? ' selected' : '' }}>Sort by Item</option>
    </select>
    <button type="submit">Sort</button>
</form>


<button type="submit" class="btn btn-danger" disabled>Delete Selected</button>
    @php
    if ($wardrobeItem !== null) {
        echo "<p class=\"mt-3\">Are you sure you want to delete <strong>{{ $itemCount }}</strong> item(s)?</p>";
    }
    @endphp
</form>
</body>


