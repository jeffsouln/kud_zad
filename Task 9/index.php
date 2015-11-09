<?php
require "config.php";

$container = new Container();


$container->set("book", "Lord of the flies");
$container->set("number", 317);
$container->set("now", function() {
return date("F j, Y, g:i a");
});
$container->set("hello", function($firstName, $lastName) {
return "Hello {$firstName} {$lastName}";
});
echo $container->get("book"); // Prints "Lord of the flies"
echo "<br>";
echo $container->get("number"); // Prints 317
echo "<br>";
echo $container->get("now"); // Prints now date ("August 23, 2015, 7:28 am")
echo "<br>";
echo $container->get("hello", array("John", "Doe")); // Prints "Hello John Doe"
echo "<br>";
echo "<br>";
echo "---------------------------------------******************************************************************-------------------------------------------";

$container->book = "Lord of the flies 2";
echo "<br>";
echo $container->book; // Prints "Lord of the flies 2"
echo "<br>";
echo $container->now; // Prints now date ("August 23, 2015, 7:28 am")
echo "<br>";
$container["book"] = "Lord of the flies 3";
echo "<br>";
echo $container['book']; // Prints "Lord of the flies 3"
echo "<br>";
echo $container['now']; // Prints now date ("August 23, 2015, 7:28 am")
echo "<br>";
echo"---------------------------------------******************************************************************-------------------------------------------";
echo "<br>";
echo $container->book(); // Prints "Lord of the flies"
echo "<br>";
echo $container->number(); // Prints 317
echo "<br>";
echo $container->now(); // Prints now date ("August 23, 2015, 7:28 am")
echo "<br>";
echo $container->hello("John", "Doe"); // Prints "Hello John Doe"


$container->set("db", function($dsn, $user, $pass) {
	return new \PDO($dsn, $user, $pass);
}, true);
//$db = $container->get("db"); // Always returns the same instance
$container->set("MAX_BUFFER_SIZE", 200, true);
$container->set("hash", function() {
return md5(gethostname() . time());
}, true);
$value = $container->MAX_BUFFER_SIZE;
echo "<br>";
echo $value; // Prints 200
$container->MAX_BUFFER_SIZE = 300;
echo "<br>";
echo $value; // Still prints 200
echo "<br>";
$value = $container->hash();
echo $value; // Prints "c5fbeb164b784672ae118d0442aa7be6"
echo "<br>";
$value = $container->hash();
echo $value; // Still prints "c5fbeb164b784672ae118d0442aa7be6"

echo "---------------------------------------******************************************************************-------------------------------------------";
//$container->register(new UserServiceProvider());
//print_r($container);
//$container->get("UserService")->getUser(317);
//$container->get("UserApplicationService")->getUserApplications(317);

