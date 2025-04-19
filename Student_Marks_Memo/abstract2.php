<?php
class Student1
{
    
        public function conn()
        {
            $con=mysqli_connect("localhost","root","","satya");
            if($con==true)
            {
                echo"<br>connected";
            }
            
            echo"<form method=get";
            echo"<label for=selectors style='font-size: 18px; font-weight: bold;'>Select category:</label> ";
            echo "<select name='details' id='details' style='width: 200px; height: 30px; font-size: 16px; padding: 5px; border-radius: 5px;'>";
            echo "<option value='' selected disabled hidden>Choose an option</option>";
            echo "<option value='All_Records'>All Records</option>";
            echo "<option value='Grade O'>Grade O</option>";
            echo "<option value='htnos'>htnos</option>";
            echo "<option value='Grade A+'>Grade A+</option>";
            echo "<option value='Grade B'>Grade B</option>";
            echo "<option value='Grade C'>Grade C</option>";        
            echo "<option value='chennai'>chennai</option>";
            echo "<option value='Banglore'>Banglore</option>";
            echo "<option value='kurnool'>kurnool</option>";
            echo "<option value='tirupati'>tirupati</option>";
            echo "<option value='Male'>Male</option>";
            echo "<option value='Female'>Female</option>";
            echo"</select>";
            echo "<br><input type='submit' value='Submit' style='width: 100px; height: 30px; font-size: 16px; padding: 5px; border-radius: 5px; background-color: #4CAF50; color: #fff; border: none; cursor: pointer;'>";
            echo "</form>";
        if (isset($_GET['details']))
        {
    
            $selectedValue = $_GET['details'];
            //drop end
            $selqury="";
                    // Use if statements to determine which query to run based on the selected value
                    if ($selectedValue == 'All_Records') 
                    {
                        $selqury = "SELECT * FROM student1";
                    }
                    elseif ($selectedValue == 'Grade O') 
                    {
                        $selqury = "SELECT * FROM student1 WHERE Grade = 'Outstanding'";
                    }
                    elseif($selectedValue=='htnos')
                    {
                        echo"<form method=get action=''>";
                        echo"<input type=number name=htno>";
                        echo"<input type=submit>";
                        echo"</form>";
                        if(isset($_GET['htno']) && $_GET['htno']!='')
                        {
                            $htno=$_GET['htno'];
                            $selqury="SELECT * FROM student1 WHERE halln ='$htno'";
                            
                        }
                    }
                    elseif ($selectedValue == 'Grade A+')
                    {
                        $selqury = "SELECT * FROM student1 WHERE Grade = 'A+'";
                    }
                    elseif ($selectedValue == 'Grade B') 
                    {
                        $selqury = "SELECT * FROM student1 WHERE Grade = 'B'";
                    }
                    elseif ($selectedValue == 'Grade C') 
                    {
                        $selqury = "SELECT * FROM student1 WHERE Grade = 'C'";
                    }
                    elseif ($selectedValue == 'kurnool') 
                    {
                        $selqury = "SELECT * FROM student1 WHERE Location = 'kurnool'";
                    }
                    elseif ($selectedValue == 'Banglore')
                    {
                        $selqury = "SELECT * FROM student1 WHERE location = 'Banglore'";
                    }
                    elseif ($selectedValue == 'chennai')
                    {
                        $selqury = "SELECT * FROM student1 WHERE Location = 'chennai'";
                    }
                    elseif ($selectedValue == 'tirupati') 
                    {
                        $selqury = "SELECT * FROM student1 WHERE location = 'tirupati'";
                    }
                    elseif ($selectedValue == 'Male' )
                    {
                        $selqury = "SELECT * FROM student1 WHERE gender = 'male'";
                    }
                    elseif ($selectedValue == 'Female' )
                    {
                        $selqury = "SELECT * FROM student1 WHERE gender = 'female'";
                    }
                    elseif ($selectedValue == 'Nandyal') 
                    {
                        $selqury = "SELECT * FROM student1 WHERE Location = 'Nandyal'";
                    }
                }
                
        //    $selqury="select*from student";//select command from database
          //  $selqury="";
            if($selqury!="")
            {
            $res_set=mysqli_query($con,$selqury);
                $rows=mysqli_num_rows($res_set);//find no.of rows
                echo"<br>no of rows is ".$rows;
                echo "<table border=2>";
                echo"<tr><th>Student_Name   ";
                echo"<th>HallTicket_num   ";
                echo"<th>Maths Marks  ";
                echo"<th>Physics Marks  ";
                echo"<th>Computer Marks  ";
                echo"<th>Gender  ";
                echo"<th>TotalMarks ";
                echo"<th>Grade ";
                echo"<th>Location</tr>";
                while($res_arr=mysqli_fetch_array($res_set,MYSQLI_ASSOC))//fetching details
                {
                    echo "<tr><td>".$res_arr['stun']."</td>";
                    echo "<td>".$res_arr['halln']."</td>";
                    echo "<td>".$res_arr['mat']."</td>";
                    echo "<td>".$res_arr['phys']."</td>";
                    echo "<td>".$res_arr['compu']."</td>";
                    echo "<td>".$res_arr['gender']."</td>";
                    echo "<td>".$res_arr['total']."</td>";
                    echo "<td>".$res_arr['grade']."</td>";
                    echo "<td>".$res_arr['location']."</td></tr>";
                }
            }
        }
}

    
    $obj = new Student1();

    $obj->conn();
?>