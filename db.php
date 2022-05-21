<?php

 class db{

	private static $connection;

	//connect to the database.
 	public function connect() {
 		if(!isset(self::$connection)) {
 			$config = parse_ini_file('config.ini');
 			self::$connection = new mysqli($config['servername'],$config['username'],$config['password'],$config['dbname']);
 		}
 		if(self::$connection == false) {
 			echo "No connection" . self::$connection->connect_error;
 			return false;
 		}
 		return self::$connection;
	 }
	 
	//get all the users.
 	public function getUsers() {
 		$sql = "select * from users";
 		$conn = $this->connect(); 
 		$result = $conn->query($sql);
 		$rows = array();
 		while($row = $result-> fetch_assoc()) {
             $rows[] = $row;
 		}
 		return $rows;
	 }
	 
	//delete a specific user by using the user id.
 	public function deleteUser($id) {
		if(is_numeric($id)) {
			$sql = "DELETE FROM `users` WHERE userID = $id";
			$conn = $this->connect();
			$result = $conn->query($sql);
			return $result;
		}
		return false;
 	}

	 //get a specific user by searching on user id.
 	public function getUserById($id) {
		if(is_numeric($id)) {
			$sql = "select * from users where userID = $id";
			$conn = $this->connect();
			$result = $conn->query($sql);
			$rows = array();
			while($row = $result-> fetch_assoc()) {
				$rows[] = $row;
			}
			return $rows;
		}
		return false;
	 }

	//get a specific job by searching on job id.
	public function getJobById($id) {
		if(is_numeric($id)) {
			$sql = "select * from jobsOffer where jobId = $id";
			$conn = $this->connect();
			$result = $conn->query($sql);
			$rows = array();
			while($row = $result-> fetch_assoc()) {
				$rows[] = $row;
			}
			return $rows;
		}
		return false;
	}
	 
	//update a user data.
	public function updateUser($id,$username,$password,$email,$teleNo,$address,$type) {
		if(is_numeric($id)) {
		$sql ="UPDATE `users` SET `username`='$username',`password`='$password',`email`='$email',
			   `type`='$type',`teleNo`='$teleNo',`address`='$address' WHERE userID = '$id' ";
		$conn = $this->connect();
		$result = $conn->query($sql);
		return $result;
		}
		return false;
	}

	//add a new user to the database.
	public function addUser($username, $password, $email, $teleNo, $address, $type) {
		$pass = md5($password);
		$sql = "INSERT INTO `users`(`username`, `password`, `email`, `type`, `teleNo`, `address`)
				VALUES ('$username','$pass','$email','$type','$teleNo','$address')";
		$conn = $this->connect(); 
		$result = $conn->query($sql);
		echo ($sql);
		return $result;
	}
	
	//add a new job offer to database.
    public function addJob($jobTitle, $companyName, $address, $street, $city, $salary, $teleNo, $email, $image, $selectCategory, $jogDesc, $jobReq, $sponsored, $userId, $lastDate, $application) {
        if (empty($image)) {
            $image = "offerJob.jpg";
        }
        if(isset($sponsored)) {
            $sponsored = 1;
        }
        else {
            $sponsored = 0;
        }
        $date = date("Y-m-d");
		$time = time();
        $sql = "INSERT INTO `jobsOffer`(`jobID`, `jobTitle`, `companyName`, `category`, `address`, `street`, `city`, `jobDescription`, `jobRequirements`, `salary`, `teleNo`, `email`, `sponsored`, `offerDate`, `image`, `userID`,`offerTime`, `application`, `lastDate`, `viewsNo`)
			    VALUES (NULL,'$jobTitle','$companyName','$selectCategory','$address','$street','$city','$jogDesc','$jobReq','$salary','$teleNo','$email','$sponsored','$date','$image','$userId', '$time', '$application', '$lastDate', '0') ";
	 	echo ($sql);  
	   $conn = $this->connect(); 
		$result = $conn->query($sql);
		return $result;
    }
	
	//get all the jobs that belongs to a specific user.
    public function getjobsOffer($id) {
        $sql = "SELECT * FROM `jobsOffer` WHERE userID = $id";
        $conn = $this->connect();
        $result = $conn->query($sql);
        $rows = array();
        while($row = $result-> fetch_assoc()) {
            $rows[] = $row; 
        }
        return $rows;
	}
	
	//get all the jobs offer in the database.
	public function getJobs() {
        $sql = "SELECT * FROM `jobsOffer`";
        $conn = $this->connect(); 
        $result = $conn->query($sql);
        $rows = array();
        while($row = $result-> fetch_assoc()) {
            $rows[] = $row;
        }
        return $rows;
    }
	
	//return a specific job to get it's details.
    public function getJobDetails($id) {
        $sql = "SELECT * FROM `jobsOffer` WHERE jobID = '$id'";
        $conn = $this->connect();
		$result = $conn->query($sql);
		return $result;
	}

	//delete a specific job offer by using job id.
	public function deleteJob($id) {
		$sql = "DELETE FROM `jobsOffer` WHERE jobID = $id";
		$conn = $this->connect();
		$result = $conn->query($sql);
		return $result;
	}

	//change the state of a specific job offer to 1 by admin to indicate that admin review the post.
	public function review($id) {
		$view = 1;
		$sql = "UPDATE `jobsOffer` set reviewing = '$view' WHERE jobID ='$id' ";
        $conn = $this->connect();
        $result = $conn->query($sql);
        return $result;
	}
	
	//add a new category like IT to a specific job.
	public function addCategory($id, $category) {
		$sql = "UPDATE `jobsOffer` set addCategory = '$category' WHERE jobID ='$id' ";
        $conn = $this->connect();
        $result = $conn->query($sql);
        return $result;
	}
	
	//update a specific job offer data in the database.
	public function updateJob($id, $jobTitle, $companyName, $address, $street, $city, $salary,$teleNo,$email,$image,$category,$jobDesc,$jobReq,$sponsored) {
		if(isset($sponsored)) {
			$sponsored = 1;
		}
		else {
			$sponsored = 0;
		}
		$sql ="UPDATE `jobsOffer` SET `jobTitle`='$jobTitle', street='$street', address='$address', companyName= '$companyName', city = '$city', salary= '$salary', teleNo='$teleNo', email='$email', image='$image', jobDescription='$jobDesc', jobRequirements='$jobReq', sponsored='$sponsored', category='$category' WHERE jobID = '$id' ";
		$conn = $this->connect();
		$result = $conn->query($sql);
		echo ($sql);
		return $result;
	}
	
	//return all the sponsored, reviewed jobs after sorting them chronologically.
	public function getSponsored () {
		$sql = "select * from jobsOffer  WHERE sponsored=1 AND reviewing=1 ORDER BY offerTime DESC";
		$conn = $this->connect();
		$result = $conn->query($sql);
		$rows = array();
		while($row = $result-> fetch_assoc()) {
			$rows[] = $row;
		}
		return $rows;
	}

	//return all the unsponsored and reviewed jobs after sorting them.
	public function sortChronologically () {
		$sql = "select * from jobsOffer  WHERE sponsored=0 AND reviewing=1 ORDER BY offerTime ASC";
		$conn = $this->connect();
		$result = $conn->query($sql);
		$rows = array();
		while($row = $result-> fetch_assoc()) {
			$rows[] = $row;
		}
		return $rows;
	}

	//login a specific user by passing his username and password.
	public function login($username,$password) {
		$conn = $this->connect();
 		$safeusername = $conn->real_escape_string($username);
		 $safepassword = $conn->real_escape_string($password);
		 $safe = md5($safepassword);
		$sql = "select * from users where username = '$safeusername' and password = '$safe'";
		$conn = $this->connect();
		$result = $conn->query($sql);
		$rows = array();
		while($row = $result-> fetch_assoc()){
			$rows[] = $row;
		}
		return $rows;
	}
	
	//increment the job views when the user views that job.
	public function setView($jobId) {
		$sql = "UPDATE jobsOffer SET viewsNo = viewsNo +1  where jobID = '$jobId' ";
		$conn = $this->connect();
		$result = $conn->query($sql);
		return $result;
	}

	//get the most viewed job offer.
	public function getTrend() {
		$sql = "SELECT * FROM jobsOffer ORDER BY viewsNo DESC";
		$conn = $this->connect();
		$result = $conn->query($sql);
		$rows = array();
		while($row = $result-> fetch_assoc()) {
			$rows[] = $row;
		}
		return $rows;
	}

	//search on a jobs that maches the title or category and city names entered by the user.
	public function search($title, $city) {
		if(!empty($title) && empty($city)) {
			$sql = "SELECT * FROM jobsOffer WHERE  jobTitle like '%$title%' OR addCategory like '%$title%' ";
		}
		else if(!empty ($city) && empty($title)) {
			$sql = "SELECT * FROM jobsOffer WHERE city = '$city' ";
		}
		else {
			$sql = "SELECT * FROM jobsOffer WHERE jobTitle = '$title' OR addCategory = '$title' AND city = '$city'";
		}
		$conn = $this->connect();
		$result = $conn->query($sql);
		$rows = array();
		while($row = $result-> fetch_assoc()){

			$rows[] = $row;

		}
		return $rows;
	}

	//return all ads.
	public function getAds() {
		$sql = "SELECT * FROM ads";
		$conn = $this->connect();
		$result = $conn->query($sql);
		$rows = array();
		while($row = $result-> fetch_assoc()) {
			$rows[] = $row;
		}
		return $rows;
	}

	//delete a specific ad
	public function deleteAd($id) {
		if(is_numeric($id)) {
			$sql = "DELETE FROM `ads` WHERE adsId = $id";
			$conn = $this->connect();
			$result =  $conn->query($sql);
			return $result;
		}
		return false;
	 }
	 
	//add a new ad
	public function addAd($name, $image) {
		$sql = "INSERT INTO `ads`(`name`, `image`)
		VALUES ('$name','$image')";
        $conn = $this->connect();
        $result = $conn->query($sql);
        return $result;
	}
	
	public function getAdById($id) {
		if(is_numeric($id)) {
			$sql = "select * from ads where adsId = $id";
			$conn = $this->connect();
			$result = $conn->query($sql);
			$rows = array();
			while($row = $result-> fetch_assoc()) {
				$rows[] = $row;
			}
			return $rows;
		}
		return false;
	}

	public function updateAd($id, $name, $image) {
		if(is_numeric($id)) {
		$sql ="UPDATE `ads` SET `name`='$name',`image`='$image' WHERE adsId = $id";
		$conn = $this->connect();
		$result = $conn->query($sql);
		return $result;
		}
		return false;
	}

 }
?>