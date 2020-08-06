<?php include('db_fns.php');
$id=$_GET['id'];

// SQL server connection information
$sql_details = array(
    'user' => 'root',
    'pass' => 'admin@123+',
    'db'   => $_SESSION['database'],
    'host' => 'localhost'
);
/*
 * DataTables example server-side processing script.
 *
 * Please note that this script is intentionally extremely simply to show how
 * server-side processing can be implemented, and probably shouldn't be used as
 * the basis for a large complex system. It is suitable for simple use cases as
 * for learning.
 *
 * See http://datatables.net/usage/server-side for full details on the server-
 * side processing requirements of DataTables.
 *
 * @license MIT - http://datatables.net/license_mit
 */

/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Easy set variables
 */
$where = "";
switch($id){


    case 1:
        // DB table to use
        $table = 'employee';

        // Table's primary key
        $primaryKey = 'id';
        $where = "status=1";

        // Array of database columns which should be read and sent back to DataTables.
        // The `db` parameter represents the column name in the database, while the `dt`
        // parameter represents the DataTables column identifier. In this case simple
        // indexes
        $columns = array(
                array( 'db' => 'emp', 'dt' => 0 ),
            array( 'db' => 'fname', 'dt' => 1 ),
            array( 'db' => 'dept', 'dt' => 2 ),
            array( 'db' => 'position', 'dt' => 3 ),
            array( 'db' => 'phone',  'dt' => 4 ),
            array( 'db' => 'idno',    'dt' => 5 )
        );

        break;



}




/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * If you just want to use the basic configuration for DataTables with PHP
 * server-side, there is no need to edit below this line.
 */

require( 'ssp.class.php' );

echo json_encode(
    SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns, $where )
);