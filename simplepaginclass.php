<?php
// =====================================================
// FILE: Paging.php
//
// =====================================================
// Description: This class handles the paging from a query to be print
//              to the browser. You can customize it to your needs.
//
// This is distribute as is. Free of use and free to do anything you want.
//
// PLEASE REPORT ANY BUG TO ME BY EMAIL :)
//
// =========================
// Programmer:	  Pierre-Yves Lemaire
//											pylem_2000@yahoo.ca
// =========================
// Date:			2001-03-25
// Version: 2.0
//
// Modif:
// Version 1.1 (2001-04-09) Remove 3 lines in getNumberOfPage() that were forgot after debugging
// Version 1.1 (2001-04-09) Modification to the exemple
// Version 1.1 (2001-04-10) Added more argv to the previous and next link. ( by: peliter@mail.peliter.com )

// Version 2.0 (2001-11-22) Complete re-write of the script
// Summary: The class will be make it easier to play with results...
// * The class now only returns 2 arrays. All HTML, except href, tag were remove.
// * Function printPaging() broken in two: getPagingArray() and getPagingRowArray()
// * Function openTable() and closeTable() removed.
// =====================================================
class Paging {

    var $int_num_result;  // Number of result to show per page (decided by user)
    var $int_nbr_row;     // Total number of items (SQL count from db)
    var $int_cur_position;// Current position in recordset
    var $str_ext_argv;    // Extra argv of query string

    // ------------------------------------------------------------------------ Constructor
    //
    function Paging( $int_nbr_row, $int_cur_position, $int_num_result, $str_ext_argv = "" ){
        $this->int_nbr_row = $int_nbr_row;
        $this->int_num_result = $int_num_result;
        $this->int_cur_position = $int_cur_position;
        $this->str_ext_argv = urldecode( $str_ext_argv );
    } // End constructor

    // ------------------------------------------------------------------- getNumberOfPage()
    // This function returns the total number of page to display.
    function getNumberOfPage(){
        $int_nbr_page = $this->int_nbr_row / $this->int_num_result;
        return $int_nbr_page;
    } // end function

    // -------------------------------------------------------------------- getCurrentPage()
    // This function returns the current page number.
    function getCurrentPage(){
        $int_cur_page = ( $this->int_cur_position * $this->getNumberOfPage() ) / $this->int_nbr_row;
        return number_format( $int_cur_page, 0 );
    } // end function

    // ----------------------------------------------------------------------- getPagingArray()
    // This function print the paging to the screen.
    // This function returns an array:
    // $array_paging['lower'] lower limit of where we are in result set
    // $array_paging['upper'] upper limit of where we are in result set
    // $array_paging['total'] total number of result
    // $array_paging['previous_link'] href tag for previous link
    // $array_paging['next_link'] href tag for next link
    function getPagingArray(){
        global $PHP_SELF;

        $array_paging['lower'] = ( $this->int_cur_position + 1 );

        if( $this->int_cur_position + $this->int_num_result >= $this->int_nbr_row ){
            $array_paging['upper'] = $this->int_nbr_row;
        }else{
            $array_paging['upper'] = ( $this->int_cur_position + $this->int_num_result );
        }

        $array_paging['total'] = $this->int_nbr_row;

        if ( $this->int_cur_position != 0 ){
            $array_paging['previous_link'] = "<a href=\"$PHP_SELF?int_cur_position=". ( $this->int_cur_position - $this->int_num_result ).$this->str_ext_argv ."\">";
        }

        if( ( $this->int_nbr_row - $this->int_cur_position ) > $this->int_num_result ){
            $int_new_position = $this->int_cur_position + $this->int_num_result;
            $array_paging['next_link'] = "<a href=\"$PHP_SELF?int_cur_position=$int_new_position". $this->str_ext_argv ."\">";
        }
        return $array_paging;
    } // end function

    // ----------------------------------------------------------------------- getPagingRowArray()
    // This function returns an array of string (href link with the page number)
    function getPagingRowArray(){
        global $PHP_SELF;

        for( $i=0; $i<$this->getNumberOfPage(); $i++ ){
            // if current page, do not make a link
            if( $i == $this->getCurrentPage() ){
                $array_all_page[$i] = "<b>". ($i+1) ."</b>";
            }else{
                $int_new_position = ( $i * $this->int_num_result );
                $array_all_page[$i] = "<a href=\"". $PHP_SELF ."?int_cur_position=$int_new_position$this->str_ext_argv\">". ($i+1) ."</a>";
            }
        }
        return $array_all_page;
    } // end function
}; // End Class

// ==============================================================
// Exemple Usage
// Note: I make 2 query to the database for this exemple, it
// could (and should) be made with only one query...
// ==============================================================

include( "db_mysql.php" );

// New instance of database object, from phplib (http://phplib.sourceforge.net/)
$db = new db_data();

// If current position is not set, set it to zero
if( !isset( $int_cur_position ) || $int_cur_position == 0 ){
    $int_cur_position = 0;
}

// Number of result to display on the page, will be in the LIMIT of the sql query also
$int_num_result = 20;
$extargv = "&argv1=1&argv2=2"; // extra argv here (could be anything depending on your page)

// Get the total number of result from db
$sql1 = "Select count( key ) as nbr FROM table";

if ( !$db->query( $sql1 )){ print "\n<p>ERREUR $sql1"; exit; }
$db->next_record();
$result_from_sql1 = $db->f("nbr");

// New instance of the Paging class, you can modify the color and the width of the html table
$p = new Paging( $result_from_sql1, $int_cur_position, $int_num_result, $extargv );

// Load up the 2 array in order to display result
$array_paging = $p->getPagingArray();
$array_row_paging = $p->getPagingRowArray();

// Display the result as you like...
print "Results ". $array_paging['lower'];
print " to ". $array_paging['upper'];
print " of ". $array_paging['total'];
print "&nbsp;&nbsp;". $array_paging['previous_link'] ."<<<</a> " ;
for( $i=0; $i<sizeof($array_row_paging); $i++ ){
    print $array_row_paging[$i] ."&nbsp;";
}
print $array_paging['next_link'] .">>></a>";

// The above exemple print somethings like:
// Results 1 to 20 of 597  <<< 1 2 3 4 5 6 7 8 9 10 11 12 13 14 15 16 17 18 19 20 21 22 23 24 25 26 27 28 29 30 >>>
// Of course you can now play with array_row_paging in order to print
// only the results you would like...

// Now go on with the rest of you page...
//  Select only fields needed according to paging
$sql2 = "Select * FROM my_table ORDER BY id "
    ."LIMIT $int_cur_position, $int_num_result";
?>