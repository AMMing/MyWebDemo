<?php  

	/**
	* mysql helper
	*/
	class PDOHelper
	{
		function getPDO(){
			try {
				$dsn="mysql:host=".MYSQL_SERVER_NAME.";dbname=".MYSQL_DATABASE;
				$pdo=new PDO($dsn,MYSQL_USERNAME,MYSQL_PASSWORD);
				// $db->setAttribute(PDO::ATTR_CASE, PDO::CASE_UPPER);

				return $pdo;
			} catch (PDOException $e) {
				print "Error: " . $e->getMessage() . "<br/>";
   				die();
			}
		}
		function getList($sql){
			$pdo =$this->getPDO();

			$rs=$pdo->query($sql);
			$rs->setFetchMode(PDO::FETCH_ASSOC);
			$list = $rs->fetchAll();
			$pdo = null;

			return $list;
		}

		function getListEx($sql,$args){
			$pdo =$this->getPDO();

			$stmt=$pdo->prepare($sql);
			$stmt->execute($args);
			$stmt->setFetchMode(PDO::FETCH_ASSOC);
			$list = $stmt->fetchAll();
			$pdo = null;

			return $list;
		}

		function getItem($sql){
			$list = $this->getList($sql);

			if(count($list)<=0){
				return null;
			}
			$row= $list[0];

			return $row;
		}

		function getItemEx($sql,$args){
			$list = $this->getListEx($sql,$args);

			if(count($list)<=0){
				return null;
			}
			$row= $list[0];

			return $row;
		}

		function exec($sql){
			$pdo =$this->getPDO();

			$count = $pdo->exec($sql);
			$pdo = null;

			return $count;
		}

		function execEx($sql,$args){
			$pdo =$this->getPDO();

			$stmt=$pdo->prepare($sql);
			$stmt->execute($args);
			$result =count($stmt);
			$pdo = null;

			return $result;
		}
	}
?>