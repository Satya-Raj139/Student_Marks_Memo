<?php
class Student{
    public $ma;
    public $phy;
    public $comp;
    public $stna;
    public $htno;
    public $tot;
    public $gender;
    public $grade;
    public $loc;
    public function __construct($n,$h,$g,$m,$p,$c,$l)//used for taking values from a FORM
    {
        $this->gender=$g;
        $this->stna=$n;
        $this->htno=$h;
        $this->ma=$m;
        $this->phy=$p;
        $this->comp=$c;
        $this->loc=$l;
    }



    private function findTotal()
    {

            $this->tot = $this->ma + $this->phy + $this->comp;
            return $this->tot;
    }
    public function gettotal()
    {
        
        echo"print_Total:  ".$this->findTotal()."<br>";
    }

        public function findResult()
        {            
                $per = $this->tot / 3;
                if ($per >= 90)
                    $this->grade= "Outstanding";
                elseif ($per >= 75)
                    $this->grade= "A+";
                elseif ($per >= 60)
                    $this->grade= "B+";
                elseif ($per >= 50)
                    $this->grade= "B";
                elseif ($per >= 40)
                    $this->grade= "C";
                elseif($per<35)
                    $this->grade= "Fail";
                echo"Print_Grade:  ".$this->grade;
        }
        public function conn()
        {
            $con=mysqli_connect("localhost","root","","satya");
            if($con==true)
            {
                echo"<br>connected";
            }
            $ins="insert into student1(stun,halln,mat,phys,compu,gender,total,grade,location)
            values('".$this->stna."','".$this->htno."','".$this->ma."','".$this->phy."','".$this->comp."','".$this->gender."','".$this->tot."','".$this->grade."','".$this->loc."')";
            if($ins==true) 
            {
                echo"<br>inserted";
            }
            mysqli_query($con,$ins);
            echo"<br>connected to data base";
            echo"<form action=abstract2.php>";
            echo"<input type=submit>";
            echo"</form>";
        }
}
    
    
    $obj = new Student($_GET['name'],$_GET['halln'],$_GET['gender'],$_GET['m1'],$_GET['m2'],$_GET['m3'],$_GET['loc']);
    echo"Student_name is: ".$_GET['name'];
    echo"<br>";
    echo"Student_HallTicketNumber is: ".$_GET['halln'];
    echo"<br>";
    echo"Student_Gender is: ".$_GET['gender'];
    echo"<br>";
    echo"Student_Maths Marks is: ".$_GET['m1'];
    echo"<br>";
    echo"Student_Statistics marks is: ".$_GET['m2'];
    echo"<br>";
    echo"Student_Computer Marks is: ".$_GET['m3'];
    echo"<br>";
    $obj->gettotal();
    $obj->findResult();
    $obj->conn();
?>