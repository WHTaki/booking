<div class="content">
  <div id="container">
    <div style="text-align:center;"><h1>Booking Result</h1></div>
      <div id="body">
        <?php

            $query = "SELECT * FROM booking WHERE cust_email LIKE '".$email."'";
            $query .= "AND course_code LIKE '".$course."'";
            $result = $this->db->query($query);

            if ($result->num_rows()==1){
                  echo "You have booked this section already!<br>";
            }else{
              //Case 2: Can book now
              $queries = "INSERT INTO booking(cust_email, course_code, book_date, book_time) VALUES('".$email."','". $course."',"." DATE(NOW()), TIME(NOW()) )";
              $inserted = $this->db->query($queries);

              $getid = "SELECT booking_id FROM booking WHERE cust_email LIKE '".$email."'";
              $getid .= "AND course_code ='". $course."'";
              $results = $this->db->query($getid)->row();
              echo "Booking ID: <b>".$results->booking_id."</b><br>";

              $ticket = "UPDATE session SET available_ticket = available_ticket - 1 WHERE course_code ='". $course."'";
              $reduced = $this->db->query($ticket);

              $custexist = "SELECT * FROM customers WHERE cust_email LIKE '".$email."'";
              $exist = $this->db->query($custexist);
              if ($exist->num_rows()==0){
                $newcust = "INSERT INTO customers(cust_email, cust_surname, cust_givenname, cust_mobile, cust_gender) VALUES('".$email."','". $surname."','". $givenname."','".$mobile."','".$gender."')";
                $addcust = $this->db->query($newcust);
              }
              echo "<a href='/booking/findSession'>Back</a>";
            }
        ?>
      </div>
    </div>
  </div>
</div>
