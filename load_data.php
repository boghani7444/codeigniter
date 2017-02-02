<?php
define("DB_SERVER", "localhost");
define("DB_DATABASE", "cidemo");
define("DB_USERNAME", "root");
define("DB_PASSWORD", "");
$con = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE) or die("can not connect");
@mysql_select_db(DB_DATABASE);

if(isset($_POST['getresult']))
{
    $data = $error = '';
    $no = $_POST['getresult'];
    $select = mysqli_query($con,"select * from gallery where gallery_type='portfolio' and status ='Y' order by d_order asc limit $no , 10 ");
    if(mysqli_num_rows($select) > 0){    
        while($row = mysqli_fetch_assoc($select))
        {
          $data .="<div class='mix'>
                <a href='upload/portfolio/".$row['image']."' title='".$row['title']."' class='fancybox' rel='port'>
                    <div class='portfolio-thumb'>
                        <div class='hover-effect'></div>
                        <img src='upload/portfolio/".$row['image']."' title='".$row['title_tag']."' alt='".$row['alt_tag']."' /> 
                    </div>
                    <h2>".$row['title']."</h2>
                </a>
            </div>";
        }
    }else{
        $error .= "<span style='color: red; font-weight: bold;padding-top:30px;float: left; margin-left: 42%;'><center>No More Record Found.</center></span>";
    }
    header('Content-Type: application/json');
    $jsonWrite = json_encode(array('data'=>$data,'error'=>$error)); //encode that search data
    print $jsonWrite;
}  
?>