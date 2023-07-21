<?php




class jamContactsBd {

    private $host = "";
    private $user = "";
    private $pass = "";
    private  $datebase = "";


    public function add($sql) {
        $openBd = mysqli_connect($this->host, $this->user, $this->pass,$this->datebase);
        
        if( mysqli_query($openBd, $sql) ){
            return array(
                "error" => false,
            );
        }else{
            return array(
                "error" => true,
            );
        }
    }


    public function delet($sql) {
        $openBd = mysqli_connect($this->host, $this->user, $this->pass,$this->datebase);
        
        if( mysqli_query($openBd, $sql)){
            return array(
                "error" => false,
            );
        }else{
            return array(
                "text" => mysqli_error($openBd),
                "error" => true,
            );
        }

    }

    public function select($sql) {
        $openBd = mysqli_connect($this->host, $this->user, $this->pass,$this->datebase);
        
        if($result = mysqli_query($openBd, $sql)){
            $rowsCount = mysqli_num_rows($result);
            $dataArray = mysqli_fetch_all($result);
            foreach($dataArray as $contact){
                $dataContact[] = array(
                    "name" => $contact[1],
                    "phone" => $contact[2],
                ) ;
            }
            return array(
                "data" => $dataContact,
                "count" => $rowsCount,
                "error" => false,
            );
        }else{
            return array(
                "error" => true,
            );
        }

    }

    
    


}




?>