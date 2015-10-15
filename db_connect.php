<?php 
	class db_connect {
		public $conn;		
		public $servername;
		public $username;
		public $password;
		public $dbname;

		function __construct($_servername, $_username, $_password, $_dbname) {
			$this->servername = $_servername;
			$this->username = $_username;
			$this->password = $_password;
			$this->dbname = $_dbname;
		}

		public function connect() {
			$this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
			// Check connection
			if ($this->conn->connect_error) {
			    die("Connection failed: " . $this->conn->connect_error);
			}
		}

		public function close_connection() {
				$this->conn->close();
			}

		public function postQuestion ($name, $email, $questionTopic,$content) {
			// require connect()
			$sql="INSERT INTO table_name (column1, column2, column3)
			VALUES ($name, $email, $questionTopic,$content)";
			if ($this->conn->query($sql) === TRUE) {
			    echo "Record deleted successfully";
			}
			else {
			    echo "Error deleting record: " . $this->conn->error;
			}
		}

		public function editQuestion($name, $email, $questionTopic,$content) {
			// require connect()
			$sql = "UPDATE /*table name*/ SET content=$content WHERE id=/*something*/";
			if ($this->conn->query($sql) === TRUE) {
			    echo "Record deleted successfully";
			}
			else {
			    echo "Error deleting record: " . $this->conn->error;
			}
		}

		public function delete() {
			// require connect()
			$sql="DELETE FROM stackexchange WHERE /*questionId*/";

			if ($this->conn->query($sql) === TRUE) {
			    echo "Record deleted successfully";
			}
			else {
			    echo "Error deleting record: " . $this->conn->error;
			}
		}

		public function getTimestamp($table_name, $id) {
			$sql = "SELECT time FROM '$table_name' WHERE id='$id'";
			return $result = $conn->query($sql);
		}

		public function getQuestionId ($table_name, $username, $questionTopic) {
			$sql = "SELECT time FROM '$table_name' WHERE username='$username' AND questiontopic = '$questionTopic";
			return $result = $conn->query($sql);
		}
	};
?>