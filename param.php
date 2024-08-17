$id = $row["id"];

$profile = $row["profile"];

$biography = $row["biography"];

$email = $row["email"];

$password = $row["password"];

$fullname = $row["fullname"];

$title = $row["title"];


$_SESSION["logged_id"] = $id;

$_SESSION["fullname"] = $fullname;

$_SESSION['title'] = $title;

$_SESSION["profile"] = $profile;

$_SESSION["biography"] = $biography;

$_SESSION["email"] = $email;

$_SESSION["password"] = $password;