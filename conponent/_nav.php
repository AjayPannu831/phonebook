<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <title>Contact list</title>
</head>
<body>
    <?php
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
        $loggedin = true;
    } else {
        $loggedin = false;
    }
    ?>
    <div class="">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="./welcome.php">Home</a>
                        </li>
                        <?php if (!$loggedin) { ?>
                            <li class="nav-item">
                                <a class="nav-link" href="./signup.php">Sign Up</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="./login.php">Login</a>
                            </li>
                        <?php } ?>
                        <?php if ($loggedin) { ?>
                            <li class="nav-item">
                                <a class="nav-link" id="add_contact" href="./add_contact.php">Add Contact</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="contactListLink">Contact List</a>
                            </li>
                        <?php } ?>
                    </ul>
                    <?php if ($loggedin) { ?>
                        <?php echo $_SESSION['username']; ?>
                        <li class="nav-link">
                            <button class="btn" type="button"><a href="./profile.php?sno=$row[sno]">Profile</a></button>
                        </li>
                        <a class a="nav-link" href="./logout.php">Logout</a>
                    <?php } ?>
                </div>
            </div>
        </nav>
    </div>
    <div class="container" >
        <!-- Content of the Add Contact file goes here -->
    </div>
    <div class="container" id="contactListTable" style="display: none;">
        <h1 class="text-center" id="contactListTitle">Contact List</h1>
        <table class="table table-striped" id="contactListTable">
            <thead class="table-light">
                <tr>
                    <th scope="col">Sno</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Address</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody id="contactListBody">
                <script>
                    $(document).ready(function() {
                        $('#contactListLink').click(function(e) {
                            e.preventDefault(); // Prevent the link from navigating
                            $('#addContactContent').hide(); // Hide the content of the Add Contact file
                            $('#welcome').hide(); 
                            $('.profile').hide();

                            $('#contactListTitle').show(); // Show the title
                            $('#contactListTable').show(); // Show the table
                            // Use jQuery to make an AJAX request to fetch contact data from the server.
                            $.ajax({
                                url: 'fetch_contacts.php', // Update with the correct URL
                                type: 'POST', // Change to GET if your server-side script expects GET requests
                                dataType: 'json',
                                success: function(data) {
                                    if (data.length > 0) {
                                        var contactListHTML = '';
                                        for (var i = 0; i < data.length; i++) {
                                            // Create HTML for displaying contact data
                                            contactListHTML += '<tr>';
                                            contactListHTML += '<th scope="row">' + data[i].id + '</th>';
                                            contactListHTML += '<td>' + data[i].name + '</td>';
                                            contactListHTML += '<td>' + data[i].email + '</td>';
                                            contactListHTML += '<td>' + data[i].phone + '</td>';
                                            contactListHTML += '<td>' + data[i].address + '</td>';
                                            contactListHTML += '<td><a href="./update.php?id=' + data[i].id + '" class="btn btn-warning">Update</a>&nbsp';
                                            contactListHTML += '<a href="./delete.php?id=' + data[i].id + '" class="btn btn-danger">Delete</a></td>';
                                            contactListHTML += '</tr>';
                                        }
                                        // Replace the content of the contact list body with the fetched data
                                        $('#contactListBody').html(contactListHTML);
                                    } else {
                                        // Display a message when no contacts are found
                                        $('#contactListBody').html('<tr><td colspan="6">No contacts found.</td></tr>');
                                    }
                                },
                                error: function() {
                                    // Handle errors, e.g., display an error message
                                    $('#contactListBody').html('<tr><td colspan="6">An error occurred while fetching data.</td></tr>');
                                }
                            });
                        });
                    });
                </script>
            </tbody>
        </table>
    </div>
    <script>
        // When Add Contact is clicked, hide the Contact List content
        $('#add_contact').click(function() {
            $('#addContactContent').show();
            $('#contactListTitle').hide();
            $('#contactListTable').hide();
        });
    </script>
</body>
</html>
