<?php
// namespace as classes
namespace classes;
// this class for all the class needed to perform operation with database
class databaseTable{
	// for table
    private $table;
	// primary key
	private $primaryKey;
	// pdo value
    private $pdo;
	// constructor to set the table, primarykey and pdo
	public function __construct($table,$primaryKey,$pdo) {
		// sets all data
		$this->table = $table;
		// to the
		$this->primaryKey = $primaryKey;
		// relative field
        $this->pdo = $pdo;
	}

    function find($field, $value){
		// find function to find
		// data on the basis of id
        $query = $this->pdo->prepare('SELECT * FROM ' .$this->table. ' WHERE ' .$field. ' =:value');
        $key = [
            'value' => $value
        ]; 
		//execute
        $query->execute($key);
		// fetch all rows and return
        return $query->fetchAll();
    }
    
    function findAllData(){
		// findAllData for select * 
        $query = $this->pdo->prepare('SELECT * FROM '.$this->table);
		// execute
        $query->execute();
		// fetch all
        return $query->fetchAll();
    }

    //insertData function asks table record to insert in table
function insertData($records){
	// array_keys() return array of keys of specified array
	$keys = array_keys($records);

	// this implode will place string like: id, name
	$fields = implode(', ', $keys);
	// values will contain string like: id, :name 
	$values = implode(', :', $keys);
	// join the strings 
	// for complete insert statement
	$query = 'INSERT INTO '.$this->table. ' ('.$fields.')	
		  VALUES (:'.$values.')';
		  // prepare
	$stmt = $this->pdo->prepare($query);
	// execute
	$stmt->execute($records);
}
// for updating data
function updateData($records){
	// for upadting 
	$query = ' UPDATE '.$this->table.' SET ';
	
	// creating arrays to store string to complete update query
	$paras = [];
	// this store like paras[0] = 'id =:id'
	// paras[1] = 'name = :name'
	foreach($records as $key => $value){
		$paras[] = $key .' = :'.$key;
	}
	// joining the complete update query
	$query .= implode(', ', $paras);
	$query .= ' WHERE ' .$this->primaryKey. ' = :primarykey';
	
	// If the $primarykey recieves 'id' as parameter and id 23 needs to be changed then
	// $record['primarkey'] = $record['id']
	// $record['id'] = 23
	// so,
	// $record['primarykey'] = 23

	$records['primarykey'] = $records[$this->primaryKey];
	// or, $records = ['primarykey' => $records[$primarykey]];
	$stmt = $this->pdo -> prepare($query);
	$stmt ->execute($records);
	
}

// this function consists of try catch statement
// if primary id is provided by user then it will update Data
// else it will update data
	public function saveData($records){
		//try to
		// insert data
		try{
			$this -> insertData($records);
		}
		// catch if not inser
		catch (Exception $e){
			$this -> updateData($records);
		}
	}

	public function deleteData($value){
		// for delete query of the 
		// database
		$deleteQuery = $this->pdo->prepare(' Delete FROM '.$this->table. ' WHERE '.$this->primaryKey.' =:value ');
		// find and delete data on the basis of id
		$record = [
			'value' => $value
		];
		//
		$deleteQuery->execute($record);

	}

// This function is to find
// the last inserted value in the database
	public function lastInsertedId(){
		return $this->pdo->lastInsertId();
	}

	// end of code
}
