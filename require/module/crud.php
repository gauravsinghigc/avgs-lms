<?php

//Update function
function UPDATE($SQL)
{
    global $DBConnection;
    $Update = "$SQL";
    $Query = mysqli_query($DBConnection, $Update);
    return $Query;
}

//delete
function DELETE($SQL)
{
    global $DBConnection;
    $Update = "$SQL";
    $Query = mysqli_query($DBConnection, $Update);
    return $Query;
}

//Check function
function CHECK($SQL)
{
    global $DBConnection;
    $Check = "$SQL";
    $Query = mysqli_query($DBConnection, $Check);
    $Count = mysqli_num_rows($Query);
    if ($Count == 0 or $Count == null) {
        return false;
    } else {
        return true;
    }
}


//Insert Data
function SAVE($tablename, array $INSERT)
{
    global $DBConnection;
    $tablename = $tablename;
    $Datatables = "";
    $TableValues = "";
    $tablerows = $INSERT;
    $arraycount = count($tablerows);
    $mainarray = $arraycount - 1;

    foreach ($tablerows as $key => $value) {
        global $$value;
    }


    foreach ($tablerows as $key => $value) {
        if ($key == $mainarray) {
            $TableValues .= "'" . htmlentities($$value) . "'";
        } else {
            $TableValues .= "'" . htmlentities($$value) . "', ";
        }
    }

    foreach ($tablerows as $key => $value) {
        if ($key == $mainarray) {
            $Datatables .= "$value";
        } else {
            $Datatables .= "$value, ";
        }
    }
    $InsertNewData = "INSERT INTO $tablename ($Datatables) VALUES ($TableValues)";
    //die($InsertNewData);
    $Query = mysqli_query($DBConnection, $InsertNewData);
    return $Query;
}

//Insert Data
function SAVE_DATA($tablename, array $INSERT)
{
    global $DBConnection;
    $tablename = $tablename;
    $Datatables = "";
    $TableValues = "";
    $tablerows = $INSERT;
    $arraycount = count($tablerows);
    $mainarray = $arraycount - 1;


    foreach ($tablerows as $key => $value) {
        if ($key == $mainarray) {
            $TableValues .= "'" . REQUEST($value) . "'";
        } else {
            $TableValues .= "'" . REQUEST($value) . "', ";
        }
    }

    foreach ($tablerows as $key => $value) {
        if ($key == $mainarray) {
            $Datatables .= "$value";
        } else {
            $Datatables .= "$value, ";
        }
    }

    $InsertNewData = "INSERT INTO $tablename ($Datatables) VALUES ($TableValues)";
    //die($InsertNewData);
    $Query = mysqli_query($DBConnection, $InsertNewData);
    return $Query;
}


//Select Data
function SELECT($SQL)
{
    global $DBConnection;
    $SELECT = "$SQL";
    //die($SELECT);
    $QUERY = mysqli_query($DBConnection, $SELECT);
    return $QUERY;
}

//Count Data
function TOTAL($SQL)
{
    global $DBConnection;
    $SQL = "$SQL";
    $Query = mysqli_query($DBConnection, $SQL);
    $Count = mysqli_num_rows($Query);
    if ($Count == 0) {
        return "0";
    } else {
        return $Count;
    }
}

//configuration
function CONFIG($Data)
{
    global $DBConnection;
    $SELECT_configurations = "SELECT * FROM configurations where configurationname='$Data'";
    $QUERY_configurations = mysqli_query($DBConnection, $SELECT_configurations);
    $Configurations = mysqli_fetch_array($QUERY_configurations);
    $IsConfigurationFetched = mysqli_num_rows($QUERY_configurations);
    if ($IsConfigurationFetched == 0) {
        $Value = "null";
    } else {
        $Value = $Configurations['configurationvalue'];
    }

    return $Value;
}

//configuration
function CONFIG_FIELDS($Data, $VALUE)
{
    global $DBConnection;
    $SELECT_configurations = "SELECT * FROM configurations where configurationname='$Data'";
    $QUERY_configurations = mysqli_query($DBConnection, $SELECT_configurations);
    $Configurations = mysqli_fetch_array($QUERY_configurations);
    $IsConfigurationFetched = mysqli_num_rows($QUERY_configurations);
    if ($IsConfigurationFetched == 0) {
        $Value = "null";
    } else {
        $Value = $Configurations["$VALUE"];
    }

    return $Value;
}

//amount total
function AMOUNT($SQL, $T)
{
    global $DBConnection;
    $TotalAmountPaid = SELECT("$SQL");
    while ($fetchtotalpayment = mysqli_fetch_array($TotalAmountPaid)) {
        $TotalAmount = $fetchtotalpayment["sum($T)"];
    }
    if ($TotalAmount == 0 or $TotalAmount == null) {
        $TotalAmount = 0;
    } else {
        $TotalAmount = $TotalAmount;
    }
    return $TotalAmount;
}


//Suggestion List
function SUGGEST($table = "false", $column, $order)
{
    if ($table != "false") {
        $CHECK_project_tags = CHECK("SELECT * FROM $table");
        if ($CHECK_project_tags != 0) {
            echo "<datalist id='$column'>";
            $SQL_project_tags = SELECT("SELECT * FROM $table GROUP by $column ORDER BY $column $order");
            while ($FetchTags = mysqli_fetch_array($SQL_project_tags)) { ?>
                <option value='<?php echo $FetchTags["$column"]; ?>'></option>
<?php }
            echo "</datalist>";
        }
    } else {
    }
}


//fetch values 
function FETCH($SQL, $data)
{
    $Query = SELECT($SQL);
    $FetchDATA = mysqli_fetch_array($Query);
    $ReturnData = $FetchDATA["$data"];
    if ($ReturnData == null) {
        $results = null;
    } else {
        $results = $ReturnData;
    }

    return $results;
}

//fetch data 
function FETCH_DATA($SQL)
{
    $Query = SELECT($SQL);
    $FetchDATA = mysqli_fetch_array($Query);
    if ($FetchDATA == null) {
        $results = null;
    } else {
        $results = $FetchDATA;
    }

    return $results;
}

//fetch all in array / json formate
function FetchConvertIntoArray($sql, $array = false)
{
    $Data = SELECT("$sql");
    $Count = CHECK("$sql");
    if ($Count == 0) {
        return null;
    } else {
        while ($FetchAllData = mysqli_fetch_array($Data)) {
            $FetchedColumns[] = $FetchAllData;
        }

        if ($array == true) {
            return json_decode(json_encode($FetchedColumns));
        } else {
            return json_encode($FetchedColumns);
        }
    }
}


//get data at details
function GET_DATA($data)
{
    global $PageSqls;

    $results = FETCH($PageSqls, $data);
    if ($results == null or $results == "" or $results == " ") {
        $results = null;
    } else {
        $results = $results;
    }

    if ($results == null) {
        RedirectoErrors("err", "index.php");
    } else {
        return $results;
    }
}


//upate table 
function UPDATE_TABLE($sqltables, array $colums, $conditions)
{
    $AvalableArrays = count($colums) - 1;
    $Columns = "";
    foreach ($colums as $key => $value) {
        $$value = SECURE($_REQUEST["$value"], "e");
        if ($AvalableArrays == $key) {
            $Columns .= $value . "='" . $$value . "'";
        } else {
            $Columns .= $value . "='" . $$value . "',";
        }
    }

    $Update = UPDATE("UPDATE $sqltables SET $Columns where $conditions");
    if ($Update == true) {
        return true;
    } else {
        return false;
    }
}
