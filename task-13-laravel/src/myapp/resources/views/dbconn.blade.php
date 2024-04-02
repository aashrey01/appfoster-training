<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <div>
        
        <?php
use Illuminate\Support\Facades\DB;

try {
    // Attempt to establish a database connection
    $pdo = DB::connection()->getPdo();
    
    // If the connection was successful
    if ($pdo) {
        // Output a success message
        echo "Successfully connected";
        
        // Retrieve the name of the currently selected database
        $databaseName = DB::getDatabaseName();
        echo "Database: " . $databaseName;
    }
} catch (\Exception $e) {
    // If an exception occurred, output the error message
    echo "Connection failed: " . $e->getMessage();
}
?>

        
    </div>
    
</body>
</html>