<?php 
    session_start();
    require '../functions/functions.php';

    if(isset($_POST["submit"])) {
        global $conn;

        $username = $_POST["username"];
        $password = $_POST["password"];

        $query = "SELECT * FROM admin WHERE username = '$username'";
        $result = mysqli_query($conn, $query);

       if(mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $_SESSION["login"] = true;

            if($password == $row["password"]) {

                header("Location: ../admin/dashboard.php");
                exit;
            }
       }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <section class="bg-gradient-to-br from-blue-600 to-blue-300 w-[100vw] h-[100vh] flex items-center justify-center">
        <form action="" method="POST" class="flex flex-col gap-3 border-4 bg-[#F2F9FE] border-none w-96 h-96 items-center justify-center text-black rounded-lg">
            <h1 class="text-3xl font-semibold mb-4">SIGN IN</h1>
            <input type="text" placeholder="username" pattern="[A-Za-z0-9]+" name="username" class="p-2 bg-transparent border-b-2 placeholder-black outline-none">
            <input type="password" placeholder="password" pattern="[A-Za-z0-9]+" name="password" class="p-2 bg-transparent  border-b-2 placeholder-black outline-none">
            <button type="submit" name="submit" class="rounded-lg bg-black text-white px-4 py-2 mt-4">Login</button>
        </form>
    </section>
</body>
</html>