<?php
/*  Auther:
        Lee Hebert

    Descrioption:
        This is a class to hold the query syntax framwork. 
		
	Update log:
		10/27/11 : 	
			1.	Added $count and $query.  
			
	API :
		select 					( $db, $table, $feild, $criteria )
			result	=	queries result pass through "mysql_fetch_assoc"
			count	=	number of rows returned from query
			raw		=	query result without "mysql_fetch_assoc" pass through
		
		selectOrdered 			( $db, $table, $feild, $criteria, $order )
			result	=	queries result pass through "mysql_fetch_assoc"
			count	=	number of rows returned from query
			raw		=	query result without "mysql_fetch_assoc" pass through
			
		selectSimple 			( $db, $table, $feild )
			result	=	queries result pass through "mysql_fetch_assoc"
			count	=	number of rows returned from query
			raw		=	query result without "mysql_fetch_assoc" pass through
			
		selectSimpleOrdered 	( $db, $table, $feild, $order )
			result	=	queries result pass through "mysql_fetch_assoc"
			count	=	number of rows returned from query
			raw		=	query result without "mysql_fetch_assoc" pass through
			
		update 					( $db, $table, $col, $value, $criteria )
			result	=	queries result pass through "mysql_fetch_assoc"
			
		create 					( $db, $table, $feild )
			result	=	queries result pass through "mysql_fetch_assoc"
			
		insert 					( $db, $table, $feild, $value )
			result	=	queries result pass through "mysql_fetch_assoc"
*/


class query{

	/* Public variables to pass through data from methods with the same name */
    public $result ;
	public $count ;
	public $raw ;
	
	/* Private variable used to pass along location of the MYSQL server to the other functions */
	private $sql ;
	private $query ;
	private $data ;

	
	function construct() { }
	 
    function select ( $db, $table, $feild, $criteria )  {
	
		/* select database */
		mysql_select_db( $db, mysql_connect("localhost", "root", "")) or die(mysql_error($this->sql)) ; 
		
		/* Format the query */
    	$this->query = "SELECT $feild FROM $table WHERE $criteria" ;
	
		/* Run the query */
		$this->data = mysql_query ($this->query) or die (mysql_error().$this->query) ;
		
		/* Assign the results */
		$this->result =  mysql_fetch_assoc ($this->data) ;
		$this->raw = $this->data ;
		$this->count = mysql_num_rows($this->data) ;
    }
	
	function selectOrdered ( $db, $table, $feild, $criteria, $order )  {
	
		/* select database */
		mysql_select_db( $db, mysql_connect("localhost", "root", "")) or die(mysql_error($this->sql)) ; 
		
		/* Format the query */
    	$this->query = "SELECT $feild FROM $table WHERE $criteria ORDER BY $order" ;
	
		/* Run the query */
		$this->data = mysql_query ($this->query) or die (mysql_error().$this->query) ;
		
		/* Assign the results */
		$this->count = mysql_num_rows($this->data) ;
		$this->result =  mysql_fetch_assoc ($this->data) ;
		$this->raw = $this->data ;
    }
	
	function selectSimple ( $db, $table, $feild )  {
	
		/* select database */
		mysql_select_db ( $db, mysql_connect("localhost", "root", "")) or die(mysql_error($this->sql)) ;
		 
		/* Format the query */
    	$this->query = "SELECT $feild FROM $table" ;
	
		/* Run the query */
		$this->data = mysql_query ($this->query) or die (mysql_error().$this->query) ;
		
		/* Assign the results */
		$this->count = mysql_num_rows($this->data) ;
		$this->result =  mysql_fetch_assoc ($this->data) ;
		$this->raw = $this->data ;
    }
	
	function selectSimpleOrdered ( $db, $table, $feild, $order )  {
	
		/* select database */
		mysql_select_db ( $db, mysql_connect("localhost", "root", "")) or die(mysql_error($this->sql)) ;
		 
		/* Format the query */
    	$this->query = "SELECT $feild FROM $table ORDER BY $order" ;
	
		/* Run the query */
		$this->data = mysql_query ($this->query) or die (mysql_error().$this->query) ;
		
		/* Assign the results */
		$this->count = mysql_num_rows($this->data) ;
		$this->result =  mysql_fetch_assoc ($this->data) ;
		$this->raw = $this->data ;
    }

    function update ( $db, $table, $col, $value, $criteria )  {
	
		/* select database */
		mysql_select_db( $db, mysql_connect("localhost", "root", "")) or die(mysql_error($this->sql)) ; 
		
		/* Format the query */
        $this->query = "UPDATE $table SET $col = $value WHERE $criteria" ;
	
		/* Run the query */
		$this->result = mysql_query ($this->query) or die (mysql_error().$this->query) ;
    }
	
    function create ( $db, $table, $feild )  {
	
		/* select database */
		mysql_select_db( $db, mysql_connect("localhost", "root", "")) or die(mysql_error($this->sql)) ; 
		
		/* Format the query */
        $this->query = "CREATE TABLE $table ($feild)" ;
	
		/* Run the query */
		$this->result = mysql_query ($this->query) or die (mysql_error().$this->query) ;
    }
	
    function insert ( $db, $table, $feild, $value )  {
	
		/* select database */
		mysql_select_db( $db, mysql_connect("localhost", "root", "")) or die(mysql_error($this->sql)) ; 
		
		/* Format the query */
        $this->query = "INSERT INTO $table ($feild)  Values ($value)" ;
	
		/* Run the query */
		$this->result = mysql_query ($this->query) or die (mysql_error().$this->query) ;
    }
}
?>

